<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::with('cours')->get();
        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cours = Cours::all();
        return view('etudiants.create', compact('cours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'idcours' => 'required|exists:cours,id',
        ]);

        Etudiant::create($request->all());
        return redirect()->route('etudiants.index')->with('success', 'Etudiant ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $cours = Cours::all();
        return view('etudiants.edit', compact('etudiant', 'cours'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'idcours' => 'required|exists:cours,id',
        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());
        return redirect()->route('etudiants.index')->with('success', 'Etudiant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with('success', 'Etudiant supprimé avec succès.');
    }
}
