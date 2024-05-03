<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        //dd($request->all());
        // Validação dos campos recebidos
        $request->validate([
            'cod' => 'required',
            'image' => 'required',
        ]);

        // Criação da nova categoria
        $categories = new Categories;
        $categories->cod = $request->name_categorie;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestimage = $request->image;
            $extension = $requestimage->getClientOriginalExtension();
            $imageName = md5($requestimage->getClientOriginalName() . strtotime("now")) . '.' . $extension;
            $requestimage->move(public_path('img/categorie'), $imageName);
            $categories->image = $imageName;
        }

        $categories->save();

        return response()->json($categories, 201);
    }
    //aqui ini

    //aqui fim

    public function update(Request $request, $id)
    {
        // Validação dos campos recebidos
        $request->validate([
            'cod' => 'required',
            'image' => 'required',
        ]);

        // Busca da categoria pelo ID
        $category = Categories::findOrFail($id);

        // Atualização dos campos
        $category->cod = $request->input('name_categorie');
        $category->image = $request->input('image');
        $category->blocked = $request->input('blocked', false); // Valor padrão: false
        $category->save();

        return response()->json($Categories, 200);
    }

    public function delete($id)
    {
        // Busca da categoria pelo ID
        $category = Categories::findOrFail($id);

        // Deleção suave (soft delete)
        $category->delete();

        return response()->json(['message' => 'Categoria deletada com sucesso'], 200);
    }
    public function block($id)
{
    // Busca da categoria pelo ID
    $category = Categories::findOrFail($id);

    // Define o status de bloqueio para true
    $category->blocked = true;
    $category->save();

    return response()->json(['message' => 'Categoria bloqueada com sucesso'], 200);
}








}
