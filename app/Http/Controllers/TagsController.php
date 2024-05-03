<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function create(Request $request)
    {
        // Validação dos campos recebidos
        $request->validate([
            'cod' => 'required',
            'type' => 'required',
        ]);

        // Criação da nova tag
        $tag = Tag::create([
            'cod' => $request->input('cod'),
            'cod_eng' => $request->input('cod'),
            'group_eng' => $request->input('cod'),
            'group' => $request->input('cod'),
       
            'type' => $request->input('type'),
        ]);

        return response()->json($tag, 201);
    }

    public function update(Request $request, $id)
    {
        // Validação dos campos recebidos
        $request->validate([
            'cod' => 'required',
            'type' => 'required',
        ]);

        // Busca da tag pelo ID
        $tag = Tag::findOrFail($id);

        // Atualização dos campos
        $tag->cod = $request->input('cod');
        $tag->cod_eng = $request->input('cod');
        $tag->group_eng = $request->input('cod');
        $tag->group = $request->input('cod');
        $tag->type = $request->input('type');
        $tag->save();

        return response()->json($tag, 200);
    }

    public function block($id)
    {
        // Busca da tag pelo ID
        $tag = Tag::findOrFail($id);

        // Bloqueio da tag
        $tag->blocked = true;
        $tag->save();

        return response()->json($tag, 200);
    }

    public function delete($id)
    {
        // Busca da tag pelo ID
        $tag = Tag::findOrFail($id);

        // Exclusão da tag (usando soft delete)
        $tag->delete();

        return response()->json(null, 204);
    }
}
