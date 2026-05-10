<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::with(['state:id,state_name,state_code,gst_state_code'])
            ->select('id', 'name', 'country_code', 'state_id', 'currency_code', 'gstin', 'phone_number', 'email', 'financial_year_start_month', 'is_active')
            ->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'Organizations fetched successfully',
            'data' => $organizations
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country_code' => 'required|string|max:5',
            'currency_code' => 'required|string|max:5',
            'state_id' => 'nullable|exists:states,id',
            'gstin' => 'nullable|string|max:20|unique:organizations,gstin',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'financial_year_start_month' => 'required|integer|between:1,12',
            'is_active' => 'nullable|boolean',
        ]);

        $organization = Organization::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Organization created successfully',
            'data' => $organization->load('state')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $organization = Organization::with(['state:id,state_name,state_code,gst_state_code'])
            ->select('id', 'name', 'country_code', 'state_id', 'currency_code', 'gstin', 'phone_number', 'email', 'financial_year_start_month', 'is_active')
            ->findOrFail($id);

        return response()->json([
            'status' => true,
            'message' => 'Organization fetched successfully',
            'data' => $organization
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $organization = Organization::find($id);

        if (!$organization) {
            return response()->json([
                'status' => false,
                'message' => 'Organization not found'
            ]);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'country_code' => 'sometimes|required|string|max:5',
            'currency_code' => 'sometimes|required|string|max:5',
            'state_id' => 'nullable|exists:states,id',
            'gstin' => ['nullable','string','max:20',Rule::unique('organizations', 'gstin')->ignore($organization->id)],
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'financial_year_start_month' => 'sometimes|required|integer|between:1,12',
            'is_active' => 'nullable|boolean',
        ]);

        $organization->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Organization updated successfully',
            'data' => $organization->load('state')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $organization = Organization::find($id);

        if (!$organization) {
            return response()->json([
                'status' => false,
                'message' => 'Organization not found'
            ]);
        }

        $organization->delete();

        return response()->json([
            'status' => true,
            'message' => 'Organization deleted successfully'
        ]);
    }
}
