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

    public function ajoute()
    {
        
    }
}
