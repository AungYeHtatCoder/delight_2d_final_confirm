<?php

namespace App\Jobs;

use Log;
use Carbon\Carbon;
use App\Models\Admin\Lottery;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CheckForMorningWinners implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
     //use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $twodWiner;

    public function __construct($twodWiner)
    {
        $this->twodWiner = $twodWiner;
    }

    // new query 
    public function handle()
{
    // Ensure that $this->twodWiner is initialized and has a valid value.
    if (!isset($this->twodWiner) || !isset($this->twodWiner->prize_no)) {
        \Log::error("twodWiner or prize_no is not set");
        return;
    }

    // Get the current date
    $today = Carbon::today();

    try {
        $winningEntries = DB::table('lottery_two_digit_pivot')
            ->join('lotteries', 'lottery_two_digit_pivot.two_digit_id', '=', 'lotteries.id') // Assuming 'id' is the primary key of 'lotteries'
            ->where('lottery_two_digit_pivot.two_digit_id', $this->twodWiner->prize_no)
            ->where('lotteries.session', 'morning') // Filter by the session in 'lotteries' table
            ->where('lottery_two_digit_pivot.prize_sent', 0) // Ensure the prize isn't sent
            ->whereDate('lottery_two_digit_pivot.created_at', $today)
            ->select('lottery_two_digit_pivot.*') // Select columns from 'lottery_two_digit_pivot' table
            ->get();

        foreach ($winningEntries as $entry) {
            DB::transaction(function () use ($entry) {
                $lottery = Lottery::findOrFail($entry->lottery_id);

                // Ensure that the lottery has a user relationship.
                if ($lottery && $lottery->user) {
                    $user = $lottery->user;
                    $user->balance += $entry->sub_amount * 85; // Update based on your prize calculation
                    $user->save();
                } else {
                    \Log::error("User not found for lottery with ID {$entry->lottery_id}");
                    return;
                }

                // Update prize_sent in pivot
                // Ensure that the lottery has a twoDigitsMorning relationship.
                if ($lottery && method_exists($lottery, 'twoDigitsMorning')) {
                    $lottery->twoDigitsMorning()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
                } else {
                    \Log::error("twoDigitsMorning relationship not found for lottery with ID {$entry->lottery_id}");
                }
            });
        }
    } catch (\Exception $e) {
        \Log::error("Error in handle function: " . $e->getMessage());
    }
}


//     public function handle()
// {
//     $date = Carbon::now();
//     $dayOfWeek = $date->dayOfWeek; 

//     // Check if today is Monday, Tuesday, Wednesday, Thursday, or Friday (1 to 5)
//     if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
//         // Get all lotteries
//         $lotteries = Lottery::all();

//         foreach ($lotteries as $lottery) {
//             $morningEntries = $lottery->twoDigitsMorning->pluck('two_digit_id')->toArray();

//             // Find the winning entries from the morning session's entries
//             $winningEntries = DB::table('lottery_two_digit_pivot')
//                 ->whereIn('two_digit_id', $morningEntries)
//                 ->where('two_digit_id', $this->twodWiner->prize_no) // Winning two-digit number
//                 ->get();

//             foreach ($winningEntries as $entry) {
//                 DB::transaction(function () use ($entry, $lottery) {
//                     // Update user's balance
//                     $user = $lottery->user;
//                     $user->balance += $entry->sub_amount * 85; // Update based on your prize calculation
//                     $user->save();

//                     // Update prize_sent in pivot
//                     $lottery->twoDigitsMorning()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
//                 });
//             }
//         }
//     }
// }


//     public function handle()
// {
//     $date = Carbon::now();
//     $dayOfWeek = $date->dayOfWeek; // Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)

//     // Check if today is Monday, Tuesday, Wednesday, Thursday, or Friday (1 to 5)
//     if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
//         // Define the morning session time range
//         $morningStart = $date->startOfDay()->addHours(6);
//         $morningEnd = $date->startOfDay()->addHours(12);

//         // Find all entries for the current morning session
//         $morningEntries = DB::table('lottery_two_digit_pivot')
//             ->select('two_digit_id')
//              ->where('prize_sent', 0) // Prize not sent
//             ->whereBetween('created_at', [$morningStart, $morningEnd]) // Filter by today's morning session
//             ->pluck('two_digit_id')
//             ->toArray();

//         // Find the winning entries from the morning session's entries
//         $winningEntries = DB::table('lottery_two_digit_pivot')
//             ->whereIn('two_digit_id', $morningEntries)
//             ->where('two_digit_id', $this->twodWiner->prize_no) // Winning two-digit number
//             ->get();

//         foreach ($winningEntries as $entry) {
//             DB::transaction(function () use ($entry) {
//                 // Retrieve the lottery for this entry
//                 $lottery = Lottery::findOrFail($entry->lottery_id);

//                 // Update user's balance
//                 $user = $lottery->user;
//                 $user->balance += $entry->sub_amount * 85; // Update based on your prize calculation
//                 $user->save();

//                 // Update prize_sent in pivot
//                 $lottery->twoDigitsMorning()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
//             });
//         }
//     }
// }


    // public function handle()
    // {
    //     $date = Carbon::now();
    //     $date->isMonday();
    //     $date->isTuesday();
    //     $date->isWednesday();
    //     $date->isThursday();
    //     $date->isFriday();
    //     // Define the morning session time range
    //     $morningStart = $date->startOfDay()->addHours(6);
    //     //dd($morningStart);
    //     $morningEnd = $date->startOfDay()->addHours(12);

    //     // Find all entries for the current morning session
    //     $morningEntries = DB::table('lottery_two_digit_pivot')
    //         ->select('two_digit_id')
    //         ->whereBetween('created_at', [$morningStart, $morningEnd]) // Filter by today's morning session
    //         ->where('prize_sent', 0) // Prize not sent
    //         ->pluck('two_digit_id')
    //         ->toArray();

    //     // Find the winning entries from the morning session's entries
    //     $winningEntries = DB::table('lottery_two_digit_pivot')
    //         ->whereIn('two_digit_id', $morningEntries)
    //         ->where('two_digit_id', $this->twodWiner->prize_no) // Winning two-digit number
    //         ->get();

    //         var_dump($winningEntries);

    //     foreach ($winningEntries as $entry) {
    //         DB::transaction(function () use ($entry) {
    //             // Retrieve the lottery for this entry
    //             $lottery = Lottery::findOrFail($entry->lottery_id);

    //             // Update user's balance
    //             $user = $lottery->user;
    //             $user->balance += $entry->sub_amount * 85; // Update based on your prize calculation
    //             $user->save();

    //             // Update prize_sent in pivot
    //             $lottery->twoDigitsMorning()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
    //         });
    //     }
    // }


//     public function handle()
// {
//     // Define the morning session time range
//     $morningStart = Carbon::now()->startOfDay()->addHours(6);
//     $morningEnd = Carbon::now()->startOfDay()->addHours(12);

//     // Find all entries for the current morning session
//     $morningEntries = DB::table('lottery_two_digit_pivot')
//         ->select('two_digit_id')
//         ->where('prize_sent', 0)
//         ->whereBetween('created_at', [$morningStart, $morningEnd])  // Filter by today's morning session
//         ->pluck('two_digit_id')
//         ->toArray();

//     // Find the winning entries from the morning session's entries
//     $winningEntries = DB::table('lottery_two_digit_pivot')
//         ->whereIn('two_digit_id', $morningEntries)
//         ->where('two_digit_id', $this->twodWiner->prize_no)
//         ->get();

//     foreach ($winningEntries as $entry) {
//         DB::transaction(function () use ($entry) {
//             // Retrieve the lottery for this entry
//             $lottery = Lottery::findOrFail($entry->lottery_id);

//             // Update user's balance
//             $user = $lottery->user;
//             $user->balance += $entry->sub_amount * 85;  // Update based on your prize calculation
//             $user->save();

//             // Update prize_sent in pivot
//             $lottery->twoDigitsMorning()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
//         });
//     }
// }


//     public function handle()
// {
//     // Define the morning session time range
//     $morningStart = Carbon::now()->startOfDay()->addHours(6);
//     $morningEnd = Carbon::now()->startOfDay()->addHours(12);

//     // Find all winning entries for the current morning session
//     $winningEntries = DB::table('lottery_two_digit_pivot')
//         ->where('two_digit_id', $this->twodWiner->prize_no)
//         ->where('prize_sent', 0)
//         ->whereBetween('created_at', [$morningStart, $morningEnd])  // Filter by today's morning session
//         ->get();

//     foreach ($winningEntries as $entry) {
//         DB::transaction(function () use ($entry) {
//             // Retrieve the lottery for this entry
//             $lottery = Lottery::findOrFail($entry->lottery_id);

//             // Update user's balance
//             $user = $lottery->user;
//             $user->balance += $entry->sub_amount * 85;  // Update based on your prize calculation
//             $user->save();

//             // Update prize_sent in pivot
//             $lottery->twoDigitsMorning()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
//         });
//     }
// }

// really working method
//     public function handle()
// {
//     // Get the current date
//     $today = Carbon::today();

//     // Find all winning entries for the current day
//     // $winningEntries = DB::table('lottery_two_digit_pivot')
//     //     ->where('two_digit_id', $this->twodWiner->prize_no)
//     //     ->where('prize_sent', 0)
//     //     ->whereDate('created_at', $today)  // Add this line to filter by today's date
//     //     ->get();
//     $winningEntries = DB::table('lottery_two_digit_pivot')
//     ->join('lotteries', 'lottery_two_digit_pivot.two_digit_id', '=', 'lotteries.id') // Assuming 'id' is the primary key of 'lotteries'
//     ->where('lottery_two_digit_pivot.two_digit_id', $this->twodWiner->prize_no)
//     ->where('lotteries.session', 'morning')  // Filter by the session in 'lotteries' table
//     ->where('lottery_two_digit_pivot.prize_sent', 0)  // Ensure the prize isn't sent
//     ->whereDate('lottery_two_digit_pivot.created_at', $today)
//     ->select('lottery_two_digit_pivot.*')  // Select columns from 'lottery_two_digit_pivot' table
//     ->get();
//     foreach ($winningEntries as $entry) {
//         DB::transaction(function () use ($entry) {
//             // Retrieve the lottery for this entry
//             $lottery = Lottery::findOrFail($entry->lottery_id);

//             // Update user's balance
//             $user = $lottery->user;
//             $user->balance += $entry->sub_amount * 85;  // Update based on your prize calculation
//             $user->save();

//             // Update prize_sent in pivot
//             $lottery->twoDigitsMorning()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
//         });
//     }
// }



// public function handle()
// {
//     $currentHour = Carbon::now()->hour;

//     // Morning Session Prize Distribution
//     if ($currentHour >= 12 && $currentHour < 14) {
//         $this->distributePrizeForSession('morning');
//     }

//     // Evening Session Prize Distribution
//     if ($currentHour >= 16 && $currentHour < 18) {
//         $this->distributePrizeForSession('evening');
//     }
// }

// protected function distributePrizeForSession($session)
// {
//     $winningEntries = DB::table('lottery_two_digit_pivot')
//         ->where('two_digit_id', $this->twodWiner->prize_no)
//         ->where('prize_sent', 0)
//         ->get();

//     foreach ($winningEntries as $entry) {
//         DB::transaction(function () use ($entry, $session) {
//             $lottery = Lottery::findOrFail($entry->lottery_id);

//             if ($lottery->session == $session) {
//                 // Update user's balance
//                 $user = $lottery->user;
//                 $user->balance += $entry->sub_amount * 85;  // Update based on your prize calculation
//                 $user->save();

//                 // Update prize_sent in pivot
//                 $methodName = 'twoDigits' . ucfirst($session);
//                 $lottery->$methodName()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
//             }
//         });
//     }
// }




    // public function handle()
    // {
    //     // Find all winning entries
    //     $winningEntries = DB::table('lottery_two_digit_pivot')
    //         ->where('two_digit_id', $this->twodWiner->prize_no)
    //         ->where('prize_sent', 0)
    //         ->get();

    //     foreach ($winningEntries as $entry) {
    //         DB::transaction(function () use ($entry) {
    //             // Retrieve the lottery for this entry
    //             $lottery = Lottery::findOrFail($entry->lottery_id);

    //             // Update user's balance
    //             $user = $lottery->user;
    //             $user->balance += $entry->sub_amount * 85;  // Update based on your prize calculation
    //             $user->save();

    //             // Update prize_sent in pivot
    //             $lottery->twoDigitsMorning()->updateExistingPivot($entry->two_digit_id, ['prize_sent' => 1]);
    //         });
    //     }
    //     // $winningNumber = $this->twodWiner->prize_no;

    //     // // Get all lotteries with the winning number
    //     // $lotteries = Lottery::whereHas('twoDigitsMorning', function ($query) use ($winningNumber) {
    //     //     $query->where('two_digit', $winningNumber);
    //     // })->get();

    //     // foreach ($lotteries as $lottery) {
    //     //     DB::transaction(function () use ($lottery, $winningNumber) {
    //     //         // Update user's balance
    //     //         $user = $lottery->user;
    //     //         $prizeAmount = $lottery->twoDigitsMorning()->where('two_digit', $winningNumber)->first()->pivot->sub_amount * 85;
    //     //         $user->balance += $prizeAmount;
    //     //         $user->save();

    //     //         // Mark the prize as sent in the pivot table
    //     //         $lottery->twoDigitsMorning()->updateExistingPivot($winningNumber, ['prize_sent' => 1]);
    //     //     });
    //     // }
    // }
}