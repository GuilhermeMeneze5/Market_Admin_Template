<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Models\Environment;
use App\Models\userenvirolment;
use App\Mail\Mail_Environment;
use Illuminate\Support\Facades\Mail;



class RegisterEnvironmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('createinstitution');
    }

    public function store(Request $request){
        Environment::create([
            'title' => $request->title,
            $title = $request->title,
            'cep'=> $request ->cep,
            'uf'=> $request ->uf,
            'cidade'=> $request ->city,
            'endereco'=> $request ->address,
            'email'=> $request ->email,
            $XID_Token=rand(),
            'XID_Token'=>$XID_Token,
            $email=$request->email,

        ]);


        $data = array(
            'title'=>$title,
            'token'=>$XID_Token,
        );

        return redirect('/home');

      //  Mail::to($email) ->send(new Mail_Environment($data));

    }
}
