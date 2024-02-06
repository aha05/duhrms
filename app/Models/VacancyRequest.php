<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VacancyRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'department_id',
        'title',
        'description',
        'number_of_positions',
        'approved',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function vacancyApprover()
    {
        return $this->hasMany(VacancyApproval::class, 'vacancy_request_id');
    }

    public function hasApprover($id)
    {

        foreach ($this->vacancyApprover as $approver) {
            if ($approver->vacancy_request_id == $id)
                return true;
        }
        return false;
    }



    public function isAcApprove($id)
    {
        foreach ($this->vacancyApprover as $approvers) {
            if ($approvers->vacancy_request_id == $id) {
                if ($approvers->approver->userHasRole('AC officer'))
                    return true;
            }
        }
        return false;
    }

    public function isHrApprove($id)
    {
        foreach ($this->vacancyApprover as $approvers) {
            if ($approvers->vacancy_request_id == $id) {
                if ($approvers->approver->userHasRole('HR officer'))
                    return true;
            }
        }
        return false;
    }

    public function getAcApproval($id)
    {
        foreach ($this->vacancyApprover as $approvers) {
            if ($approvers->vacancy_request_id == $id) {
                if ($approvers->approver->userHasRole('AC officer'))
                    return $approvers;
            }
        }
        return false;
    }

    public function getHrApproval($id)
    {
        foreach ($this->vacancyApprover as $approvers) {
            if ($approvers->vacancy_request_id == $id) {
                if ($approvers->approver->userHasRole('HR officer'))
                    return $approvers;
            }
        }
        return false;
    }
}
