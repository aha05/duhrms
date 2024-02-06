<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\VacancyRequest;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\returnSelf;



class VacancyRequestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('view-vacancy-requests-lists')) {
            return back()->with('error', 'Access denied!');
        }

        $vacancyRequests = VacancyRequest::with('department')->latest()->get();
        return view('vacancy.vacancy', ['vacancyRequests' => $vacancyRequests, 'departments' => Department::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('create-vacancy-requests')) {
            return back()->with('error', 'Access denied!');
        }

        return view('vacancy.apply', ['departments' => Department::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('create-vacancy-requests')) {
            return back()->with('error', 'Access denied!');
        }

        $data = request()->validate([
            'department' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'number_of_positions' => ['required', 'numeric'],
        ]);
        $data['status'] = 'pending';
        $data['department_id'] = request('department');
        $success = VacancyRequest::create($data);
        if ($success)
            return back()->with('success', 'Succeed');

        return back()->with('error', 'Failed');
    }

    public function filterByDepartment(){
        if (!Gate::allows('view-vacancy-requests-lists')) {
            return back()->with('error', 'Access denied!');
        }

        request()->validate([
            'department'=>['required'],
        ]);
        $department =  Department::find(request('department'));
        return view('vacancy.vacancy',['vacancyRequests'=>$department->vacancyRequests, 'departments' => Department::all(), 'depPrev'=>$department->full_name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
