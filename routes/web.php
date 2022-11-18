<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Admin\TagsController;

use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Counter;
// using admin prefix
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function(){
// admin login page
  Route::match(['get','post'],'login','AdminController@adminLogin')->name('admin.login');
   //middleware authenticate for login
  Route::group(['middleware'=>['admin']],function(){
     // Admin Dashboard Route
     Route::get('dashboard','AdminController@dashboard')->name('dashboard');
     // Admin Logout
     Route::get('logout','AdminController@logoutAdmin')->name('admin.logout');
      // change Admin Password
     Route::match(['get','post'],'change/password','AdminController@updateAdminPassword')->name('change.admin.password');
      // check current password 
    Route::post('check-password','AdminController@chkCurrentPassword');
    // update pasword
    Route::post('update/password','AdminController@updateCurrentPassword')->name('update.password');
    // Update Admin Details
    Route::match(['get','post'],'update/profile','AdminController@updateProfile')->name('update.profile');
    
    Route::resource('user',AdminController::class);
    //user status change
    Route::post('user-status', [AdminController::class, 'changeUserStatus'])->name('user.status');
    Route::get('reporter', [AdminController::class, 'getReporter'])->name('reporter');
    
    Route::resource('role',RoleController::class);
     //user status change
    Route::post('role-status', [RoleController::class, 'changeRoleStatus'])->name('role.status');

    Route::resource('permission',PermissionController::class);
     //user status change
    Route::post('permission-status', [PermissionController::class, 'changePermissionStatus'])->name('permission.status');

    // general settion
     Route::get('general/setting', [SettingController::class, 'generalSetting'])->name('general.setting');
     Route::post('general/setting/update', [SettingController::class, 'generalUpdate'])->name('general.update');

     //------------ SMTP------------
      Route::get('smtp', [SettingController::class,'smtp'])->name('setting.smtp');
      Route::post('smtp/update', [SettingController::class,'smtplUpdate'])->name('update.smtp');
    
      //------------ SOCIAL------------
      Route::get('social', [SettingController::class,'social'])->name('setting.social');
      Route::post('social/update', [SettingController::class,'socialUpdate'])->name('update.social');

       //------------ TEAM------------
      Route::get('team', [SettingController::class,'team'])->name('setting.team');
      Route::post('team/update', [SettingController::class,'teamUpdate'])->name('update.team');

       //------------ ADDRESS------------
      Route::get('address', [SettingController::class,'address'])->name('setting.address');
      Route::post('address/update', [SettingController::class,'addressUpdate'])->name('update.address');

      //------------ SEO------------
      Route::get('seo', [SettingController::class,'seo'])->name('setting.seo');
      Route::post('seo/update', [SettingController::class,'seoUpdate'])->name('update.seo');


       //------------ Cookie SETTING ------------
        Route::get('cookie', [SettingController::class, 'cookie'])->name('cookie.setting');
        Route::post('cookie/update', [SettingController::class, 'cookieUpdate'])->name('cookie.update');
        Route::post('popup/update', [SettingController::class, 'popupUpdate'])->name('popup.update');

        //cube adv
        //------------ Cookie SETTING ------------
        Route::get('cube', [SettingController::class, 'cube'])->name('cube.setting');
        Route::post('cube/update', [SettingController::class, 'cubeUpdate'])->name('cube.update');


    //category
    Route::resource('category',CategoryController::class);
    //category status
    Route::post('category-status', [CategoryController::class, 'changeCategoryStatus'])->name('category.status');
    

     //tags
    Route::resource('tags',TagsController::class);
    Route::post('tags-status', [TagsController::class, 'changeTagsStatus'])->name('tags.status');
     //news
    Route::resource('news',NewsController::class);
    Route::get('archive', [NewsController::class, 'archive'])->name('news.archive');
    Route::get('all', [NewsController::class, 'allNews'])->name('news.all');
    //news status
    Route::post('news-status', [NewsController::class, 'changeNewsStatus'])->name('news.status');

   // blogs category
     Route::resource('bcategory',BlogCategoryController::class);
     //bcategory status change
    Route::post('bcategory/status', [BlogCategoryController::class, 'changebcategoryStatus'])->name('bcategory.status');

    // blogs 
     Route::resource('blogs',BlogsController::class);
     //blogs status change
    Route::post('blogs/status', [BlogsController::class, 'changeblogsStatus'])->name('blogs.status');

    // poll 
     Route::resource('poll',PollController::class);
     //poll status change
    Route::post('poll/status', [PollController::class, 'changePollStatus'])->name('poll.status');

    // pages 
     Route::resource('pages',PageController::class);
     //pages status change
    Route::post('pages/status', [PageController::class, 'changePageStatus'])->name('pages.status');

    // adv 
     Route::resource('advertisement',AdvertisementController::class);
     //adv status change
    Route::post('advertisement/status', [AdvertisementController::class, 'changeAdvStatus'])->name('advertisement.status');

    

     // -------------- SYSTEM BACKUP ---------------//
      Route::get('system/backup', [BackupController::class, 'systemBackup'])->name('system.backup');
      Route::get('database/backup', [BackupController::class, 'databaseBackup'])->name('database.backup');
     Route::get('/cache/clear', function() {
      Artisan::call('cache:clear');
      Artisan::call('config:clear');
      Artisan::call('route:clear');
      Artisan::call('view:clear');
      toastr()->success('System Cache Has Been Removed.');
      return redirect()->route('dashboard');
    })->name('cache.clear');

    // sitemap 
     Route::resource('sitemap',SitemapController::class);
     Route::any('sitemap/download', [SitemapController::class, 'download'])->name('download.sitemap');


 });

 // end middleware
});


  Route::namespace('App\Http\Controllers\Front')->group(function(){
    //indx page route
    Route::get('/', [IndexController::class,'index'])->name('home');
    Route::get('/news/category/{id}/{slug}', [IndexController::class,'categoryPost'])->name('category.post');

    //tage
    Route::get('/news/tags/{id}/{slug}', [IndexController::class,'tagsPost'])->name('tags.post');
    //post details
    Route::get('/news/{id}', [IndexController::class,'postDetails'])->name('post.details');

     Route::get('pages/{slug}', [IndexController::class,'pageDetails'])->name('page.details');
     Route::post('poll/submit', [IndexController::class,'pollSubmit'])->name('poll.submit');
     
     Route::get('poll/result', [IndexController::class,'pollResult'])->name('poll.result');

     //post comment
      Route::post('comment', [CommentController::class,'postComment'])->name('post.comment');

      //user login
       Route::match(['get','post'],'user/login','UserController@loginUser')->name('user.login');
       Route::match(['get','post'],'user/register','UserController@userRegister')->name('user.register');

       Route::get('signout', [UserController::class, 'signOut'])->name('signout');

      Route::get('user/comment', [UserController::class,'userComment'])->name('user.comment')->middleware('auth');
      Route::match(['get','post'],'comment-delete/{id}', [CommentController::class,'deleteCommentPost'])->name('comment.delete')->middleware('auth');

      // Like Or Dislike
      Route::post('save-likedislike','IndexController@save_likedislike');
      // load more news ajax
      Route::get('load-more-data','IndexController@more_data');
});


