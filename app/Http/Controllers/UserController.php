<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       
        $users = User::with('role')->get();;
        return view('admin.index',compact('users'));
    }

    public function create()
    {
        // Logique pour afficher le formulaire de création d'utilisateur
    }

    public function store(Request $request)
    {
        // Logique pour traiter le formulaire de création d'utilisateur
    }

    public function show($id)
    {
        // Logique pour afficher les détails d'un utilisateur spécifique
    }

    public function edit($id)
    {
        // Logique pour afficher le formulaire de modification d'utilisateur
    }

    public function update(Request $request, $id)
    {
        // Logique pour traiter le formulaire de modification d'utilisateur
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Récupérer l'utilisateur à supprimer
    
        $user->delete(); // Supprimer l'utilisateur
    
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
    
}
