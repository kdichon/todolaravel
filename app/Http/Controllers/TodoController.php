<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index(){
        
        return view('accueil');
    }
    // Enregistrement de mes données en base
    public function store(Request $request): RedirectResponse {

        $todo = new Todo();
        $todo->task = $request->task;
        $todo->status = 'n';
        $todo->save();
        
        //dd($request);
        return redirect('/');
    }
}
