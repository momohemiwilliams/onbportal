<?php

namespace App\Http\Controllers;

use App\Models\AppMonitor;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
        
        public function index()
        {
            $formstatus = AppMonitor::select('*')->distinct()->get();

            return   view('applications.reports', compact('formstatus'));
        }
}
