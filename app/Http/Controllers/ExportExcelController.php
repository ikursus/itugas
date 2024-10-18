<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{

    public function exportUsers(Request $request)
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }
}
