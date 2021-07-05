<?php

namespace App\Http\Controllers;

use App\Models\alimentation;
use Illuminate\Http\Request;

class AlimentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $alimentation = alimentation::where([
            ['methode', '!=', NULL],
            [function ($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('methode','LIKE', '%' . $term . '%')
                   -> orWhere('categories_ovins','LIKE', '%' . $term . '%')
                   ->orWhere('typeAliments','LIKE', '%' . $term . '%')
                   ->orWhere('quantites','LIKE', '%' . $term . '%')
                   ->orWhere('periodes','LIKE', '%' . $term . '%')
                   ->orWhere('id','LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
             ->orderBy('id', "desc")
             ->paginate(15);
             return view('alimentation.index' , compact('alimentation'))
             ->with('i', (request()->input('page', 1) -1) *5);

       /* $alimentation = alimentation::paginate(5);
        return view('alimentation.index', compact('alimentation'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alimentation.create');
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
            'categories_ovins' => 'required',
            'typeAliments' => 'required',
            'quantites' => 'required',
            'periodes' => 'required',
            'methode' => 'required',
            ]);

        $alimentation = new Alimentation;
        $alimentation->categories_ovins = $request->categories_ovins;
        $alimentation->typeAliments = $request->typeAliments;
        $alimentation->quantites = $request->quantites;
        $alimentation->periodes = $request->periodes;
        $alimentation->methode = $request->methode;

        if($alimentation->save()){
            return redirect()->route('alimentation.create')->with('info',"L'alimentation  a été crée avec succès");
        }
        else{
            
            return back()->with('error', 'Oops! Echec de Sauvegarde');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function show(alimentation $alimentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function edit(alimentation $alimentation)
    {
        return view('alimentation.edit', compact('alimentation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alimentation $alimentation)
    {
        $request->validate([
            'categories_ovins' => 'required',
            'typeAliments' => 'required',
            'quantites' => 'required',
            'periodes' => 'required',
            'methode' => 'required',
            ]);
            $alimentation->categories_ovins = $request->categories_ovins;
            $alimentation->typeAliments = $request->typeAliments;
            $alimentation->quantites = $request->quantites;
            $alimentation->periodes = $request->periodes;
            $alimentation->methode = $request->methode;
       
        if($alimentation->save()){
            return redirect()->route('alimentation.create')->with('info',"L'alimentation  a été crée avec succès");
        }
        else{
            
            return back()->with('error', 'Oops! Echec de Sauvegarde');
        }
        
    } 


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\alimentation  $alimentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(alimentation $alimentation)
    {
        $alimentation->delete();
        return redirect()->route('alimentation.index');
    }
}
