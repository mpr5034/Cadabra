<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('plans')->delete();
        
        \DB::table('plans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Startup',
                'slug' => 'startup',
                'orderby' => 1,
                'featured' => 0,
                'description' => '',
                'gateway_id' => 'plan_DSSWRgXqR7sOQ8',
                'price' => '39.00',
                'active' => 1,
                'teams_limit' => 24,
                'storage_limit' => 24,
                'created_at' => '2018-09-16 16:10:54',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Standard',
                'slug' => 'standard',
                'orderby' => 2,
                'featured' => 1,
                'description' => '',
                'gateway_id' => 'plan_DSSXjsc0Msmy6a',
                'price' => '99.00',
                'active' => 1,
                'teams_limit' => 50,
                'storage_limit' => 100,
                'created_at' => '2018-09-16 16:10:54',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Premium',
                'slug' => 'premium',
                'orderby' => 3,
                'featured' => 0,
                'description' => '',
                'gateway_id' => 'plan_DSSXL9SU1P20Sg',
                'price' => '199.00',
                'active' => 1,
                'teams_limit' => NULL,
                'storage_limit' => NULL,
                'created_at' => '2018-09-16 16:10:54',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}