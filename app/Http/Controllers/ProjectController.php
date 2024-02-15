<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProject;
use App\Models\Partenaires;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.Project', compact('projects'));
    }


    public function index2()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partenaires = Partenaires::all();
    return view('admin.AddProject', compact('partenaires'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProject $request)
    {
        try{
            
        $project=Project::create($request->all());
        $project->addMediaFromRequest('img')->toMediaCollection('images');
        return redirect()->route('projects.index');

        }catch(\Exception $e){

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    

    public function show($id)
    {
        $project = Project::findOrFail($id);
        $users = User::all(); // Récupérez tous les utilisateurs
        return view('admin.DetailProject', compact('project', 'users'));
    }

    public function show2($id)
    {
        $users = User::all();
        $project = Project::findOrFail($id);
        return view('detailProjectUser', compact('project','users'));
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projects = Project::find($id);
        $partners = Partenaires::all();
        return view('admin.EditProject', compact('projects','partners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projects = Project::findOrFail($id);
        $projects->update($request->except('_token'));
        return redirect()->route('projects.index')->with('success', 'Project mis à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projects = Project::findOrFail($id);
        $projects->delete();
        return redirect()->route('projects')->with('success', 'Project supprimé avec succès.');
    }

    public function ajoute(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);
            $user = auth()->user(); // Récupérer l'utilisateur authentifié
    
            // Enregistrer la demande de participation dans la base de données avec le statut "en attente"
            $project->pendingUsers()->attach($user);
    
            // Rediriger avec un message de succès
            return redirect()->back()->with('success', 'Votre demande de participation a été soumise avec succès et est en attente d\'approbation.');
        } catch (\Exception $e) {
            // En cas d'erreur, rediriger avec un message d'erreur et le message d'erreur spécifique
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la soumission de votre demande de participation. Message d\'erreur : ' . $e->getMessage());
        }
    }

    public function ajoin()
{
    $projects = Project::all();
    return view('admin.AjouteArt', compact('projects'));
}

public function accept($id)
{
    try {
        $project = Project::findOrFail($id);
   
        $project->update(['status' => 'accepted']);

        return redirect()->back()->with('success', 'Le projet a été accepté avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'acceptation du projet. Message d\'erreur : ' . $e->getMessage());
    }
}

public function refuse($id)
{
    try {
        $project = Project::findOrFail($id);
        $project->update(['status' => 'refused']);

        return redirect()->back()->with('success', 'Le projet a été refusé avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur est survenue lors du refus du projet. Message d\'erreur : ' . $e->getMessage());
    }
}


    
    

    
    
}
