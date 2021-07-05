<?php

namespace App\Http\Controllers;
use App\Models\Ovins;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class PrintController extends Controller
{
    
    public function index()
    {
          return view("viewPrint");
    }
    public function printPreview()
    {
          $ovins=Ovins::all();
          return view('printPreview',compact('ovins'));
    }
}
