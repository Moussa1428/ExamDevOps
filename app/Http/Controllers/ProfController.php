<?php

namespace App\Http\Controllers;

use App\Models\Profs;
use Illuminate\Http\Request;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profs = Profs::all();
        return view('profs.index', compact('profs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:profs',
        ]);

        // dd($request);

        $prof = new Profs();
        $prof->nom = $request->nom;
        $prof->prenom = $request->prenom;
        $prof->email = $request->email;
        $prof->save();
        return redirect()->route('profs.index')->with('success', 'Professeur ajouté avec succès');
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
    public function edit(Profs $prof)
    {
        return view('profs.edit', compact('prof'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profs $prof)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:profs,email,' . $prof->id,
        ]);

        $prof->update($request->all());

        return redirect()->route('profs.index')->with('success', 'Professeur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profs $prof)
    {
        $prof->delete();
        return redirect()->route('profs.index')->with('success', 'Professeur supprimé avec succès');
    }
}
