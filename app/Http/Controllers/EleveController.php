<?php

namespace App\Http\Controllers;

use App\Http\Requests\EleveRequest;
use Illuminate\Http\Request;
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
        // $eleves = EleveModel::paginate(5);
        $eleves = EleveModel::all();
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
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nom' => 'required|between:5,10',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);
        $formFields['password'] = Hash::make($request->password);
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('eleves', 'public');
        }
        EleveModel::create($formFields);
        return redirect()->route('eleves.index')->with('success', 'Enregistrement créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EleveModel $eleve)
    {
        // $eleves = EleveModel::findOrFail($elefe);
        return view('eleves.show', compact('eleve'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EleveModel $eleve)
    {
        // $eleve = EleveModel::findOrFail($eleve); 
        return view('eleves.edit', compact('eleve'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EleveRequest $request, EleveModel $eleve)
{
    $formFields = $request->validate([
        'nom' => 'required|between:5,10',
        'prenom' => 'required',
        'email' => 'required|email',
        'password' => 'nullable|confirmed', // Make password optional
        'image' => 'image|mimes:jpg,png,jpeg'
    ]);

    // Check if a new password was provided
    if ($request->filled('password')) {
        $formFields['password'] = Hash::make($request->password); // Hash the new password
    } else {
        unset($formFields['password']); // Do not update the password
    }

    // Handle the image upload if a new file is provided
    if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('eleves', 'public');
    }

    // Update the model with the provided fields
    $eleve->update($formFields);

    return redirect()->route('eleves.show', $eleve->id)->with('success', 'La modification a été très bien effectuée.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EleveModel $eleve)
    {
        // TODO: DESTROY method
        // $eleve = EleveModel::destroy($id);
        // $eleve->delete();
        // *: Delete method
        $eleve->delete();
        return to_route('eleves.index')->with('success', 'Enregistrement supprimé avec succès.');
    }

    public function search(Request $request)
    {
        $eleves = EleveModel::where('id', 'LIKE', '%' . $request->search . '%')->get();
        return view('eleves.index', compact('eleves'));
    }

    public function login()
    {
        return view('eleves.login');
    }

    public function loginVerifier(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return to_route('eleves.index')->with('success', 'Vous êtes bien connecté pour le permission ' . $email);
        }else{
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
