<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         {
         $settingRecords = [
            ['id'=>1,'system_name'=>'Tarai Khabar','contact_number1'=>'123456','contact_number2'=>'123454321','address'=>'kathmandu','email_host'=>'4004','facebook'=>'facebook.com/sureshboh','chief_edtor'=>'freelancer','meta_title'=>'meta title']
           ];
        Setting::insert($settingRecords);
       }
      }


}
