<?php

namespace App\Http\Controllers;

use App\Models\carnet_sante;
use App\Models\Ovins;
use Illuminate\Http\Request;

class CarnetSanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
     $carnet_sante = carnet_sante::where([
        ['dateDebutTraitement', '!=', NULL],
        [function ($query) use ($request){
            if (($term = $request->term)){
                $query->orWhere('dateDebutTraitement','LIKE', '%' . $term . '%')
               -> orWhere('dateFinTraitement','LIKE', '%' . $term . '%')
               ->orWhere('traitement','LIKE', '%' . $term . '%')
               ->orWhere('numOrdenance','LIKE', '%' . $term . '%')
               ->orWhere('nomProduit','LIKE', '%' . $term . '%')
               ->orWhere('motifDuTraitement','LIKE', '%' . $term . '%')
               ->orWhere('intervenant','LIKE', '%' . $term . '%')
               ->orWhere('dateRemiseEnVente','LIKE', '%' . $term . '%')
               ->orWhere('ovins_RFID','LIKE', '%' . $term . '%')
               ->orWhere('id','LIKE', '%' . $term . '%')->get();
            }
        }]
     ])
         ->orderBy('id', "desc")
         ->paginate(15);
         return view('carnet_sante.index' , compact('carnet_sante'))
         ->with('i', (request()->input('page', 1) -1) *5);

       
        /* $carnet_sante = carnet_sante::paginate(2);
        return view('carnet_sante.index', compact('carnet_sante'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ovins= Ovins::all();
        return view('carnet_sante.create',compact('ovins'));
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
            'dateDebutTraitement' => 'required',
            'dateFinTraitement' => 'required',
            'traitement' => 'required',
            'numOrdenance' => 'required',
            'nomProduit' => 'required',
            'motifDuTraitement' => 'required',
            'intervenant' => 'required',
            'dateRemiseEnVente' => 'required',
            'ovins_RFID' => 'required',
            
            ]);

            $carnet_sante = new carnet_sante;
            $carnet_sante->dateDebutTraitement = $request->dateDebutTraitement;
            $carnet_sante->dateFinTraitement= $request->dateFinTraitement;
            $carnet_sante->traitement= $request->traitement;
            $carnet_sante->numOrdenance = $request->numOrdenance;
            $carnet_sante->nomProduit = $request->nomProduit;
            $carnet_sante->motifDuTraitement = $request->motifDuTraitement;
            $carnet_sante->intervenant = $request->intervenant;
            $carnet_sante->dateRemiseEnVente = $request->dateRemiseEnVente;
            $carnet_sante->ovins_RFID = $request->ovins_RFID;
            
            if($carnet_sante->save()){
                return redirect()->route('carnet_sante.create')->with('info',"Le carnet de santé a été crée avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
            
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\carnet_sante  $carnet_sante
     * @return \Illuminate\Http\Response
     */
    public function show(carnet_sante $carnet_sante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\carnet_sante  $carnet_sante
     * @return \Illuminate\Http\Response
     */
    public function edit(carnet_sante $carnet_sante)
    {
        return view('carnet_sante.edit', compact('carnet_sante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carnet_sante  $carnet_sante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carnet_sante $carnet_sante)
    {
        $request->validate([
            'dateDebutTraitement' => 'required',
            'dateFinTraitement' => 'required',
            'traitement' => 'required',
            'numOrdenance' => 'required',
            'nomProduit' => 'required',
            'motifDuTraitement' => 'required',
            'intervenant' => 'required',
            'dateRemiseEnVente' => 'required',
            'ovins_RFID' => 'required',
            
            ]);
            $carnet_sante->dateDebutTraitement = $request->dateDebutTraitement;
            $carnet_sante->dateFinTraitement= $request->dateFinTraitement;
            $carnet_sante->traitement = $request->traitement;
            $carnet_sante->numOrdenance = $request->numOrdenance;
            $carnet_sante->nomProduit = $request->nomProduit;
            $carnet_sante->motifDuTraitement = $request->motifDuTraitement;
            $carnet_sante->intervenant = $request->intervenant;
            $carnet_sante->dateRemiseEnVente = $request->dateRemiseEnVente;
            $carnet_sante->ovins_RFID = $request->ovins_RFID;
            
            if($carnet_sante->save()){
                return redirect()->route('carnet_sante.create')->with('info',"Le carnet de santé a été crée avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\carnet_sante  $carnet_sante
     * @return \Illuminate\Http\Response
     */
    public function destroy(carnet_sante $carnet_sante)
    {
        $carnet_sante->delete();
        return redirect()->route('carnet_sante.index');
    }
}
