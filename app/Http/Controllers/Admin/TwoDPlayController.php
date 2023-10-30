<?php

namespace App\Http\Controllers\Admin;

use Log;
use App\Models\User;
use App\Models\Lottery;
//use App\Models\Admin\Lottery;
use Illuminate\Http\Request;
use App\Models\Admin\TwoDigit;
use App\Models\Admin\LotteryMatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LotteryTwoDigitPivot;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TwoDigitPlayed;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TwoDigitPlayedNotification;

class TwoDPlayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $sessionLimits = [
    'morning' => 5000, // Limit for morning session
    'evening' => 5000  // Limit for evening session
];

    public function GetTwoDigit()
    {
        // get all two digits
        //$twoDigits = TwoDigit::all();
        return view('frontend.twod');
    }

    public function MorningPlayTwoDigit()
    {
        $twoDigits = TwoDigit::all();

    // Calculate remaining amounts for each two-digit
    $remainingAmounts = [];
    foreach ($twoDigits as $digit) {
        $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_copy')
            ->where('two_digit_id', $digit->id)
            ->sum('sub_amount');

        $remainingAmounts[$digit->id] = 5000 - $totalBetAmountForTwoDigit; // Assuming 5000 is the session limit
    }
    $lottery_matches = LotteryMatch::where('id', 1)->whereNotNull('is_active')->first();

    return view('two_d.morning_play', compact('twoDigits', 'remainingAmounts', 'lottery_matches'));
        
    }

    public function EveningPlayTwoDigit()
    {
        $twoDigits = TwoDigit::all();

    // Calculate remaining amounts for each two-digit
    $remainingAmounts = [];
    foreach ($twoDigits as $digit) {
        $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_copy')
            ->where('two_digit_id', $digit->id)
            ->sum('sub_amount');

        $remainingAmounts[$digit->id] = 5000 - $totalBetAmountForTwoDigit; // Assuming 5000 is the session limit
    }
    $lottery_matches = LotteryMatch::where('id', 1)->whereNotNull('is_active')->first();

    return view('two_d.evening_play', compact('twoDigits', 'remainingAmounts', 'lottery_matches'));
        
    }
    public function index()
    {
        // get all two digits
        $twoDigits = TwoDigit::all();
        return view('admin.two_d.two_digits.new_index', compact('twoDigits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'selected_digits' => 'required|string',
        'amounts' => 'required|array',
        'amounts.*' => 'required|integer|min:100|max:5000',
        'totalAmount' => 'required|integer|min:100',
        'user_id' => 'required|exists:users,id',
    ]);

    $currentSession = date('H') < 12 ? 'morning' : 'evening';

    DB::beginTransaction();

    try {
        $user = Auth::user();
        $user->balance -= $request->totalAmount;

        if ($user->balance < 0) {
            throw new \Exception('Your balance is not enough.');
        }

        $user->save();

        $lottery = Lottery::create([
            'pay_amount' => $request->totalAmount,
            'total_amount' => $request->totalAmount,
            'user_id' => $request->user_id,
            'session' => $currentSession
        ]);

        foreach ($request->amounts as $two_digit_id => $sub_amount) {
            $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_pivot')
                ->join('lotteries', 'lotteries.id', '=', 'lottery_two_digit_pivot.lottery_id')
                ->where('two_digit_id', $two_digit_id)
                ->where('lotteries.session', $currentSession)
                ->sum('sub_amount');

            if ($totalBetAmountForTwoDigit + $sub_amount > 5000) {
                $twoDigit = TwoDigit::find($two_digit_id);
                throw new \Exception("The two-digit's amount limit for {$twoDigit->two_digit} is full.");
            }

            $pivot = new LotteryTwoDigitPivot();
            $pivot->lottery_id = $lottery->id;
            $pivot->two_digit_id = $two_digit_id;
            $pivot->sub_amount = $sub_amount;
            $pivot->prize_sent = false;
            $pivot->save();
        }
        // $admin = User::find(1); 
        // $admin->notify(new TwoDigitPlayedNotification($user));
        //Notification::send($admin, new TwoDigitPlayedNotification($user));
        $admins = User::whereHas('roles', function ($query) {
        $query->where('id', 1);
        })->get();
        Notification::send($admins, new TwoDigitPlayedNotification($user));
        DB::commit();
        return redirect()->back()->with('message', 'Data stored successfully!');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', $e->getMessage());
    }
}

//     public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'selected_digits' => 'required|string',
//         'amounts' => 'required|array',
//         'amounts.*' => 'required|integer|min:100|max:5000',
//         'totalAmount' => 'required|integer|min:100',
//         'user_id' => 'required|exists:users,id',
//     ]);

//     $currentSession = date('H') < 12 ? 'morning' : 'evening';

//     DB::beginTransaction();

//     try {
//         $user = Auth::user();
//         $user->balance -= $request->totalAmount;

//         if ($user->balance < 0) {
//             throw new \Exception('Your balance is not enough.');
//         }

//         $user->save();

//         $lottery = Lottery::create([
//             'pay_amount' => $request->totalAmount,
//             'total_amount' => $request->totalAmount,
//             'user_id' => $request->user_id,
//             'session' => $currentSession
//         ]);

//         foreach ($request->amounts as $two_digit_id => $sub_amount) {
//             $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_pivot')
//                 ->join('lotteries', 'lotteries.id', '=', 'lottery_two_digit_pivot.lottery_id')
//                 ->where('two_digit_id', $two_digit_id)
//                 ->where('lotteries.session', $currentSession)
//                 ->sum('sub_amount');

//             if ($totalBetAmountForTwoDigit + $sub_amount > 5000) {
//                 $twoDigit = TwoDigit::find($two_digit_id);
//                 throw new \Exception("The two-digit's amount limit for {$twoDigit->two_digit} is full.");
//             }

//             $pivot = new LotteryTwoDigitPivot();
//             $pivot->lottery_id = $lottery->id;
//             $pivot->two_digit_id = $two_digit_id;
//             $pivot->sub_amount = $sub_amount;
//             $pivot->prize_sent = false;
//             $pivot->save();
//         }

//         DB::commit();

//         return redirect()->back()->with('message', 'Data stored successfully!');
//     } catch (\Exception $e) {
//         DB::rollback();
//         return redirect()->back()->with('error', $e->getMessage());
//     }
// }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}