<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       // Assuming you have defined a DepartmentFactory and an AddressFactory

    // Retrieve addresses
    $addresses = Address::all();

    // Start a transaction
    DB::beginTransaction();

    try {
        foreach ($addresses as $address) {
            // Create a department for each address
            $department = new Department([
                'branch' => 'إدارة التحول الرقمى',
                'address_id' => $address->id,
            ]);
            $department->save();
        }

        // Commit the transaction
        DB::commit();
    } catch (\Exception $e) {
        // Rollback the transaction if an exception occurs
        DB::rollback();
        throw $e;
    }
}
}
