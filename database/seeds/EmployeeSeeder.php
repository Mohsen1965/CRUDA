<?php

use Illuminate\Database\Seeder;
use App\Employee

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $count = 50;
        Employee::truncate();
        factory(Employee::class, $count)->create();
    }
}
