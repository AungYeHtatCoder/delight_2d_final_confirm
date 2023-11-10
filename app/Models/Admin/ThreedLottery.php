<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\LotteryMatch;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ThreedLotteryEntry;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThreedLottery extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_amount',
        'user_id',
        'lottery_match_id',
    ];

    /**
     * Get the user that owns the ThreedLottery.
     */
    protected $dates = ['created_at', 'updated_at'];

        public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lotteryMatch()
    {
        return $this->belongsTo(LotteryMatch::class, 'lottery_match_id');
    }

    public function entries()
    {
        return $this->hasMany(ThreedLotteryEntry::class);
    }
}