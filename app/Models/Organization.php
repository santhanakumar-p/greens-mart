<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'country_code',
        'currency_code',
        'state_id',
        'gstin',
        'phone_number',
        'email',
        'address',
        'financial_year_start_month',
        'is_active',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
