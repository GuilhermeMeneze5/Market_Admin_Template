<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institution;




class RegisterInstitutionController extends Controller
{
    use Institution;
    protected $redirectTo = RouteServiceProvider::HOME;


    public function index(Request $request)
    {
        return view('createinstitution');
    }

    public function store(request $request)
    {
        $institurion = new Institution;
        $institurion-> id = request ->id;
        $institurion-> title = request ->title;
        $institurion-> cep = request ->cep;
        $institurion-> uf = request ->uf;
        $institurion-> city = request ->city;
        $institurion-> address = request ->address;
        $institurion-> email = request ->email;



        $institurion->save();
        return redirect('/');

    }
}
