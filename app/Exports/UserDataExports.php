<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\User;



class UserDataExports implements FromView,ShouldAutoSize
{
    use Exportable;
    private $users;


    public function __construct() {
        $this->users = User::all();
    }

    public function view(): View
    {
        return view('report.excel',[
            'users' => User::all()
        ]);

    }
}
