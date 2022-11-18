<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=>1,'name'=>'Tarai Khabar','role_id'=>1,'email'=>'info@admin.com','password'=>'$2y$10$1G0sVBb9GX5LgLgDJ3L5w.PnM6WG1ILQu/iF/S0U4VYT9OrEVlpvi','image'=>'','mobile'=>'9849866998','dob'=>'','join_date'=>'','salary'=>'','status'=>1]
         ];
        Admin::insert($adminRecords);

        
    }
}
