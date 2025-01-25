<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomersModel;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CustomersModel::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'phone' =>"123456789",
                'address'=>"3434567678",
                'group'=>"Individual",
                'created_by'=>1
            ]);    
    }
}
