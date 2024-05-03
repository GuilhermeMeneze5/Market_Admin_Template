<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use Illuminate\Http\Request;

class VariationsController extends Controller
{
    public function create(Request $request)
    {
        // Validação dos campos recebidos
        $request->validate([
            'cod' => 'required',
            'Text1' => 'required',
            'Price' => 'required',
            'Blocked' => 'required',
            'Type' => 'required',
        ]);

        // Criação da nova variação
        $variation = Variation::create([
            'cod' => $request->input('cod'),
            'Text1' => $request->input('Text1'),
            'Price' => $request->input('Price'),
            'Blocked' => $request->input('Blocked'),
            'Type' => $request->input('Type'),
        ]);

        // Obtenção das tags selecionadas
        $tags = $request->input('tags', []); // Supondo que o campo "tags" seja um array de IDs de tags

        // Associação das tags à variação recém-criada
        $variation->tags()->attach($tags);


        return response()->json($variation, 201);
    }

    public function update(Request $request, $id)
    {
        // Validação dos campos recebidos
        $request->validate([
            'cod' => 'required',
            'text1' => 'required',
            'price' => 'required',
            // Outros campos aqui...
            'tags' => 'nullable|array',
        ]);

        // Busca da variação pelo ID
        $variation = Variation::findOrFail($id);

        // Atualização dos campos da variação
        $variation->cod = $request->input('cod');
        $variation->text1 = $request->input('text1');
        $variation->price = $request->input('price');
        // Outros campos aqui...
        $variation->blocked = $request->input('blocked', false); // Valor padrão: false
        $variation->save();

        // Obtenção das tags selecionadas
        $tags = $request->input('tags', []); // Supondo que o campo "tags" seja um array de IDs de tags

        // Sincronização das tags associadas à variação
        $variation->tags()->sync($tags);

        // Remoção das tags não selecionadas (SoftDeletes)
        $variation->tags()->whereNotIn('id', $tags)->delete();

        return response()->json($variation, 200);
    }
    
    public function block($id)
    {
        // Busca da variação pelo ID
        $variation = Variation::findOrFail($id);

        // Bloqueio da variação
        $variation->Blocked = true;
        $variation->save();

        return response()->json($variation, 200);
    }

    public function delete($id)
    {
        // Busca da variação pelo ID
        $variation = Variation::findOrFail($id);

        // Exclusão da variação (SoftDeletes)
        $variation->delete();

        // Exclusão das associações com tags (SoftDeletes)
        $variation->tags()->detach();

        return response()->json(null, 204);
    }
}
