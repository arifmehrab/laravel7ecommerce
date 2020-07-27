<?php

namespace App\Http\Controllers\Admin\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\order;
class reportController extends Controller
{
    // Today's order Report 
    public function todayReport()
    {
        $today = date('d-m-Y');
        $order_sale = order::where('status', 0)->where('date', $today)->sum('total');
        $order = order::where('status', 0)->where('date', $today)->get();
        return view('Admin.report.order_report', compact('order_sale', 'order'));
    }
    // Last Month Report 
    public function monthReport()
    {
       $month = date('m');
       $order_sale = order::where('status', 3)->where('month', $month)->sum('total');
       $order = order::where('status', 3)->where('month', $month)->get();
       return view('Admin.report.order_report', compact('order_sale', 'order'));
    }
     // Last Year Report 
     public function yearReport()
     {
        $year = date('Y');
        $order_sale = order::where('status', 3)->where('year', $year)->sum('total');
        $order = order::where('status', 3)->where('year', $year)->get();
        return view('Admin.report.order_report', compact('order_sale', 'order'));
     }
     // Search Report View
     public function searchReport()
     {
         return view('Admin.report.search_report');
     }
     // Search Report By Date Wais
     public function searchReportDate(Request $request)
     {
         $date = date('d-m-Y', strtotime($request->date));
         $order_sale = order::where('status', 3)->where('date', $date)->sum('total');
         $order = order::where('status', 3)->where('date', $date)->get();
         return view('Admin.report.order_report', compact('order_sale', 'order'));
     }
      // Search Report By Mont Wais
      public function searchReportMonth(Request $request)
      {
          $month = $request->month;
          $order_sale = order::where('status', 3)->where('month', $month)->sum('total');
          $order = order::where('status', 3)->where('month', $month)->get();
          return view('Admin.report.order_report', compact('order_sale', 'order'));
      }
       // Search Report By Year Wais
       public function searchReportYear(Request $request)
       {
           $year = $request->year;
           $order_sale = order::where('status', 3)->where('year', $year)->sum('total');
           $order = order::where('status', 3)->where('year', $year)->get();
           return view('Admin.report.order_report', compact('order_sale', 'order'));
       }
       //  Search Report By Between Date
       public function searchReportBetween(Request $request)
       {
          $start_date = date('d-m-Y', strtotime($request->start_date));
          $end_date = date('d-m-Y', strtotime($request->end_date));
          $order_sale = order::whereBetween('date',[$start_date, $end_date])->where('status', 3)->sum('total');
          $order = order::whereBetween('date', [$start_date, $end_date])->where('status', 3)->get();
          return view('Admin.report.order_report', compact('order_sale', 'order'));
       }
}
