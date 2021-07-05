<?php

namespace App\Http\Controllers;

use App\Models\bon_livraison;
use Illuminate\Http\Request;

class BonLivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     $bon_livraison = bon_livraison::where([
        ['num_bon_livraison', '!=', NULL],
        [function ($query) use ($request){
            if (($term = $request->term)){
                $query->orWhere('num_bon_livraison','LIKE', '%' . $term . '%')
               -> orWhere('tel_bergerie','LIKE', '%' . $term . '%')
               ->orWhere('adresse','LIKE', '%' . $term . '%')
               ->orWhere('num_client','LIKE', '%' . $term . '%')
               ->orWhere('num_commande','LIKE', '%' . $term . '%')
               ->orWhere('date_commande','LIKE', '%' . $term . '%')
               ->orWhere('description_livraison','LIKE', '%' . $term . '%')
               ->orWhere('quantite_commande','LIKE', '%' . $term . '%')
               ->orWhere('quantite_livrer','LIKE', '%' . $term . '%')
               ->orWhere('quantite_restant_a_livrer','LIKE', '%' . $term . '%')
               ->orWhere('observations','LIKE', '%' . $term . '%')
               ->orWhere('id','LIKE', '%' . $term . '%')->get();
            }
        }]
    ])
         ->orderBy('id', "desc")
         ->paginate(15);
         return view('bon_livraison.index' , compact('bon_livraison'))
         ->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bon_livraison.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'num_bon_livraison' => 'required',
            'tel_bergerie' => 'required',
            'adresse' => 'required',
            'num_client' => 'required',
            'num_commande' => 'required',
            'date_commande' => 'required',
            'description_livraison' => 'required',
            'quantite_commande'=>'required',
            'quantite_livrer'=>'required',
            'quantite_restant_a_livrer'=>'required',
            'observations'=>'required'
        ]);

        $bon_livraison = new bon_livraison;
        $bon_livraison->num_bon_livraison = $request->num_bon_livraison;
        $bon_livraison->tel_bergerie = $request->tel_bergerie;
        $bon_livraison->adresse = $request->adresse;
        $bon_livraison->num_client = $request->num_client;
        $bon_livraison->num_commande = $request->num_commande;
        $bon_livraison->date_commande = $request->date_commande;
        $bon_livraison->description_livraison = $request->description_livraison;
        $bon_livraison->quantite_commande = $request->quantite_commande;
        $bon_livraison->quantite_livrer = $request->quantite_livrer;
        $bon_livraison->quantite_restant_a_livrer = $request->quantite_restant_a_livrer;
        $bon_livraison->observations = $request->observations;

        if($bon_livraison->save()){
            return redirect()->route('bon_livraison.create')->with('info',"Le bon de libraison a été enregistré avec succès");
        }
        else{
            
            return back()->with('error', 'Oops! Echec de Sauvegarde');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bon_livraison  $bon_livraison
     * @return \Illuminate\Http\Response
     */
    public function show(bon_livraison $bon_livraison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bon_livraison  $bon_livraison
     * @return \Illuminate\Http\Response
     */
    public function edit(bon_livraison $bon_livraison)
    {
        return view('bon_livraison.edit', compact('bon_livraison'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bon_livraison  $bon_livraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bon_livraison $bon_livraison)
    {
        $request->validate([
            'num_bon_livraison' => 'required',
            'tel_bergerie' => 'required',
            'adresse' => 'required',
            'num_client' => 'required',
            'num_commande' => 'required',
            'date_commande' => 'required',
            'description_livraison' => 'required',
            'quantite_commande'=>'required',
            'quantite_livrer'=>'required',
            'quantite_restant_a_livrer'=>'required',
            'observations'=>'required'
        ]);

        $bon_livraison->num_bon_livraison = $request->num_bon_livraison;
        $bon_livraison->tel_bergerie = $request->tel_bergerie;
        $bon_livraison->adresse = $request->adresse;
        $bon_livraison->num_client = $request->num_client;
        $bon_livraison->num_commande = $request->num_commande;
        $bon_livraison->date_commande = $request->date_commande;
        $bon_livraison->description_livraison = $request->description_livraison;
        $bon_livraison->quantite_commande = $request->quantite_commande;
        $bon_livraison->quantite_livrer = $request->quantite_livrer;
        $bon_livraison->quantite_restant_a_livrer = $request->quantite_restant_a_livrer;
        $bon_livraison->observations = $request->observations;

        if($bon_livraison->save()){
            return redirect()->route('bon_livraison.create')->with('info',"Le bon de libraison a été enregistré avec succès");
        }
        else{
            
            return back()->with('error', 'Oops! Echec de Sauvegarde');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bon_livraison  $bon_livraison
     * @return \Illuminate\Http\Response
     */
    public function destroy(bon_livraison $bon_livraison)
    {
        $bon_livraison->delete();
        return redirect()->route('bon_livraison.index');
    }
}
