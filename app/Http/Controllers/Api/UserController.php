<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['organization:id,name'])
            ->select([
                'id',
                'organization_id',
                'name',
                'email',
                'phone_number',
                'role',
                'is_active',
            ])
            ->paginate(10);

        return response()->json([
            'message' => 'User fetch successfully.',
            'data' => $users
        ]);
    }
}
