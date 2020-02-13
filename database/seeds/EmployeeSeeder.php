<?php

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Employees user
        factory(User::class, 100)->create()->each(function ($employee) {
            factory(Employee::class)->create([
                'user_id' => $employee->id
            ]);
            $employee->assignRole('employee');
        });
    }
}
