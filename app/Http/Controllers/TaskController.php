<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //controle usado para acessar rota

        return view('task');

    }
    public function listpcp()
    {
        //controle usado para acessar rota

        return view('task-list\example');

    }


}
