<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\LeaveBalance;
use Carbon\Carbon;

use Illuminate\Console\Command;

class CalculateLeaveBalance extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'leave-balance:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate leave balance for all users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $employees = Employee::all();
        foreach ($employees as $employee) {

            $dateOfHire = Carbon::parse($employee->date_of_hire);
            $currentDate = Carbon::now();
            $year = $dateOfHire->diffInYears($currentDate);

            if ($year >= 7) {
                if ($employee->leaveBalance != null) {
                    $balances = $employee->leaveBalance;
                    foreach ($balances as $balance) {
                        if ($balance->employee_id == $employee->id && $balance->leave_type_id = 3) {
                            $new_balance = [
                                'employee_id' => $employee->id,
                                'leave_type_id' => 3,
                                'balance' => 365,
                            ];

                            $balance->update($new_balance);
                        }
                    }
                } else {
                    $balance = new LeaveBalance([
                        'employee_id' => $employee->id,
                        'leave_type_id' => 3,
                        'balance' => 365,
                    ]);
                    $balance->save();
                }
            } else if ($year >= 5) {
                if ($employee->leaveBalance != null) {
                    $balances = $employee->leaveBalance;
                    foreach ($balances as $balance) {
                        if ($balance->employee_id == $employee->id && $balance->leave_type_id = 1) {

                            $new_balance = [
                                'employee_id' => $employee->id,
                                'leave_type_id' => 1,
                                'balance' => 180,
                            ];
                            $balance->update($new_balance);
                        }
                    }
                } else {
                    $balance = new LeaveBalance([
                        'employee_id' => $employee->id,
                        'leave_type_id' => 1,
                        'balance' => 180,
                    ]);
                    $balance->save();
                }
            } else if ($year >= 3) {
                if ($employee->leaveBalance != null) {
                    $balances = $employee->leaveBalance;
                    foreach ($balances as $balance) {
                        if ($balance->employee_id == $employee->id && $balance->leave_type_id = 1) {
                            $new_balance = [
                                'employee_id' => $employee->id,
                                'leave_type_id' => 2,
                                'balance' => 30,
                            ];

                            $balance->update($new_balance);
                        }
                    }
                } else {
                    $balance = new LeaveBalance([
                        'employee_id' => $employee->id,
                        'leave_type_id' => 2,
                        'balance' => 30,
                    ]);
                    $balance->save();
                }
            } else if ($year >= 2) {
                if ($employee->leaveBalance != null) {
                    $balances = $employee->leaveBalance;
                    foreach ($balances as $balance) {
                        if ($balance->employee_id == $employee->id && $balance->leave_type_id = 1) {
                            $new_balance = [
                                'employee_id' => $employee->id,
                                'leave_type_id' => 4,
                                'balance' => 360,
                            ];
                            $balance->update($new_balance);
                        }
                    }
                } else {
                    $balance = new LeaveBalance([
                        'employee_id' => $employee->id,
                        'leave_type_id' => 4,
                        'balance' => 360,
                    ]);
                    $balance->save();
                }
            } else {
                if ($employee->leaveBalance->isEmpty()) {
                    $balances = $employee->leaveBalance;
                    foreach ($balances as $balance) {
                        if ($balance->employee_id == $employee->id && $balance->leave_type_id = 1) {
                            $new_balance = [
                                'employee_id' => $employee->id,
                                'leave_type_id' => 2,
                                'balance' => 3,
                            ];
                            $balance->update($new_balance);
                        }
                    }
                } else {
                    $balance = new LeaveBalance([
                        'employee_id' => $employee->id,
                        'leave_type_id' => 2,
                        'balance' => 3,
                    ]);
                    $balance->save();
                }
            }
        }



        return Command::SUCCESS;
    }
}
