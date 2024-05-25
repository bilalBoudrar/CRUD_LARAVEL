<?php

namespace App\Http\Controllers;

use App\Http\Requests\EleveRequest;
use Illuminate\Http\Request;
use App\Models\ActiviteModel;
use App\Models\EleveModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves = EleveModel::paginate(5);
        return view('eleves.index', compact('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eleves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EleveRequest $request)
    {
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($request->password);
        EleveModel::create($formFields);
        return redirect()->route('index')->with('success', 'Enregistrement créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EleveModel $eleve)
    {
        // $eleves = EleveModel::findOrFail($elefe);
        $activites = ActiviteModel::all();
        $totalJours = $activites->sum('nombreJours');
        return view('eleves.show', compact('eleve', 'activites', 'totalJours'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $eleve = EleveModel::findOrFail($id);
        return view('eleves.edit', compact('eleve'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);
        $eleve = EleveModel::findOrFail($id);
        $eleve->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
        ]);
        return redirect()->route('index')->with('success', 'La modification à été trés bien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // TODO: Delete method
        // $eleve = EleveModel::findOrFail($id);
        // $eleve->delete();
        // *: Delete method
        EleveModel::destroy($id);
        return to_route('index')->with('success', 'Enregistrement supprimé avec succès.');
    }

    public function search(Request $request)
    {
        $eleves = EleveModel::where('id', 'LIKE', '%' . $request->search . '%')->get();
        return view('eleves.search', compact('eleves'));
    }

    public function login()
    {
        return view('eleves.login');
    }

    public function loginVerifier(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('index')->with('success', 'Vous êtes bien connecté pour le permission ' . $email);
        } else {
            return back()->withErrors([
                'email' => 'Email ou mot de passe incorrect',
            ])->onlyInput('email');
        }
    }
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('login')->with('success', 'Vous êtes bien déconnecté');
    }
}
