<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Variation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    public function testCategory()
    {
        // Obtenha os dados das categorias a serem exibidas na view
        $categories = DB::table('categories')->whereNull('deleted_at')->get();

        return view('test/testCategory', compact('categories'));
    }

    public function testOffers()
    {
        // Obtenha os dados das ofertas a serem exibidas na view
        $offers = Offer::all();

        return view('test/testOffers', compact('offers'));
    }

    public function testProducts()
    {
        // Obtenha os dados dos produtos a serem exibidos na view
        $products = Product::all();

        return view('test/testProducts', compact('products'));
    }

    public function testVariations()
    {
        // Obtenha os dados das variações a serem exibidas na view
        $variations = Variation::all();

        return view('test/testVariations', compact('variations'));
    }

    public function testTags()
    {
        // Obtenha os dados das tags a serem exibidas na view
        $tags = Tag::all();

        return view('test/testTags', compact('tags'));
    }
}
