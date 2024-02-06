<?php

namespace App\Http\Controllers;

use App\Exports\UserDataExports;
use App\Exports\EmployeeInformationExport;
use App\Imports\UserDataImport;
use App\Models\BankInfo;
use App\Models\Benefit;
use App\Models\Compensation;
use App\Models\ContactInfo;
use App\Models\EducationalInfo;
use App\Models\User;
use App\Models\LeaveRequest;
use App\Models\Employee;
use App\Models\Experience;
use App\Models\Person;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Gate;
use Dompdf\Dompdf;


use Illuminate\Http\Request;
//use Elibyy\TCPDF\Facades\TCPDF;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view-reports')) {
            return back()->with('error', 'Access denied!');
        }

        $users = User::all();
        return view('report.report', compact("users"));
    }

    public function leaveTimeOff()
    {
        if (!Gate::allows('view-reports')) {
            return back()->with('error', 'Access denied!');
        }

        $leaveData = LeaveRequest::all(); // Retrieve all leave records from the database

        return view('report.leaveReport', compact('leaveData'));
    }

    public function generatePDF(Request $request)
    {
        if (!Gate::allows('generate-reports')) {
            return back()->with('error', 'Access denied!');
        }

        $users = User::all();
        $pdf = PDF::loadView('report.pdf', ['users' => $users]);
        set_time_limit(1000);
        return $pdf->download('report.pdf');
    }

    public function viewPDF(Request $request)
    {
        $users = User::all();
        $pdf = PDF::loadView('report.pdf', ['users' => $users]);

        return $pdf->stream();
    }


    public function generateExcel(Request $request)
    {
        if (!Gate::allows('generate-reports')) {
            return back()->with('error', 'Access denied!');
        }

        return Excel::download(new UserDataExports, 'users.xlsx');
    }
    public function importExcelDisplay()
    {
        if (!Gate::allows('import-excels')) {
            return back()->with('error', 'Access denied!');
        }

        return view('report.import');
    }
    public function importExcel(Request $request)
    {
        if (!Gate::allows('import-excels')) {
            return back()->with('error', 'Access denied!');
        }

        Excel::import(new UserDataImport, request()->file('excel'));

        return redirect('/user/report')->with('success', 'All good!');
    }

    public function employeeInfo()
    {

        return view('report.employee', ['person' => Person::all(), 'users' => User::all(), 'selected_columns' => [1, 2, 3, 4, 5]]);
    }

    public function employeeExcel(Request $request)
    {


        $selectedColumns = $request->input('columns');
        $queryP = Person::query();
        $queryC = ContactInfo::query();
        $queryE = Employee::query();
        $queryEdu = EducationalInfo::query();
        $queryEx = Experience::query();
        $queryComp = Compensation::query();
        $queryBen = Benefit::query();
        $queryBak = BankInfo::query();

        $per = false;
        $con = false;
        $emp = false;
        $edu = false;
        $ex = false;
        $comp = false;
        $ben = false;
        $bak = false;

        try {

            foreach ($selectedColumns as $table => $columns) {
                if ($table == 'people') {
                    $queryP->select($columns);
                    global $per;
                    $per = true;
                } else if ($table == 'contact_info') {
                    $queryC->select($columns);
                    global $con;
                    $con = true;
                } else if ($table == 'employee') {
                    $queryE->select($columns);
                    global $emp;
                    $emp = true;
                } else if ($table == 'educational_info') {
                    $queryEdu->select($columns);
                    global $edu;
                    $edu = true;
                } else if ($table == 'experience') {
                    $queryEx->select($columns);
                    global $ex;
                    $ex = true;
                } else if ($table == 'compensation') {
                    $queryComp->select($columns);
                    global $comp;
                    $comp = true;
                } else if ($table == 'benefits') {
                    $queryBen->select($columns);
                    global $ben;
                    $ben = true;
                } else if ($table == 'bank_info') {
                    $queryBak->select($columns);
                    global $bak;
                    $bak = true;
                } else{

                }
            }
        } catch (\Exception $e) {
            // Database connection failed
            return back()->with('error', 'noting is selected');
        }

        $data1 = null;
        $data2 = null;
        $data3 = null;
        $data4 = null;
        $data5 = null;
        $data6 = null;
        $data7 = null;
        $data8 = null;

        if ($per)
            $data1 = $queryP->get()->toArray();

        if ($con)
            $data2 = $queryC->get()->toArray();

        if ($emp)
           $data3 = $queryE->get()->toArray();

        if ($edu)
           $data4 = $queryEdu->get()->toArray();

        if ($ex)
           $data5 = $queryEx->get()->toArray();

        if ($comp)
           $data6 = $queryComp->get()->toArray();

        if ($ben)
           $data7 = $queryComp->get()->toArray();

        if ($bak)
           $data8 = $queryBak->get()->toArray();



        $data = [];

        for ($i = 0; $i < Person::all()->count(); $i++) {
            // $data[] = array_merge($per ? $data1[$i] : [], $con ? $data2[$i] : [], $emp ? $data3[$i] : [], $edu ? $data4[$i] : [], $ex ? $data5[$i] : [], $comp ? $data6[$i] : [], $ben ? $data7[$i] : [], $bak ? $data8[$i] : []);
            $data[] = array_merge($data1!=null ? $data1[$i] : [], $data2!=null ? $data2[$i] : [], $data3!=null ? $data3[$i] : [], $data4!=null ? $data4[$i] : [], $data5!=null ? $data5[$i] : [], $data6!=null ? $data6[$i] : [], $data7!=null ? $data7[$i] : [], $data8!=null ? $data8[$i] : []);
        }

        return Excel::download(new EmployeeInformationExport($data), 'employee_information.xlsx');
    }


    public function employeePdf(){

        $person = Person::all();
        $pdf = PDF::loadView('report.employeePdf', ['person'=>$person]);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('employee_report.pdf');
    }

    public function leaveInfo()
    {

        return view('report.leave', ['leaveRequests' => LeaveRequest::all(), 'users' => User::all(), 'selected_columns' => [1, 2, 3, 4, 5]]);
    }

    public function leaveExcel(Request $request){

        $selectedColumns = $request->input('columns');
        $queryP = Person::query();
        $queryE = Employee::query();
        $queryLev = LeaveRequest::query();


        $per = false;
        $emp = false;
        $lev = false;

        try {

            foreach ($selectedColumns as $table => $columns) {
                if ($table == 'leave_requests') {
                    $queryLev->select($columns)->where('status', 'approved');
                    global $lev;
                    $lev = true;
                } else{

                }
            }
        } catch (\Exception $e) {
            // Database connection failed
            return back()->with('error', 'noting is selected');
        }

        $data1 = null;
        $data2 = null;
        $data3 = null;
        $data4 = null;
        $data5 = null;
        $data6 = null;
        $data7 = null;
        $data8 = null;

        if ($per && $emp)
            $data1 = $queryP->get()->toArray();

        // if ($con)
        //     $data2 = $queryC->get()->toArray();

        // if ($emp)
        //    $data3 = $queryE->get()->toArray();

        // if ($edu)
        //    $data4 = $queryEdu->get()->toArray();

        // if ($ex)
        //    $data5 = $queryEx->get()->toArray();

        // if ($comp)
        //    $data6 = $queryComp->get()->toArray();

        // if ($ben)
        //    $data7 = $queryComp->get()->toArray();

        // if ($bak)
        //    $data8 = $queryBak->get()->toArray();



        // $data = [];
        // for ($i = 0; $i < Employee::all()->count(); $i++) {
        //     // $data[] = array_merge($per ? $data1[$i] : [], $con ? $data2[$i] : [], $emp ? $data3[$i] : [], $edu ? $data4[$i] : [], $ex ? $data5[$i] : [], $comp ? $data6[$i] : [], $ben ? $data7[$i] : [], $bak ? $data8[$i] : []);
        //     $data[] = array_merge($data1!=null ? $data1[$i] : [], $data2!=null ? $data2[$i] : [], $data3!=null ? $data3[$i] : [], $data4!=null ? $data4[$i] : [], $data5!=null ? $data5[$i] : [], $data6!=null ? $data6[$i] : [], $data7!=null ? $data7[$i] : [], $data8!=null ? $data8[$i] : []);
        // }

        return Excel::download(new EmployeeInformationExport($data), 'employee_information.xlsx');
    }
}
