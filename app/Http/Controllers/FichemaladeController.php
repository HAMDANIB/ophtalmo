<?php

namespace App\Http\Controllers;
use App\Models\Fichemalade;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class FichemaladeController extends Controller
{
    public function index()
    {

/*     $FMObjects =DB::table('FICHE MALADE')
                ->where('DPrenom', '=', 'ALI')
                ->get(); */
        $Date2=Carbon::now()->format('Y-m-d');  
       $FMObjects = DB::table('FICHE MALADE')
                      ->leftJoin('REMARQUES ', 'FICHE MALADE.DNumeroMalade', '=', 'REMARQUES.NumeroMalade')
                      ->where('date', '=', $Date2)
                      ->get();

     
        $Total = DB::table('FICHE MALADE')
                    ->leftJoin('REMARQUES ', 'FICHE MALADE.DNumeroMalade', '=', 'REMARQUES.NumeroMalade')
                    ->where('date', '=', $Date2)
                    ->sum('PAYE');

        return view('fiche_malade',compact('FMObjects'))
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('Date2', $Date2)
        ->with('Totalpg',$Total);
    }

    public function filtreNewRegistre($Mydate){

        $FMObjects = DB::table('FICHE MALADE')
        ->leftJoin('REMARQUES ', 'FICHE MALADE.DNumeroMalade', '=', 'REMARQUES.NumeroMalade')
        ->where('date', '=', $Mydate)
        ->get();

        $Total = DB::table('FICHE MALADE')
        ->leftJoin('REMARQUES ', 'FICHE MALADE.DNumeroMalade', '=', 'REMARQUES.NumeroMalade')
        ->where('date', '=', $Mydate)
        ->sum('PAYE');

        return view('fiche_malade',compact('FMObjects'))
         ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('Date2', $Mydate)
        ->with('Totalpg',$Total);

    }
}
