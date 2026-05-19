<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\State;

class StateController extends Controller
{
    public function index()
    {
        $states = State::with(['organization:id,name,state_id'])
            ->select([
                'id',
                'country_code',
                'state_code',
                'state_name',
                'gst_state_code',
                'is_union_territory',
            ])
            ->paginate(10);

        return response()->json([
            'message' => 'State fetch successfully.',
            'data' => $states
        ]);
    }
}
