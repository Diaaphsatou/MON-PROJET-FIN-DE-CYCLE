<?php

namespace App\Http\Controllers;

use App\Models\vaccination;
use App\Models\Ovins;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vaccination = vaccination::where([
            ['type', '!=', NULL],
            [function ($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('type','LIKE', '%' . $term . '%')
                   -> orWhere('date','LIKE', '%' . $term . '%')
                   ->orWhere('mode','LIKE', '%' . $term . '%')
                   ->orWhere('ovins_RFID','LIKE', '%' . $term . '%')
                   ->orWhere('id','LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
             ->orderBy('id', "desc")
             ->paginate(15);
             return view('vaccination.index' , compact('vaccination'))
             ->with('i', (request()->input('page', 1) -1) *5);
       
        /* $vaccination = vaccination::paginate(2);
        return view('vaccination.index', compact('vaccination'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ovins= Ovins::all();
        return view('vaccination.create',compact('ovins'));
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
            'type' => 'required',
            'date' => 'required',
            'mode' => 'required',
            'ovins_RFID' => 'required',
            ]);

            $vaccination = new vaccination;
            $vaccination->type = $request->type;
            $vaccination->date= $request->date;
            $vaccination->mode = $request->mode;
            $vaccination->ovins_RFID = $request->ovins_RFID;
            
            if($vaccination->save()){
                return redirect()->route('vaccination.create')->with('info',"Une vaccination a été enregistrée avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function show(vaccination $vaccination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function edit(vaccination $vaccination)
    {
        return view('vaccination.edit', compact('vaccination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vaccination $vaccination)
    {
        $request->validate([
            'type' => 'required',
            'date' => 'required',
            'mode' => 'required',
            'ovins_RFID' => 'required',
            ]);

            $vaccination->type = $request->type;
            $vaccination->date = $request->date;
            $vaccination->mode = $request->mode;
            $vaccination->ovins_RFID = $request->ovins_RFID;
            
            if($vaccination->save()){
                return redirect()->route('vaccination.create')->with('info',"Une vaccination a été enregistrée avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function destroy(vaccination $vaccination)
    {
        $vaccination->delete();
        return redirect()->route('vaccination.index');
    }
}
