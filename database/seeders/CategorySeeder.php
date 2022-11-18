<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         {
         $roleCategory = [
            ['id'=>1,'name'=>'Admin','status'=>1],
            ['id'=>2,'name'=>'Super Admin','status'=>1],
            ['id'=>3,'name'=>'Editor','status'=>1],

           ];
           
        Category::insert($roleCategory);
       }
      }
}
