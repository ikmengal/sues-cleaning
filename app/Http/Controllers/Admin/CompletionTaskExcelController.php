<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Excel;
use App\Exports\ExcelReportGenerator;

class CompletionTaskExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new ExcelReportGenerator, 'your_exported_file.xlsx');
    }

}