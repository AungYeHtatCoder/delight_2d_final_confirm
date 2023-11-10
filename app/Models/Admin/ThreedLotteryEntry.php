<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreedLotteryEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'threed_lottery_id',
        'digit_entry',
        'sub_amount',
        'prize_sent',
    ];

    /**
     * Get the lottery that owns the entry.
     */
    public function threedLottery()
    {
        return $this->belongsTo(ThreedLottery::class, 'threed_lottery_id');
    }
}