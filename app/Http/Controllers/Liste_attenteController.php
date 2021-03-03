<?php

namespace App\Http\Controllers;
use App\Models\liste_attente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Liste_attenteController extends Controller
{
    public function index()
    {
     $Date2=Carbon::now()->format('Y-m-d');  
    $LAObjects =DB::table('liste_attente')
                    ->where('date', '=', $Date2)
                    ->get();
       
        return view('liste_attente',compact('LAObjects'))
         ->with('i', (request()->input('page', 1) - 1) * 5)
         ->with('Date1', $Date2);
           
    }

    public function filtreListeAttente($Mydate){

        $LAObjects =DB::table('liste_attente')
        ->where('date', '=', $Mydate)  /* ->format('d-m-Y')) */ 
        ->get();
        return view('liste_attente',compact('LAObjects'))
         ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('Date1', $Mydate);

    }
}
