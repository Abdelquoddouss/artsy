<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartenaire;
use App\Models\Partenaires;
use Illuminate\Http\Request;

class PartenairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partenaires = Partenaires::all();
        return view('admin.Partenaire', compact('partenaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.AddPartenaire');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartenaire  $request)
    {

        Partenaires::create($request->except('_token'));
    
        return redirect()->route('partenaire')->with('success', 'Partenaire ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partenaires $partenaires)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partenaires = Partenaires::find($id);
        return view('admin.EditPartenaire', compact('partenaires'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $partenaire = Partenaires::findOrFail($id);
        $partenaire->update($request->except('_token'));
    
        return redirect()->route('partenaire')->with('success', 'Partenaire mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partenaire = Partenaires::findOrFail($id);
        $partenaire->delete();
        return redirect()->route('partenaire')->with('success', 'Partenaire supprimé avec succès.');
    }
}
