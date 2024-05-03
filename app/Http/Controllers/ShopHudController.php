<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Product_custom;
use App\Models\CartItem;
use App\Models\Review;


class ShopHudController extends Controller
{
    public function marketplace(Request $request)
{
    $customs = DB::table('product_customs')->whereNull('deleted_at')->get();
    $categories = DB::table('categories')->whereNull('deleted_at')->get();
    $productsQuery = DB::table('products')->whereNull('deleted_at');

    $categoryId = $request->input('category_id');
    if ($categoryId) {
        $productsQuery->where('category_id', $categoryId);
    }

    $products = $productsQuery->get();

    $categoriesWithProductCount = $categories->map(function ($category) {
        $productCount = DB::table('products')
            ->where('category_id', $category->id)
            ->whereNull('deleted_at')
            ->count();

        $category->productCount = $productCount;
        return $category;
    });


    return view('market\index')
        ->with(['customs' => $customs])
        ->with(['categories' => $categoriesWithProductCount])
        ->with(['products' => $products]);
}



    public function shop()
    {
        return view ('market.shop');
    }
    public function detail($id)
    {
        $product = Product::findOrFail($id);

        // Verifica os campos custom1_id, custom2_id e custom3_id
        if ($product->custom1_id) {
            $custom1 = DB::table('product_customs')
            ->where('blocked', '<>', true)
            ->find($product->custom1_id);        } else {
            $custom1 = null;
        }

        if ($product->custom2_id) {
            $custom2 = DB::table('product_customs')
            ->where('blocked', '<>', true)
            ->find($product->custom2_id);        } else {
            $custom2 = null;
        }

        if ($product->custom3_id) {
            $custom3 = DB::table('product_customs')
            ->where('blocked', '<>', true)
            ->find($product->custom3_id);        } else {
            $custom3 = null;
        }

        $reviews = Review::where('product_id', $id)
        ->where('blocked', '<>', true) // Ou use '!=' em vez de '<>'
        ->get();

        return view('market.detail')->with([
            'product' => $product,
            'custom1' => $custom1,
            'custom2' => $custom2,
            'custom3' => $custom3,
            'reviews' => $reviews,
        ]);
    }
    public function editproduct($id)
{
    $product = Product::findOrFail($id);
    $customs = DB::table('product_customs')->whereNull('deleted_at')->get();
    $categories = DB::table('categories')->whereNull('deleted_at')->get();
    return view ('market\editproduct')
    ->with(['product'=>$product])
    ->with(['customs'=>$customs])
    ->with(['categories'=>$categories])
   ;
}

public function updateprod(Request $request, $id) {
    $product = Product::find($id);
    if (!$product) {
        return redirect('/products')->with('error', 'Product not found.');
    }

    $product->category_id = $request->category_id;
    $product->custom1_id = $request->custom1_id;
    $product->custom2_id = $request->custom2_id;
    $product->custom3_id = $request->custom3_id;
    $product->full_price = $request->full_price;
    $product->discount = $request->discount;
    $product->discount_price = $product->full_price - ($product->full_price * ($product->discount / 100));
    $product->qtd_storage = $request->qtd_storage;
    $product->short_description = $request->short_description;
    $product->long_description = $request->long_description;
    $product->additional_information = $request->myTextarea;

    // Atualize as imagens apenas se um novo arquivo for fornecido
    // (verifique e atualize as imagens sem sobrescrever os valores existentes)
    // Mantenha o código que lida com o upload das imagens

    $product->save();

    return redirect('/products')->with('success', 'Product updated successfully.');
}

public function addToCart(Request $request)
{
    //dd($request->all());
    // Capture os dados do formulário
    $product_id = $request->product_id;
    $product = $request->product_name;
    $preco_unitario = $request->product_price; // Substitua pelo preço unitário apropriado
    $vl_desconto_unitario = $request->discount_price; // Substitua pelo valor do desconto apropriado
    $per_desconto_unitario = 0.00; // Substitua pela porcentagem de desconto apropriada
    $customizacao1 = $request->custom1; // Substitua pela opção correta
    $acressimo1 = 0.00; // Substitua pelo acréscimo apropriado
    $customizacao2 = $request->custom2; // Substitua pela opção correta
    $acressimo2 = 0.00; // Substitua pelo acréscimo apropriado
    $customizacao3 = $request->custom3; // Substitua pela opção correta
    $acressimo3 = 0.00; // Substitua pelo acréscimo apropriado
    $quantidade = $request->itemQuantity;
    $valor_total = ($preco_unitario - $vl_desconto_unitario + $acressimo1 + $acressimo2 + $acressimo3) * $quantidade;
    $desconto_cupom = 0.00; // Substitua pelo desconto do cupom apropriado
    $cupom_id = '00'; // Substitua pelo ID do cupom apropriado
    $codigo_cupom = ''; // Substitua pelo código do cupom apropriado
    $valor_desc_cupom = 0.00; // Substitua pelo valor do desconto do cupom apropriado
    $dataHoraAtual = now(); // Obtém a data e hora atual
    $validade = $dataHoraAtual->addDay();
    $validade_cupom = $validade;
    $frete = 0.00; // Substitua pelo valor do frete apropriado
    $peso = 0; // Substitua pelo peso apropriado
    $status = 'Em andamento'; // Substitua pelo status apropriado
    $imagem = $request->image1; // Substitua pelo caminho da imagem apropriado
    $moeda = 'BRL'; // Substitua pela moeda apropriada
    $subtotal = ($preco_unitario - $vl_desconto_unitario + $acressimo1 + $acressimo2 + $acressimo3) * $quantidade;
    $user_id =  $request->user_id; // Ou obtenha o ID do usuário de alguma outra forma


    // Insira os dados na tabela cart_items usando o Eloquent ORM
    $cartItem = CartItem::create([
        'product_id'=>$product_id,
        'product_name' => $product,
        'preco_unitario' => $preco_unitario,
        'vl_desconto_unitario' => $vl_desconto_unitario,
        'per_desconto_unitario' => $per_desconto_unitario,
        'customizacao1' => $customizacao1,
        'acressimo1' => $acressimo1,
        'customizacao2' => $customizacao2,
        'acressimo2' => $acressimo2,
        'customizacao3' => $customizacao3,
        'acressimo3' => $acressimo3,
        'quantidade' => $quantidade,
        'valor_total' => $valor_total,
        'desconto_cupom' => $desconto_cupom,
        'cupom_id' => $cupom_id,
        'codigo_cupom' => $codigo_cupom,
        'valor_desc_cupom' => $valor_desc_cupom,
        'validade_cart' => $validade,
        'validade_cupom'=>$validade_cupom,
        'frete' => $frete,
        'peso' => $peso,
        'status' => $status,
        'imagem' => $imagem,
        'moeda' => $moeda,
        'subtotal' => $subtotal,
        'user_id' => $user_id,
    ]);

    // Salve o objeto CartItem no banco de dados
    $cartItem->save();


    // Redirecione de volta para a página do carrinho ou faça o que for necessário
    return redirect()->route('marketplace'); // Substitua 'carrinho' pelo nome da rota da página do carrinho
}




    public function cartadditen(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect('/products')->with('error', 'Product not found.');
        }

        $product->category_id = $request->category_id;
        $product->custom1_id = $request->custom1_id;
        $product->custom2_id = $request->custom2_id;
        $product->custom3_id = $request->custom3_id;
        $product->full_price = $request->full_price;
        $product->discount = $request->discount;
        $product->discount_price = $product->full_price - ($product->full_price * ($product->discount / 100));
        $product->qtd_storage = $request->qtd_storage;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->additional_information = $request->myTextarea;

        // Atualize as imagens apenas se um novo arquivo for fornecido
        // (verifique e atualize as imagens sem sobrescrever os valores existentes)
        // Mantenha o código que lida com o upload das imagens

        $product->save();

        return redirect('/products')->with('success', 'Product updated successfully.');
    }

    public function saveReview(Request $request)
    {
        // Valide os dados do formulário, se necessário
        $request->validate([
            'message' => 'required',
        ]);

        // Crie uma nova instância do modelo Review e atribua os valores
        $review = new Review([
            'user_id' => $request->input('user_id'),
            'user_name' => $request->input('user_name'),
            'product_id' => $request->input('product_id'),
            'text1' => $request->input('message'),
        ]);

        // Salve a avaliação no banco de dados
        $review->save();

        // Redirecione o usuário após a conclusão do processo
        return redirect()->back()->with('success', 'Avaliação enviada com sucesso!');
    }

    public function cart()
    {
        $categories = DB::table('categories')->whereNull('deleted_at')->get();

        $cart_items = DB::table('cart_items') // Use "cart_items" em vez de "CartItem"
            ->whereNull('deleted_at')
            ->where('user_id', Auth::user()->id)
            ->whereNotIn('product_id', function ($query) {
                $query->select('id')
                    ->from('products')
                    ->where('blocked', true);
            })
            ->get();

        $categoriesWithProductCount = $categories->map(function ($category) {
            $productCount = DB::table('products')
                ->where('category_id', $category->id)
                ->whereNull('deleted_at')
                ->count();

            $category->productCount = $productCount;
            return $category;
        });

       return view ('market\cart')
                ->with(['categories' => $categoriesWithProductCount])
                ->with(['cart_items' => $cart_items]);
    }
    public function contact()
    {
        return view ('market\contact');
    }
    public function checkout()
    {
        return view ('market\checkout');
    }


}
