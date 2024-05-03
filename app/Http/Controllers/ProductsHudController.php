<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Product_custom;
class ProductsHudController extends Controller
{
    public function products()
    {
        $customs =  DB:: table('product_customs')->whereNull('deleted_at')->get();
        $categories = DB::table('categories')->whereNull('deleted_at')->get();
        $products = DB::table('products')->whereNull('deleted_at')->get();

        return view ('market\products')
        ->with(['customs'=>$customs])
        ->with(['categories'=>$categories])
        ->with(['products'=>$products])
       ;

    }
    public function storecategorie(Request $request){
        $categories = new Categories;
        $categories->name = $request->namecategories;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestimage = $request->image;
            $extension = $requestimage->getClientOriginalExtension();
            $imageName = md5($requestimage->getClientOriginalName() . strtotime("now")) . '.' . $extension;
            $requestimage->move(public_path('img/categorie'), $imageName);
            $categories->image = $imageName;
        }

        $categories->save();
        return redirect('/products');

    }

        public function storecustom(Request $request){

            $Product_custom = Product_custom::create([
            'custom_nome' => $request -> name_custom,
            'custom_status1' => $request -> status_option_1,
            'custom_status2' => $request -> status_option_2,
            'custom_status3' => $request -> status_option_3,
            'custom_status4' => $request -> status_option_4,
            'custom_status5' => $request -> status_option_5,
            'custom_status6' => $request -> status_option_6,
            'custom_status7' => $request -> status_option_7,
            'custom_status8' => $request -> status_option_8,
            'custom_status9' => $request -> status_option_9,
            'custom_valor1' => $request -> txt_option_1,
            'custom_valor2' => $request -> txt_option_2,
            'custom_valor3' => $request -> txt_option_3,
            'custom_valor4' => $request -> txt_option_4,
            'custom_valor5' => $request -> txt_option_5,
            'custom_valor6' => $request -> txt_option_6,
            'custom_valor7' => $request -> txt_option_7,
            'custom_valor8' => $request -> txt_option_8,
            'custom_valor9' => $request -> txt_option_9,
            ]);
            $Product_custom->save();

            return redirect('/products');
            //dd( $request->all());
        }
        public function storeproduct(Request $request){

            $Product = new Product;
        // Armazena a imagem
      $images = [];

    for ($i=1; $i<=5; $i++) {
        $fieldName = 'image' . $i;
        if ($request->hasFile($fieldName) && $request->file($fieldName)->isValid()) {
            $requestImage = $request->file($fieldName);
            $extension = $requestImage->getClientOriginalExtension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . '.' . $extension;
            $requestImage->move(public_path('img/product'), $imageName);
            $images[$fieldName] = $imageName;
        }
    }

    $Product->image1 = $images['image1'] ?? null;
    $Product->image2 = $images['image2'] ?? null;
    $Product->image3 = $images['image3'] ?? null;
    $Product->image4 = $images['image4'] ?? null;
    $Product->image5 = $images['image5'] ?? null;

            // Salva os demais campos
            $Product->name = $request->name;
            $full_price = $request->full_price;
            $Product->full_price =  $full_price;
            $value1 = $request->discount;
            $Product->discount =   $value1;
            $percent = $value1/100;
            $SOLVE = $full_price * $percent;

            $Product->discount_price = $full_price - $SOLVE;

            $Product->qtd_storage = $request->qtd_storage;
            $Product->short_description = $request->short_description;
            $Product->long_description = $request->long_description;
            $Product->additional_information = $request->myTextarea;
            $Product->category_id = $request->category_id;
            $Product->custom1_id = $request->custom1_id;
            $Product->custom2_id = $request->custom2_id;
            $Product->custom3_id = $request->custom3_id;
            $Product->review_id = 10;

            $Product->save();

            return redirect('/products');
            //dd( $request->all());

        }


    public function productdestroy($id){
        Product::findOrFail($id)->delete();
        return redirect ('/products')->with('msg','Usuario Excluido com sucesso!');
    }
    public function categoriedestroy($id){
        Categories::findOrFail($id)->delete();
        return redirect ('/products')->with('msg','Grupo Excluido com sucesso!');
    }
    public function customdestroy ($id){
        Product_custom::findOrFail($id)->delete();
        return redirect ('/products')->with('msg','Carga Excluido com sucesso!');
    }
    public function subcategoriesdestroy($id){
        Role::findOrFail($id)->delete();
        return redirect ('/products')->with('msg','Permissão Excluido com sucesso!');
    }
    public function test(){
        $customs =  DB:: table('product_customs')->whereNull('deleted_at')->get();
        $categories = DB::table('categories')->whereNull('deleted_at')->get();
        $products = DB::table('products')->whereNull('deleted_at')->get();
        return view ('market\registerproduct')->with(['customs'=>$customs])
        ->with(['categories'=>$categories])
        ->with(['products'=>$products])
       ;
    }
}
