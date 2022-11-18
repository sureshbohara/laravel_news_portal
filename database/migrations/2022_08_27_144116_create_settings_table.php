<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            //General Settings
            $table->string('system_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('loader')->nullable();
            $table->string('login_background_image')->nullable();
            $table->string('system_timezone')->nullable();
           

            //address setting
            $table->string('contact_number1')->nullable();
            $table->string('contact_number2')->nullable();
            $table->text('address')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('pan_vat')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('copy_right')->nullable();
            $table->string('copy_right_link')->nullable();


            //SMTP Settings 
            $table->tinyInteger('smtp_status')->default(0)->nullable();
            $table->string('email_host')->nullable();
            $table->string('email_port')->nullable();
            $table->string('email_encryption')->nullable();
            $table->string('email_user')->nullable();
            $table->string('email_pass')->nullable();
            $table->string('email_from')->nullable();
            $table->string('email_from_name')->nullable();
            $table->string('contact_email')->nullable();

            // social setting
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();

            //team setting
            $table->string('chief_edtor')->nullable();
            $table->string('chairman')->nullable();
            $table->string('editor')->nullable();
            $table->string('advisor_editor')->nullable();
            $table->string('assistant_editor')->nullable();
            $table->string('sub_editor')->nullable();
   
            //appearance setting
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->text('cookie_consent_message')->nullable();
            $table->text('cookie_consent_btn')->nullable();
            $table->tinyInteger('cookie_status')->default(0)->nullable();

            $table->tinyInteger('cube_status')->default(0)->nullable();

            $table->text('popup_content_message')->nullable();
            $table->string('popup_image')->nullable();
            $table->tinyInteger('popup_status')->default(0)->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
