<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{
    // Affichage le contenu de la base
    public function index(){
        //Todo::factory()->count(15)->create();
        $todos = Todo::all();
        return view('accueil', compact('todos'));
    }

    // Enregistrement de mes données en base
     /*****
     * Méthode pour enregistrer une tâche
     * dans la base de données
     * 
     */
    public function create(Request $request): RedirectResponse {
        $request->validate([
            'task' => 'required | min:10'
        ]);
        $todo = new Todo();
        $todo->task = $request->task;
        $todo->status = 'n';
        $todo->save();
        
        // dd()
        //dd($request);
        return redirect('/');
        //return view('accueil');
    }

    // Mise à jour d'une tâche dans la base
    /***************************************
     * Mettre à jour une tâche
     * à partir de son Id = $id
     * 
     */
    public function update($id){
        // Recherche de la tâche en fonction de son $id
        $todo = Todo::find($id);
        // Affectation de la modification
        $todo->status = 'o';
        // Mise à jour de la tâche
        $todo->save();
        //dd('update ici', $id, $todo->status);
        // retour vers la page d'accueil
        return redirect('/');
    }

    // Suppression d'une tâche dans la base
    /***************************************
     * Supprimer une tâche
     * à partir de son Id = $id
     * 
     */
    public function delete($id){
        // Recherche de la tâche en fonction de son $id
        $todo = Todo::find($id);
        // Suppression de la tâche
        $todo->delete();
        // retour vers la page d'accueil
        return redirect('/');
    }
}
