<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         {
         $newsRecord = [
            ['id'=>1,'title'=>'Admin','slug'=>'admin','category_id'=>1,'short_description'=>'short description','description'=>'news description','feature_image'=>'image.png','pradesh'=>'','news_type'=>'banner','tags'=>'news','status'=>1,'view_count'=>0,'meta_title'=>'meta title','meta_keywords'=>'meta keywords','meta_descriptions'=>'meta description','created_by'=>1,'updated_by'=>1
        ]

           ]; 
        News::insert($newsRecord);
       }
      }
}
