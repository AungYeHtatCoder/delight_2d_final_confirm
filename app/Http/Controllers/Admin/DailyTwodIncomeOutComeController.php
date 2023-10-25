<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Lottery;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DailyTwodIncomeOutComeController extends Controller
{
    public function getTotalAmounts() {
// Daily Total
    $dailyTotal = Lottery::whereDate('created_at', '=', now()->today())->sum('total_amount');

    // Weekly Total
    $startOfWeek = now()->startOfWeek();
    $endOfWeek = now()->endOfWeek();
    $weeklyTotal = Lottery::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('total_amount');

    // Monthly Total
    $monthlyTotal = Lottery::whereMonth('created_at', '=', now()->month)
                           ->whereYear('created_at', '=', now()->year)
                           ->sum('total_amount');

    // Yearly Total
    $yearlyTotal = Lottery::whereYear('created_at', '=', now()->year)->sum('total_amount');

    // Return the totals as JSON
    return response()->json([
        'dailyTotal'   => $dailyTotal,
        'weeklyTotal'  => $weeklyTotal,
        'monthlyTotal' => $monthlyTotal,
        'yearlyTotal'  => $yearlyTotal,
    ]);
}

//     public function getTotalAmounts() 
//     {
//     // Daily Total
//     $dailyTotal = Lottery::whereDate('created_at', '=', now()->today())->sum('total_amount');

//     // Weekly Total
//     $startOfWeek = now()->startOfWeek();
//     $endOfWeek = now()->endOfWeek();
//     $weeklyTotal = Lottery::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('total_amount');

//     // Monthly Total
//     $monthlyTotal = Lottery::whereMonth('created_at', '=', now()->month)
//                            ->whereYear('created_at', '=', now()->year)
//                            ->sum('total_amount');

//     // Yearly Total
//     $yearlyTotal = Lottery::whereYear('created_at', '=', now()->year)->sum('total_amount');

//     // Return the totals, you can adjust this part as per your needs
//     return view('your_view_name', [
//         'dailyTotal'   => $dailyTotal,
//         'weeklyTotal'  => $weeklyTotal,
//         'monthlyTotal' => $monthlyTotal,
//         'yearlyTotal'  => $yearlyTotal,
//     ]);
// }

}