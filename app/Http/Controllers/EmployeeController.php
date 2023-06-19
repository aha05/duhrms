<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Person;
use App\Models\Benefit;
use App\Models\BankInfo;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Experience;
use App\Models\ContactInfo;
use Illuminate\Support\Str;
use App\Models\Compensation;
use Illuminate\Http\Request;
use App\Models\EducationalInfo;

class EmployeeController extends Controller
{
    public function register()
    {

        $status = request()->validate([

            'photo' => ['required', 'file'],
            'first_name' => ['required', 'alpha'],
            'middle_name' => ['required', 'alpha'],
            'last_name' => ['required', 'alpha'],
            'email' => ['required', 'email', 'unique:people'],
            'gender' => ['required', 'in:Male,male,Female,female,F,M'],
            'date_of_birth' => ['required', 'date'],
            'phone' => ['required', 'numeric', 'digits:10', 'unique:people'],
            'religion' => ['required'],
            'marital_status' => ['required'],
            'NO_of_children' => ['required', 'numeric'],
            'nationality' => ['required'],
            'region' => ['required'],
            'zone' => ['required'],
            'woreda' => ['required'],
            'kebele' => ['required'],

            'con_first_name' => ['required', 'alpha'],
            'con_last_name' => ['required', 'alpha'],
            'con_gender' => ['required', 'in:Male,male,Female,female,F,M'],
            'con_email' => ['required', 'email'],
            'con_phone' => ['required', 'numeric', 'digits:10'],
            'address' => ['required'],
            'relationship' => ['required', 'string'],

            'institution' => ['required', 'string'],
            'field' => ['required', 'string'],
            'level' => ['required', 'string', 'in:Phd.,Msc.,Bsc.'],
            'graduation' => ['required', 'integer'],
            'gpa'  => ['required', 'numeric'],

            'full_name' => ['required'],
            'bank_name' => ['required'],
            'account_number' => ['required', 'numeric'],
            'account_type' => ['required'],

            'company' => ['required'],
            'position' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'description' => ['required'],

            'job_title' => ['required'],
            'department' => ['required'],
            'position' => ['required'],
            'employment_type' => ['required'],
            'date_of_hire' => ['required', 'date'],
            'location' => ['required'],

        ]);



        if ($status) {
            $Person = Person::create([
                'photo' => substr(request("photo")->store("public/photos"), 14),
                'first_name' => Str::ucfirst(request('first_name')),
                'middle_name' => Str::ucfirst(request('middle_name')),
                'last_name' => Str::ucfirst(request('last_name')),
                'email' => request('email'),
                'gender' => request('gender'),
                'DOB' => request('date_of_birth'),
                'phone' => request('phone'),
                'religion' => request('religion'),
                'marital_status' => request('marital_status'),
                'NO_of_children' => request('NO_of_children'),
                'nationality' => request('nationality'),
                'region' => request('region'),
                'zone' => request('zone'),
                'woreda' => request('woreda'),
                'kebele' => request('kebele'),
            ]);


            $employee = Employee::create([
                'person_id' => $Person->id,
                'emp_id' => 'DU-EM00' . $Person->id,
                'job_title' => Str::ucfirst(request('job_title')),
                'position' => Str::ucfirst(request('position')),
                'employment_type' => request('employment_type'),
                'date_of_hire' => request('date_of_hire'),
                'location' => request('location'),
            ]);

            $employee->departments()->attach(request('department')); // assign department

            $Contact = ContactInfo::create([
                'employee_id' => $employee->id,
                'first_name' => Str::ucfirst(request('con_first_name')),
                'last_name' => Str::ucfirst(request('con_last_name')),
                'email' => request('con_email'),
                'gender' => request('con_gender'),
                'phone' => request('con_phone'),
                'address' => request('address'),
                'relationship' => request('relationship'),
            ]);

            $education = EducationalInfo::create([
                'employee_id' => $employee->id,
                'institution' => Str::ucfirst(request('institution')),
                'field' => Str::ucfirst(request('field')),
                'level' => request('level'),
                'year_of_graduation' => request('graduation'),
                'GPA' => request('gpa'),

            ]);

            $experience = Experience::create([
                'employee_id' => $employee->id,
                'company' => Str::ucfirst(request('company')),
                'position' => Str::ucfirst(request('position')),
                'start_date' => request('start_date'),
                'end_date' => request('end_date'),
                'description' => request('description'),

            ]);

            $bank = BankInfo::create([
                'employee_id' => $employee->id,
                'full_name' => Str::ucfirst(request('full_name')),
                'bank_name' => Str::ucfirst(request('bank_name')),
                'account_number' => request('account_number'),
                'account_type' => request('account_type'),
            ]);
        }

        if ($Person)
            return back()->with('success', 'Register successfully!');

        return back()->with('error', 'Unable to Register!');
    }

    public function index()
    {

        return view('employee.allemployee', ['person' => Person::all(), 'users' => User::all()]);
    }

    public function details(Person $person)
    {
        $employee  = $person->employee;
        $contact = $employee->contactInfo->first();

        return view('employee.datails', ['person' => $person, 'employee' => $employee, 'contact' => $contact, 'department' => Department::all()]);
    }

    public function updatePerson(Person $person)
    {

         $status = request()->validate([
            'photo' => ['required', 'file'],
            'first_name' => ['required', 'alpha'],
            'middle_name' => ['required', 'alpha'],
            'last_name' => ['required', 'alpha'],
            'email' => ['required', 'email'],
            'gender' => ['required', 'in:Male,male,Female,female,F,M'],
            'date_of_birth' => ['required', 'date'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'religion' => ['required'],
            'marital_status' => ['required'],
            'NO_of_children' => ['required', 'numeric'],
            'nationality' => ['required'],
            'region' => ['required'],
            'zone' => ['required'],
            'woreda' => ['required'],
            'kebele' => ['required'],

        ]);

        $data['first_name'] =  request('first_name');
        $data['middle_name'] = request('middle_name');
        $data['last_name'] = request('last_name');
        $data['email'] = request('email');
        $data['gender'] = request('gender');
        $data['DOB'] = request('date_of_birth');
        $data['phone'] = request('phone');
        $data['religion'] = request('religion');
        $data['marital_status'] = request('marital_status');
        $data['NO_of_children'] = request('NO_of_children');
        $data['nationality'] = request('nationality');
        $data['region'] = request('region');
        $data['zone'] = request('zone');
        $data['woreda'] = request('woreda');
        $data['kebele'] = request('kebele');


        if (request('photo')) {
            $str = request('photo')->store('public/photos');

            $data['photo'] = substr($str, 14);
        }
        $success = $person->update($data);

        if ($success)
            return back()->with('success', 'Update successfully!');

        return back()->with('error', 'Unable to Update!');
    }

    public function updatePersonPhoto(Person $person)
    {
        if (request('photo')) {
            $str = request('photo')->store('public/photos');
            $person->photo = substr($str, 14);
        }

        $person->save();

        return back();
    }

    public function updateContact(ContactInfo $contact)
    {

        $data = request()->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'in:Male,male,Female,female,F,M'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'address' => ['required', 'string'],
            'relationship' => ['required', 'string'],
        ]);

        $data['employee_id'] = $contact->id;
        $success = $contact->update($data);
        if ($success)
            return back()->with('success', 'Update successfully!');

        return back()->with('error', 'Unable to Update!');
    }

    public function editEmployee(Employee $employee)
    {
        request()->validate([
            'department' => ['required'],
        ]);

        $data = request()->validate([
            'job_title' => ['required'],
            'position' => ['required'],
            'employment_type' => ['required'],
            'date_of_hire' => ['required'],
            'location' => ['required'],
        ]);

        $data['person_id'] = $employee->person_id;
        $data['emp_id'] = 'DU-EM00' . $employee->person_id;


        $success = $employee->update($data);

        $employee->departments()->update(['department_id' => request('department'), 'employee_id' => $employee->id]); //! change department
        // $employee->departments()->attach(request('department')); // assign department

        if ($success)
            return back()->with('success', 'Update successfully!');

        return back()->with('error', 'Unable to Update!');
    }

    public function comp_benefit(Employee $employee)
    {

        $data = request()->validate([
            'salary' => ['required'],
            'pay_frequency' => ['required'],
            'overtime_rate' => ['required'],
            'bonus' => ['required'],
            'healthcare' => ['required'],
            'vacation' => ['required'],
            'retirement' => ['required'],
        ]);

        $temp1['employee_id'] = $employee->id;
        $temp1['salary'] = request('salary');
        $temp1['pay_frequency'] = request('pay_frequency');
        $temp1['overtime_rate'] = request('overtime_rate');
        $temp1['bonus'] = request('bonus');

        if (Compensation::exists())
            $success1 = $employee->compensation->update($temp1);

        $success1 = Compensation::create($temp1);



        $temp2['employee_id'] = $employee->id;
        $temp2['healthcare'] = request('healthcare');
        $temp2['vacation'] = request('vacation');
        $temp2['retirement'] = request('retirement');

        if (Benefit::exists())
            $success2 = $employee->benefit->update($temp2);
        $success2 = Benefit::create($temp2);


        if ($success1 && $success2)
            return back()->with('success', 'Update successfully!');

        return back()->with('error', 'Unable to Update!');
    }

    public function addEducation(Employee $employee)
    {

        $status = request()->validate([
            'institution' => ['required'],
            'field' => ['required'],
            'level' => ['required'],
            'graduation' => ['required'],
            'GPA'  => ['required'],
        ]);

        $education = EducationalInfo::create([
            'employee_id' => $employee->id,
            'institution' => Str::ucfirst(request('institution')),
            'field' => Str::ucfirst(request('field')),
            'level' => request('level'),
            'year_of_graduation' => request('graduation'),
            'GPA' => request('GPA'),
        ]);

        if ($education)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }

    public function editEducation(EducationalInfo $education)
    {

        $data = request()->validate([
            'institution' => ['required'],
            'field' => ['required'],
            'level' => ['required'],
            'graduation' => ['required'],
            'GPA'  => ['required'],
        ]);

        $success = $education->update($data);

        if ($success)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }

    public function addExperience(Employee $employee)
    {

        $status = request()->validate([
            'company' => ['required'],
            'position' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'description'  => ['required'],
        ]);
        $status['employee_id'] = $employee->id;

        $education = Experience::create($status);

        if ($education)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }

    public function editBank(Employee $employee)
    {

        $data = request()->validate([
            'full_name' => ['required'],
            'bank_name' => ['required'],
            'account_number' => ['required', 'numeric'],
            'account_type' => ['required'],
        ]);

        $data['employee_id'] = $employee->id;

        $success = $employee->bankInfo->update($data);

        if ($success)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }
}
