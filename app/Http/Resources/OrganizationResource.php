<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country_code' => $this->country_code,
            'state_id' => $this->state_id,
            'currency_code' => $this->currency_code,
            'gstin' => $this->gstin,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'financial_year' => $this->getFinancialYear($this->financial_year_start_month),
            'is_active' => $this->is_active,
            'state' => [
                'id' => $this->state->id,
                'name' => $this->state->state_name,
            ]
        ];
    }

    /**
     * Get the financial year based on the start month.
     */
    private function getFinancialYear(int $fyMonth): string
    {
        $currentYear = date('Y');
        $nextYear = $currentYear + 1;

        if (date('n') < $fyMonth) {
            return ($currentYear - 1) . '-' . $currentYear;
        } else {
            return $currentYear . '-' . $nextYear;
        }

    }
}
