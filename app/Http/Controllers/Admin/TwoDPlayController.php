<?php

namespace App\Http\Controllers\Admin;

use Log;
use Illuminate\Http\Request;
use App\Models\Admin\Lottery;
use App\Models\Admin\TwoDigit;
use App\Models\Admin\LotteryMatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LotteryTwoDigitPivot;
use Illuminate\Support\Facades\Auth;

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
        return view('two_d.play_two_d_index');
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

//     $currentSession = date('H') < 12 ? 'morning' : 'evening';  // before 1 pm is morning

//     DB::beginTransaction();

//     try {
//         // Deduct the total amount from the user's balance
//         $user = Auth::user();
//         $user->balance -= $request->totalAmount;

//         // Check if user balance is negative after deduction
//         if ($user->balance < 0) {
//             throw new \Exception('Your balance is not enough.');
//         }

//         // Update user balance in the database
//         $user->save();

//         $lottery = Lottery::create([
//             'pay_amount' => $request->totalAmount,
//             'total_amount' => $request->totalAmount,
//             'user_id' => $request->user_id,
//             'session' => $currentSession
//         ]);

//         $attachData = [];
//         foreach($request->amounts as $two_digit_id => $sub_amount) {
//             $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_pivot')
//                     ->join('lotteries', 'lotteries.id', '=', 'lottery_two_digit_pivot.lottery_id')
//                     ->where('two_digit_id', $two_digit_id)
//                     ->where('lotteries.session', $currentSession)
//                     ->sum('sub_amount');

//             if($totalBetAmountForTwoDigit + $sub_amount > 5000) {
//                 $twoDigit = TwoDigit::find($two_digit_id);
//                 throw new \Exception("The two-digit's amount limit for {$twoDigit->two_digit} is full.");
//             }
//             $attachData[$two_digit_id] = ['sub_amount' => $sub_amount];
//         }

//         $lottery->twoDigits()->attach($attachData);

//         DB::commit();

//         return redirect()->back()->with('message', 'Data stored successfully!');
//     } catch (\Exception $e) {
//         DB::rollback();
//         return redirect()->back()->with('error', $e->getMessage());
//     }
// }
//      private $playDays = [
//         'monday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//                 'tuesday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//         'wednesday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//         'thursday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//         'friday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     ];
//     // Main method
// public function storeLotteryData(Request $request) {
//     $currentSession = $this->getCurrentSession();
//     if (!$currentSession) {
//         return redirect()->back()->with('error', 'Sorry, not a valid play time.');
//     }

//     $validatedData = $this->validateRequest($request);

//     DB::beginTransaction();
//     try {
//         $this->deductAmountFromUserBalance($request->totalAmount);
//         $lottery = $this->createLottery($request, $currentSession);
//         $this->attachTwoDigitsToLottery($lottery, $request->amounts);
//         DB::commit();
//         return redirect()->back()->with('message', 'Data stored successfully!');
//     } catch (\Exception $e) {
//         DB::rollback();
//         return redirect()->back()->with('error', $e->getMessage());
//     }
// }
//     private function getTotalBetAmountForTwoDigit($digit_id) {
//     return DB::table('lottery_two_digit_pivot')->where('two_digit_id', $digit_id)->sum('sub_amount');
// }
//     private function getCurrentSession()
//     {
//         $currentDay = strtolower(date('l'));
//         $currentHour = (float) date('H.i');
//         $currentSession = null;

//         if (isset($this->playDays[$currentDay])) {
//             foreach ($this->playDays[$currentDay] as $session => $times) {
//                 if ($currentHour >= $times['start'] && $currentHour <= $times['end']) {
//                     $currentSession = $session;
//                     break;
//                 }
//             }
//         }
//         return $currentSession;
//     }

//     private function validateRequest($request)
//     {
//         return $request->validate([
//             'selected_digits' => 'required|string',
//             'amounts' => 'required|array',
//             'amounts.*' => 'required|integer|min:100|max:5000',
//             'totalAmount' => 'required|integer|min:100',
//             'user_id' => 'required|exists:users,id',
//         ]);
//     }

//     private function deductAmountFromUserBalance($amount)
//     {
//         $user = Auth::user();
//         $user->balance -= $amount;

//         if ($user->balance < 0) {
//             throw new \Exception('Your balance is not enough.');
//         }
//         $user->save();
//     }

//     private function createLottery(Request $request, $currentSession)
//     {
//         return Lottery::create([
//             'pay_amount' => $request->totalAmount,
//             'total_amount' => $request->totalAmount,
//             'user_id' => $request->user_id,
//             'session' => $currentSession
//         ]);
//     }

//     private function attachTwoDigitsToLottery(Lottery $lottery, $amounts)
//     {
//         $attachData = [];
//         foreach ($amounts as $two_digit_id => $sub_amount) {
//             $this->validateTwoDigitLimit($two_digit_id, $sub_amount, $lottery->session);
//             $attachData[$two_digit_id] = ['sub_amount' => $sub_amount];
//         }
//         $lottery->twoDigits()->attach($attachData);
//     }

//     private function validateTwoDigitLimit($two_digit_id, $sub_amount, $currentSession)
//     {
//         $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_pivot')
//             ->join('lotteries', 'lotteries.id', '=', 'lottery_two_digit_pivot.lottery_id')
//             ->where('two_digit_id', $two_digit_id)
//             ->where('lotteries.session', $currentSession)
//             ->sum('sub_amount');

//         if ($totalBetAmountForTwoDigit + $sub_amount > 5000) {
//             $twoDigit = TwoDigit::find($two_digit_id);
//             throw new \Exception("The two-digit's amount limit for {$twoDigit->two_digit} is full.");
//         }
//     }



    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request)
// {
//     dd($request->all());
//     // Define play days and their respective times
//     $playDays = [
//         'monday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//         'tuesday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//         'wednesday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//         'thursday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//         'friday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     ];

//     // Determine the current day and hour
//     $currentDay = strtolower(date('l'));
//     $currentHour = (float) date('H.i');
//     $currentSession = null;

//     // Determine the current session based on the play days and current time
//     if (isset($playDays[$currentDay])) {
//         foreach ($playDays[$currentDay] as $session => $times) {
//             if ($currentHour >= $times['start'] && $currentHour <= $times['end']) {
//                 $currentSession = $session;
//                 break;
//             }
//         }
//     }

//     if (!$currentSession) {
//         return redirect()->back()->with('error', 'Sorry, not a valid play time.');
//     }

//     $validatedData = $request->validate([
//         'selected_digits' => 'required|string',
//         'amounts' => 'required|array',
//         'amounts.*' => 'required|integer|min:100|max:5000',
//         'totalAmount' => 'required|integer|min:100',
//         'user_id' => 'required|exists:users,id',
//     ]);

//     DB::beginTransaction();

//     try {
//         // Deduct the total amount from the user's balance
//         $user = Auth::user();
//         $user->balance -= $request->totalAmount;

//         // Check if user balance is negative after deduction
//         if ($user->balance < 0) {
//             throw new \Exception('Your balance is not enough.');
//         }

//         // Update user balance in the database
//         $user->save();

//         $lottery = Lottery::create([
//             'pay_amount' => $request->totalAmount,
//             'total_amount' => $request->totalAmount,
//             'user_id' => $request->user_id,
//             'session' => $currentSession
//         ]);

//         $attachData = [];
//         foreach($request->amounts as $two_digit_id => $sub_amount) {
//             $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_pivot')
//                     ->join('lotteries', 'lotteries.id', '=', 'lottery_two_digit_pivot.lottery_id')
//                     ->where('two_digit_id', $two_digit_id)
//                     ->where('lotteries.session', $currentSession)
//                     ->sum('sub_amount');

//             if($totalBetAmountForTwoDigit + $sub_amount > 5000) {
//                 $twoDigit = TwoDigit::find($two_digit_id);
//                 throw new \Exception("The two-digit's amount limit for {$twoDigit->two_digit} is full.");
//             }
//             $attachData[$two_digit_id] = ['sub_amount' => $sub_amount];
//         }

//         $lottery->twoDigits()->attach($attachData);

//         DB::commit();

//         return redirect()->back()->with('message', 'Data stored successfully!');
//     } catch (\Exception $e) {
//         DB::rollback();
//         return redirect()->back()->with('error', $e->getMessage());
//     }
// }

//     public function store(Request $request)
// {
//     // Listening to DB queries for debugging
//     \DB::listen(function($query) {
//         \Log::info('Query executed: ', ['sql' => $query->sql, 'bindings' => $query->bindings, 'time' => $query->time]);
//     });

//     $playDays = $this->getPlayDays();

//     // Validating the request data
//     $validatedData = $request->validate($this->validationRules());

//     $currentSession = $this->getCurrentSession($playDays);
//     if (!$currentSession) {
//         return redirect()->back()->with('error', 'Sorry, not a valid play time.');
//     }

//     return $this->processLotteryData($request, $currentSession);
// }

// private function getPlayDays()
// {
//     return [
        
//     'monday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     'tuesday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     'wednesday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     'thursday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     'friday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],

//     ];
// }

// private function validationRules()
// {
//     return [
//         'selected_digits' => 'required|string',
//         'amounts' => 'required|array',
//         'amounts.*' => 'required|integer|min:100|max:5000',
//         'totalAmount' => 'required|integer|min:100',
//         'user_id' => 'required|exists:users,id',
//     ];
// }

// private function processLotteryData($request, $currentSession)
// {
//     DB::beginTransaction();

//     try {
//         $user = Auth::user();
//         if ($user->balance < $request->totalAmount) {
//             throw new \Exception('Your balance is not enough.');
//         }
//         //$user->balancedecrement('balance', $request->totalAmount);
//         $user->balance = $user->balance - $request->totalAmount;
//     $user->save();

//         $lottery = Lottery::create([
//             'pay_amount' => $request->totalAmount,
//             'total_amount' => $request->totalAmount,
//             'user_id' => $request->user_id,
//             'session' => $currentSession
//         ]);

//         $this->attachTwoDigits($request, $lottery, $currentSession);

//         DB::commit();
//         return redirect()->back()->with('message', 'Data stored successfully!');
//     } catch (\Exception $e) {
//         DB::rollback();
//         \Log::error('Error in storing data: ' . $e->getMessage());
//         return redirect()->back()->with('error', $e->getMessage());
//     }
// }

// private function attachTwoDigits($request, $lottery, $currentSession)
// {
//     $attachData = [];
//     foreach($request->amounts as $two_digit_id => $sub_amount) {
//         $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_pivot')
//             ->join('lotteries', 'lotteries.id', '=', 'lottery_two_digit_pivot.lottery_id')
//             ->where('two_digit_id', $two_digit_id)
//             ->where('lotteries.session', $currentSession)
//             ->sum('sub_amount');

//         if($totalBetAmountForTwoDigit + $sub_amount > 5000) {
//             $twoDigit = TwoDigit::find($two_digit_id);
//             throw new \Exception("The two-digit's amount limit for {$twoDigit->two_digit} is full.");
//         }

//         $attachData[$two_digit_id] = ['sub_amount' => $sub_amount];
//     }
//     $lottery->twoDigits()->attach($attachData);
// }

// private function getCurrentSession($playDays)
// {
//     $currentDay = strtolower(date('l'));
//     $currentHour = (float) date('H.i');

//     if (isset($playDays[$currentDay])) {
//         foreach ($playDays[$currentDay] as $session => $times) {
//             if ($currentHour >= $times['start'] && $currentHour <= $times['end']) {
//                 return $session;
//             }
//         }
//     }
//     return null; // Not a valid play time
// }

    
//      public function store(Request $request)
// {
//     \DB::listen(function($query) {
//     \Log::info('Query executed: ', ['sql' => $query->sql, 'bindings' => $query->bindings, 'time' => $query->time]);
// });

//     $playDays = [
//     'monday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     'tuesday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     'wednesday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     'thursday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
//     'friday' => ['morning' => ['start' => 8, 'end' => 12], 'evening' => ['start' => 12.5, 'end' => 16.5]],
// ];

//     $validatedData = $request->validate([
//         'selected_digits' => 'required|string',
//         'amounts' => 'required|array',
//         'amounts.*' => 'required|integer|min:100|max:5000',
//         'totalAmount' => 'required|integer|min:100',
//         'user_id' => 'required|exists:users,id',
//     ]);

//     $currentSession = $this->getCurrentSession($playDays);

// if (!$currentSession) {
//     return redirect()->back()->with('error', 'Sorry, not a valid play time.');
// }


//     DB::beginTransaction();

//     try {
//         // Deduct the total amount from the user's balance
//         $user = Auth::user();
//         $user->balance -= $request->totalAmount;

//         // Check if user balance is negative after deduction
//         if ($user->balance < 0) {
//             throw new \Exception('Your balance is not enough.');
//         }

//         // Update user balance in the database
//         $user->save();

//         $lottery = Lottery::create([
//             'pay_amount' => $request->totalAmount,
//             'total_amount' => $request->totalAmount,
//             'user_id' => $request->user_id,
//             'session' => $currentSession
//         ]);

//         $attachData = [];
//         foreach($request->amounts as $two_digit_id => $sub_amount) {
//             $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_pivot')
//                 ->join('lotteries', 'lotteries.id', '=', 'lottery_two_digit_pivot.lottery_id')
//                 ->where('two_digit_id', $two_digit_id)
//                 ->where('lotteries.session', $currentSession)
//                 ->sum('sub_amount');


//             if($totalBetAmountForTwoDigit + $sub_amount > 5000) {
//                 $twoDigit = TwoDigit::find($two_digit_id);
//                 throw new \Exception("The two-digit's amount limit for {$twoDigit->two_digit} is full.");
//             }
//             $attachData[$two_digit_id] = ['sub_amount' => $sub_amount];
//         }

//         $lottery->twoDigits()->attach($attachData);

//         DB::commit();

//         return redirect()->back()->with('message', 'Data stored successfully!');
//     } catch (\Exception $e) {
//         DB::rollback();
//         \Log::error('Error in storing data: ' . $e->getMessage());

//         return redirect()->back()->with('error', $e->getMessage());
//     }
// }

//     private function getCurrentSession($playDays) {
//     $currentDay = strtolower(date('l'));
//     $currentHour = (float) date('H.i');

//     if (isset($playDays[$currentDay])) {
//         foreach ($playDays[$currentDay] as $session => $times) {
//             if ($currentHour >= $times['start'] && $currentHour <= $times['end']) {
//                 return $session;
//             }
//         }
//     }
//     return null; // Not a valid play time
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