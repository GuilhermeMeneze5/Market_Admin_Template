<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function create(Request $request)
    {
        // Validação dos campos recebidos
        $request->validate([
            'cod' => 'required',
            'type' => 'required',
            'text1' => 'required',
            // Outros campos aqui...
        ]);

        // Criação do novo produto
        $product = Product::create([
            'cod' => $request->input('cod'),
            'type' => $request->input('type'),
            'text1' => $request->input('text1'),
            // Outros campos aqui...
            'blocked' => $request->input('blocked', false), // Valor padrão: false
        ]);

        
    // Obtenção das variações selecionadas
    $variations = $request->input('variations', []); // Supondo que o campo "variations" seja um array de IDs de variações

    // Associação das variações ao produto recém-criado
    $product->variations()->attach($variations);
   // Obtenção das tags selecionadas
   $tags = $request->input('tags', []); // Supondo que o campo "tags" seja um array de IDs de tags

   // Atualização das tags associadas ao produto
   $product->tags()->sync($tags);

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
{
    // Validação dos campos recebidos
    $request->validate([
        'cod' => 'required',
        'type' => 'required',
        'text1' => 'required',
        // Outros campos aqui...
        'tags' => 'nullable|array',
        'variations' => 'nullable|array',
    ]);

    // Busca do produto pelo ID
    $product = Product::findOrFail($id);

    // Atualização dos campos do produto
    $product->cod = $request->input('cod');
    $product->type = $request->input('type');
    $product->text1 = $request->input('text1');
    // Outros campos aqui...
    $product->blocked = $request->input('blocked', false); // Valor padrão: false
    $product->save();

    // Obtenção das tags selecionadas
    $tags = $request->input('tags', []); // Supondo que o campo "tags" seja um array de IDs de tags

    // Sincronização das tags associadas ao produto
    $product->tags()->sync($tags);

    // Obtenção das variações selecionadas
    $variations = $request->input('variations', []); // Supondo que o campo "variations" seja um array de IDs de variações

    // Sincronização das variações associadas ao produto
    $product->variations()->sync($variations);

    // Remoção das tags e variações não selecionadas (SoftDeletes)
    $product->tags()->whereNotIn('id', $tags)->delete();
    $product->variations()->whereNotIn('id', $variations)->delete();

    return response()->json($product, 200);
}

    public function block($id)
    {
        // Busca do produto pelo ID
        $product = Product::findOrFail($id);

        // Bloqueio do produto
        $product->blocked = true;
        $product->save();

        return response()->json($product, 200);
    }

    public function delete($id)
    {
        // Busca do produto pelo ID
        $product = Product::findOrFail($id);

        // Exclusão do produto (SoftDeletes)
        $product->delete();

        // Exclusão das associações com variações (SoftDeletes)
        $product->variations()->detach();

        // Exclusão das associações com tags (SoftDeletes)
        $product->tags()->detach();

        return response()->json(null, 204);
    }

}
