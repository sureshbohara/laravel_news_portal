<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;
class SettingController extends Controller
{
    

// general setting
    public function generalSetting(){
      $setting = Setting::find(1);
      return view('admin.setting.general_setting',['setting' => $setting]);
    }

    public function generalUpdate(Request $request){
      $data = Setting::find(1);
      $data->system_name = $request['system_name'];
      $data->system_timezone = $request['system_timezone'];


       if ($data){
            if ($request->hasFile('logo')) {
                $data->addMediaFromRequest('logo')->toMediaCollection('logo');
           }
         }

         if ($data){
            if ($request->hasFile('favicon')) {
                $data->addMediaFromRequest('favicon')->toMediaCollection('favicon');
           }
         }


         if ($data){
            if ($request->hasFile('loader')) {
                $data->addMediaFromRequest('loader')->toMediaCollection('loader');
           }
         }


         if ($data){
            if ($request->hasFile('login_background_image')) {
                $data->addMediaFromRequest('login_background_image')->toMediaCollection('login_background_image');
           }
         }


      $data->update();
      toastr()->success('Data has been Update successfully !!');
      return redirect()->back();  
    }
   


// smtp setting
     public function smtp(){
        $setting = Setting::find(1);
        return view('admin.setting.smtp_setting',['setting' => $setting]);
     }

      public function smtplUpdate(Request $request){
        $data = Setting::find(1);

         if(isset($request['smtp_status'])){
            $data['smtp_status'] = 1;
            }else{
            $data['smtp_status'] = 0;
         }
        $data->email_host = $request->get('email_host');
        $data->email_port = $request->get('email_port');
        $data->email_encryption = $request->get('email_encryption');
        $data->email_user = $request->get('email_user');
        $data->email_pass = $request->get('email_pass');
        $data->email_from = $request->get('email_from');
        $data->email_from_name = $request->get('email_from_name');
        $data->contact_email = $request->get('contact_email');
        $data->update();
        toastr()->success('Data Updated Successfully!!');
      return redirect()->route('setting.smtp');
    }



    // social settion

     public function social(){
        $setting = Setting::find(1);
        return view('admin.setting.social_setting',['setting' => $setting]);
     }

      public function socialUpdate(Request $request){
        $data = Setting::find(1);
        $data->facebook = $request->get('facebook');
        $data->twitter = $request->get('twitter');
        $data->youtube = $request->get('youtube');
        $data->linkdin = $request->get('linkdin');
        $data->instagram = $request->get('instagram');
        $data->tiktok = $request->get('tiktok');
        $data->update();
        toastr()->success('Data Updated Successfully!!');
      return redirect()->route('setting.social');
    }

    //team setting
     public function team(){
        $setting = Setting::find(1);
        return view('admin.setting.team_setting',['setting' => $setting]);
     }

      public function teamUpdate(Request $request){
        $data = Setting::find(1);
        $data->chief_edtor = $request->get('chief_edtor');
        $data->chairman = $request->get('chairman');
        $data->editor = $request->get('editor');
        $data->advisor_editor = $request->get('advisor_editor');
        $data->assistant_editor = $request->get('assistant_editor');
        $data->sub_editor = $request->get('sub_editor');
        $data->update();
        toastr()->success('Data Updated Successfully!!');
      return redirect()->route('setting.team');
    }


     //address setting
     public function address(){
        $setting = Setting::find(1);
        return view('admin.setting.address_setting',['setting' => $setting]);
     }

      public function addressUpdate(Request $request){
        $data = Setting::find(1);
        $data->contact_number1 = $request->get('contact_number1');
        $data->contact_number2 = $request->get('contact_number2');
        $data->address = $request->get('address');
        $data->email_1 = $request->get('email_1');
        $data->email_2 = $request->get('email_2');
        $data->pan_vat = $request->get('pan_vat');
        $data->reg_no = $request->get('reg_no');
        $data->copy_right = $request->get('copy_right');
        $data->copy_right_link = $request->get('copy_right_link');
         $data->footer_text = $request->get('footer_text');
         $data->facebook_comment = $request->get('facebook_comment');
        $data->update();
        toastr()->success('Data Updated Successfully!!');
      return redirect()->route('setting.address');
    }

       //seo setting
     public function seo(){
        $setting = Setting::find(1);
        return view('admin.setting.seo_setting',['setting' => $setting]);
     }

      public function seoUpdate(Request $request){
        $data = Setting::find(1);
        $data->meta_title = $request->get('meta_title');
        $data->meta_description = $request->get('meta_description');

        $meta_keywords = array();
        if($request->meta_keywords[0] != null){
            foreach (json_decode($request->meta_keywords[0]) as $key => $keywords) {
                array_push($meta_keywords, $keywords->value);
            }
        }
        $data->meta_keywords = implode(',', $meta_keywords);
        $data->update();
        toastr()->success('Data Updated Successfully!!');
      return redirect()->route('setting.seo');
    }


     /*--------- cookie setting _______*/
     public function cookie()
    {
        $setting = Setting::find(1);
       return view('admin.setting.cookie_popup', ['setting' => $setting]);
    }

    public function cookieUpdate(Request $request)
    {
        $data = Setting::find(1);
         if(isset($request['cookie_status'])){
            $data['cookie_status'] = 1;
            }else{
            $data['cookie_status'] = 0;
         }

        $data->cookie_consent_message = $request->get('cookie_consent_message');
        $data->cookie_consent_btn = $request->get('cookie_consent_btn');
        $data->update();
        toastr()->success('Cookie Information Updated!!');
        return redirect()->route('cookie.setting');
    }

     public function popupUpdate(Request $request)
    {
        $data = Setting::find(1);
         if(isset($request['popup_status'])){
            $data['popup_status'] = 1;
            }else{
            $data['popup_status'] = 0;
         }

        $data->popup_content_message = $request->get('popup_content_message');

         if($request->hasFile('popup_image')){
          $image_tmp = $request->file('popup_image');
          if($image_tmp->isValid()){
            $extension = $image_tmp->getClientOriginalExtension();                            
            $imageName = rand(111,99999).'.'.$extension;
            $imagePath = 'images/setting/'.$imageName;
            Image::make($image_tmp)->resize(400,400)->save($imagePath);
            $data['popup_image'] = $imageName;
          }
         }

        
        $data->update();
        toastr()->success('Popup Data Updated!!');
        return redirect()->back();
    }


    // cube adv

     /*--------- cube adv setting _______*/
     public function cube()
    {
        $setting = Setting::find(1);
       return view('admin.setting.cube_setting', ['setting' => $setting]);
    }

    public function cubeUpdate(Request $request)
    {
        $data = Setting::find(1);
         if(isset($request['cube_status'])){
            $data['cube_status'] = 1;
            }else{
            $data['cube_status'] = 0;
         }

        $data->update();
        toastr()->success('Cube Adv change successfully!!');
        return redirect()->route('cube.setting');
    }


   

}
