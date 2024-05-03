<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    
    public function create(Request $request)
    {
        // Validação dos campos recebidos
        $request->validate([
            'type' => 'required',
            'cod' => 'required',
            'discount' => 'required',
            'valid_at' => 'required',
            'products' => 'nullable|array',
            'categories' => 'nullable|array',
        ]);

        // Criação da nova oferta
        $offer = Offer::create([
            'type' => $request->input('type'),
            'cod' => $request->input('cod'),
            'discount' => $request->input('discount'),
            'valid_at' => $request->input('valid_at'),
            'used_at' => $request->input('used_at'),
            'text1' => $request->input('text1'),
            'blocked' => $request->input('blocked', false), // Valor padrão: false
        ]);

        // Obtenção dos produtos e categorias selecionados
        $products = $request->input('products', []);
        $categories = $request->input('categories', []);

        // Associação dos produtos à oferta
        $offer->products()->attach($products);

        // Associação das categorias à oferta
        $offer->categories()->attach($categories);

        return response()->json($offer, 201);
    }

    // ...


    public function update(Request $request, $id)
    {
        // Validação dos campos recebidos
        $request->validate([
            'type' => 'required',
            'cod' => 'required',
            'discount' => 'required',
            'valid_at' => 'required',
        ]);

        // Busca da oferta pelo ID
        $offer = Offer::findOrFail($id);

        // Atualização dos campos
        $offer->type = $request->input('type');
        $offer->cod = $request->input('cod');
        $offer->discount = $request->input('discount');
        $offer->valid_at = $request->input('valid_at');
        $offer->used_at = $request->input('used_at');
        $offer->text1 = $request->input('text1');
        $offer->blocked = $request->input('blocked', false); // Valor padrão: false
        $offer->save();

        return response()->json($offer, 200);
    }

    public function block($id)
    {
        // Busca da oferta pelo ID
        $offer = Offer::findOrFail($id);

        // Bloqueio da oferta
        $offer->blocked = true;
        $offer->save();

        return response()->json($offer, 200);
    }

    public function delete($id)
    {
        // Busca da oferta pelo ID
        $offer = Offer::findOrFail($id);

        // Exclusão da oferta (usando soft delete)
        $offer->delete();

        return response()->json(null, 204);
    }
}
