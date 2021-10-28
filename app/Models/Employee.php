<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'dateOfBirth' => 'datetime:Y-m-d',
        'employmentStartDate' => 'datetime:Y-m-d',
        'employmentEndDate' => 'datetime:Y-m-d',
        'lastNotification' => 'datetime:Y-m-d',
    ];

    protected $attributes = [
        'lastNotification' => null,
    ];

    public function hasBirthDay()
    {
        return $this->dateOfBirth->isToday();
    }

    public function isNotTerminated()
    {
        return is_null($this->employmentEndDate);
    }

    public function hasStarted()
    {
        return $this->employmentStartDate->lessThan(now());
    }

    public function shouldReceiveBirthdayWish()
    {
        return $this->hasStarted() && $this->isNotTerminated() && $this->hasBirthDay();
    }
}
