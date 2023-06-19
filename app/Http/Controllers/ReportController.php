<?php

namespace App\Http\Controllers;

use App\Exports\UserDataExports;
use App\Imports\UserDataImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Http\Request;
//use Elibyy\TCPDF\Facades\TCPDF;
use PDF;

class ReportController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('report.report', compact("users"));
    }

    public function leaveTimeOff()
    {
        $leaveData = Leave::all(); // Retrieve all leave records from the database

        return view('report.leaveReport', compact('leaveData'));
    }






    public function generatePDF(Request $request)
    {
        $users = User::all();
        $pdf = PDF::loadView('report.pdf', ['users'=>$users]);
        set_time_limit(1000);
        return $pdf->download('report.pdf');
    }

    public function viewPDF(Request $request)
    {
        $users = User::all();
        $pdf = PDF::loadView('report.pdf', ['users'=>$users]);

        return $pdf->stream();
    }


    public function generateExcel(Request $request)
    {
        return Excel::download(new UserDataExports, 'users.xlsx');
    }
    public function importExcelDisplay()
    {


         return view('report.import');
    }
    public function importExcel(Request $request)
    {
         Excel::import(new UserDataImport, request()->file('excel'));

         return redirect('/user/report')->with('success', 'All good!');
    }

}
