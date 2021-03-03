<?php

namespace App\Http\Controllers;
use App\Models\depenses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class depensescontroller extends Controller
{
/* ******************************************************************* */    
    public function depensesJ()
    {
       $Date2=Carbon::now()->format('Y-m-d');  
       $DepObjects = DB::table('DEPENSES')
                      ->where('Date', '=', $Date2)
                      ->get();

     
        $Total = DB::table('DEPENSES')
                    ->where('Date', '=', $Date2)
                    ->sum('Dépense');

        return view('depensesJ',compact('DepObjects'))
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('Date2', $Date2)
        ->with('Totalpg',$Total);
    }
/* ******************************************************************* */
    public function filtredepensesJ($Mydate){
        $DepObjects = DB::table('DEPENSES')
                       ->where('Date', '=', $Mydate)
                       ->get();
        
          $Total = DB::table('DEPENSES')
                       ->where('Date', '=', $Mydate)
                       ->sum('Dépense');


        return view('depensesJ',compact('DepObjects'))
               ->with('i', (request()->input('page', 1) - 1) * 5)
               ->with('Date2', $Mydate)
               ->with('Totalpg',$Total);

    }
/* ******************************************************************* */
    public function depensesM() {

       $MonthDate= Carbon::now()->month; 
       $AnneeDate=Carbon::now()->year; 

       $DepObjects = DB::table('DEPENSES')
                      ->whereMonth('Date', '=', $MonthDate)
                      ->whereYear('Date', '=', $AnneeDate)
                      ->select('Date', DB::raw('SUM(Dépense) as Montant'))
                      ->groupBy('Date')
                      ->get();

     
         $Total = DB::table('DEPENSES')
                    ->whereMonth('Date', '=', $MonthDate)
                    ->whereYear('Date', '=', $AnneeDate)
                     ->sum('Dépense');
                  
                  
                     $data = [];
                      foreach($DepObjects as $row) {
                        $data['label'][] = date("d", strtotime($row->Date));
                        $data['data'][] = $row->Montant;
                      }
                     $data['chart_data'] = json_encode($data);


        return view('depensesM',compact('DepObjects'))
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('MonthDate', $MonthDate)
        ->with('AnneeDate', $AnneeDate)
        ->with('Totalpg',$Total)
        ->with($data);
    }
/* ******************************************************************* */
    public function filtrerDepM($MyMonth, $MyYear)    
    {
            if (empty($MyMonth)) {
                $MyMonth=Carbon::now()->month;
                }  
            if (empty($MyYear)) {
                $MyYear=Carbon::now()->year;
                } 

       $MonthDate= $MyMonth; //Carbon::now()->month; 
       $AnneeDate=$MyYear; //Carbon::now()->year; 

       $DepObjects = DB::table('DEPENSES')
                      ->whereMonth('Date', '=', $MonthDate)
                      ->whereYear('Date', '=', $AnneeDate)
                      ->select('Date', DB::raw('SUM(Dépense) as Montant'))
                      ->groupBy('Date')
                      ->get();

     
         $Total = DB::table('DEPENSES')
                    ->whereMonth('Date', '=', $MonthDate)
                    ->whereYear('Date', '=', $AnneeDate)
                     ->sum('Dépense');
                  
                  
                     $data = [];
                      foreach($DepObjects as $row) {
                        $data['label'][] = date("d", strtotime($row->Date));
                        $data['data'][] = $row->Montant;
                      }
                     $data['chart_data'] = json_encode($data);


        return view('depensesM',compact('DepObjects'))
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('MonthDate', $MonthDate)
        ->with('AnneeDate', $AnneeDate)
        ->with('Totalpg',$Total)
        ->with($data);
    }

    
    /* ******************************************************************* */
    public function depensesA() {
      
        $AnneeDate='2020';//Carbon::now()->year; 

      $DepObjects = DB::table('DEPENSES')
                       ->whereYear('Date', '=', $AnneeDate)                       
                       ->select(DB::raw("MONTH(Date) as month"), DB::raw("SUM(Dépense) as Montant"))
                       ->groupBy(DB::raw('MONTH(Date)'))
                       ->orderBy(DB::raw('MONTH(Date)'))
                       ->get();
     
          $Total = DB::table('DEPENSES')
                     ->whereYear('Date', '=', $AnneeDate)
                      ->sum('Dépense');
                   
                      
                      
                  $data = [];
                  foreach($DepObjects as $row) {
                     
                      switch ($row->month) {
                        case "1":
                          $data['Mois'][] = 'Jan';
                          break;
                        case "2":
                          $data['Mois'][] = 'Fév';
                          break;
                        case "3":
                          $data['Mois'][] = 'Mar';
                          break;
                          case "4":
                            $data['Mois'][] = 'Avr';
                            break;
                          case "5":
                            $data['Mois'][] = 'Mai';
                            break;
                          case "6":
                            $data['Mois'][] = 'Jun';
                            break;                        
                            case "7":
                              $data['Mois'][] = 'Jul';
                              break;
                            case "8":
                              $data['Mois'][] = 'Aou';
                              break;
                            case "9":
                              $data['Mois'][] = 'Sep';
                              break;                        
                              case "10":
                                $data['Mois'][] = 'Oct';
                                break;
                              case "11":
                                $data['Mois'][] = 'Nov';
                                break;
                              case "12":
                                $data['Mois'][] = 'Déc';
                                break;
                           }

                         $data['label'][] = $row->month;
                         $data['data'][] = $row->Montant;
                       }
                      $data['chart_data'] = json_encode($data);
 
 
         return view('depensesA',compact('DepObjects'))
         ->with('i', (request()->input('page', 1) - 1) * 5)
         ->with('AnneeDate', $AnneeDate)
         ->with('Totalpg',$Total)
         ->with($data);
     }



}
