<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\OrganizationResource;
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
        $organizations = Organization::with(['state:id,state_name'])
            ->select([
                'id',
                'name',
                'country_code',
                'state_id',
                'currency_code',
                'gstin',
                'phone_number',
                'email',
                'financial_year_start_month',
                'is_active'
            ])
            ->paginate(10);

        return OrganizationResource::collection($organizations)->additional([
            'message' => 'Organizations fetched successfully.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreOrganizationRequest $request)
    {
        $organization = Organization::create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Organization created successfully.',
            'data' => $organization->load('state')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $organization = Organization::with(['state:id,state_name'])
            ->select([
                'id',
                'name',
                'country_code',
                'state_id',
                'currency_code',
                'gstin',
                'phone_number',
                'email',
                'financial_year_start_month',
                'is_active'
            ])
            ->findOrFail($id);

        return (new OrganizationResource($organization))->additional([
            'message' => 'Organization show successfully.'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateOrganizationRequest $request, int $id)
{
    $organizationData = Organization::findOrFail($id);

    $organizationData->update(
        $request->validated()
    );

    return response()->json([
        'message' => 'Organization updated successfully',
        'data' => $organizationData->load('state')
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $organization = Organization::findOrFail($id);

        $organization->delete();

        return response()->json([
            'message' => 'Organization deleted successfully'
        ]);
    }
}
