<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Report;
class ReportController extends Controller
{

	public function makeReport(request $request)
	{

		$reports = Report::where('reportno', $request->reportno)->first();
		$chart_options = [
        'chart_title' => $reports->chart_title,
        'report_type' => $reports->report_type,
        'model' => 'App\\' . $reports->model,
        'group_by_field' => $reports->group_by_field,
        'chart_type' => $reports->chart_type,
    
    ];
		$chart = new LaravelChart($chart_options);
    	return view('report', compact('chart'));
    }

    public function saveReport()
    {
    	$report = new Report;
        $report->reportno = request('reportno');
        $report->chart_title = request('chart_title');
        $report->chart_type= request('chart_type');
        $report->group_by_field= request('group_by_field');
        $report->report_type= request('report_type');
        $report->model = request('model');
      
        $report->save();
        return redirect('/showReport');

    }

    public function showReport()
    {
    	 $reports = Report::sortable()->paginate();
        return view('showreports',compact('reports'));
    }
    public function reportForm()
    {
    	return view('reportform');
    }
}
