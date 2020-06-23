<?php

use Illuminate\Database\Seeder;

use App\Location;
use App\Employee;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Location::class, 10) -> create()
                  -> each(function($location){
                    $employees = Employee::inRandomOrder() -> take(rand(1,3))  -> get();
                    $location -> employees() -> attach($employees);
                  })
                  ;
    }
}
