<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Profs;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours = Cours::with('prof')->get();
        return view('cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profs = Profs::all();
        return view('cours.create', compact('profs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'prof_id' => 'required|exists:profs,id',
        ]);

        Cours::create($request->all());

        return redirect()->route('cours.index')->with('success', 'Cours ajouté avec succès');
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
        $cours = Cours::findOrFail($id);
        $profs = Profs::all();
        return view('cours.edit', compact('cours', 'profs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required',
            'prof_id' => 'required|exists:profs,id',
        ]);

        $cours = Cours::findOrFail($id);
        $cours->update([
            'libelle' => $request->libelle,
            'prof_id' => $request->prof_id
        ]);

        return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();
        return redirect()->route('cours.index')->with('success', 'Cours supprimé avec succès');
    }
}
