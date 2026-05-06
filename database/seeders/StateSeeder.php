<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['country_code' => 'IN', 'state_code' => 'AN', 'state_name' => 'Andaman and Nicobar Islands', 'gst_state_code' => '35', 'is_union_territory' => true],
            ['country_code' => 'IN', 'state_code' => 'AP', 'state_name' => 'Andhra Pradesh', 'gst_state_code' => '37', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'AR', 'state_name' => 'Arunachal Pradesh', 'gst_state_code' => '12', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'AS', 'state_name' => 'Assam', 'gst_state_code' => '18', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'BR', 'state_name' => 'Bihar', 'gst_state_code' => '10', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'CH', 'state_name' => 'Chandigarh', 'gst_state_code' => '04', 'is_union_territory' => true],
            ['country_code' => 'IN', 'state_code' => 'CG', 'state_name' => 'Chhattisgarh', 'gst_state_code' => '22', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'DN', 'state_name' => 'Dadra and Nagar Haveli and Daman and Diu', 'gst_state_code' => '26', 'is_union_territory' => true],
            ['country_code' => 'IN', 'state_code' => 'DL', 'state_name' => 'Delhi', 'gst_state_code' => '07', 'is_union_territory' => true],
            ['country_code' => 'IN', 'state_code' => 'GA', 'state_name' => 'Goa', 'gst_state_code' => '30', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'GJ', 'state_name' => 'Gujarat', 'gst_state_code' => '24', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'HR', 'state_name' => 'Haryana', 'gst_state_code' => '06', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'HP', 'state_name' => 'Himachal Pradesh', 'gst_state_code' => '02', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'JH', 'state_name' => 'Jharkhand', 'gst_state_code' => '20', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'KA', 'state_name' => 'Karnataka', 'gst_state_code' => '29', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'KL', 'state_name' => 'Kerala', 'gst_state_code' => '32', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'LA', 'state_name' => 'Ladakh', 'gst_state_code' => '38', 'is_union_territory' => true],
            ['country_code' => 'IN', 'state_code' => 'LD', 'state_name' => 'Lakshadweep', 'gst_state_code' => '31', 'is_union_territory' => true],
            ['country_code' => 'IN', 'state_code' => 'MP', 'state_name' => 'Madhya Pradesh', 'gst_state_code' => '23', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'MH', 'state_name' => 'Maharashtra', 'gst_state_code' => '27', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'MN', 'state_name' => 'Manipur', 'gst_state_code' => '14', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'ML', 'state_name' => 'Meghalaya', 'gst_state_code' => '17', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'MZ', 'state_name' => 'Mizoram', 'gst_state_code' => '15', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'NL', 'state_name' => 'Nagaland', 'gst_state_code' => '13', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'OD', 'state_name' => 'Odisha', 'gst_state_code' => '21', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'PY', 'state_name' => 'Puducherry', 'gst_state_code' => '34', 'is_union_territory' => true],
            ['country_code' => 'IN', 'state_code' => 'PB', 'state_name' => 'Punjab', 'gst_state_code' => '03', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'RJ', 'state_name' => 'Rajasthan', 'gst_state_code' => '08', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'SK', 'state_name' => 'Sikkim', 'gst_state_code' => '11', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'TN', 'state_name' => 'Tamil Nadu', 'gst_state_code' => '33', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'TS', 'state_name' => 'Telangana', 'gst_state_code' => '36', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'TR', 'state_name' => 'Tripura', 'gst_state_code' => '16', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'UP', 'state_name' => 'Uttar Pradesh', 'gst_state_code' => '09', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'UK', 'state_name' => 'Uttarakhand', 'gst_state_code' => '05', 'is_union_territory' => false],
            ['country_code' => 'IN', 'state_code' => 'WB', 'state_name' => 'West Bengal', 'gst_state_code' => '19', 'is_union_territory' => false],
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
