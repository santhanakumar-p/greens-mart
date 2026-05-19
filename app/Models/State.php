<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'country_code',
        'state_code',
        'state_name',
        'gst_state_code',
        'is_union_territory',
    ];

    public function organization()
    {
        return $this->hasMany(Organization::class);
    }
}
