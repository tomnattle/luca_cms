<?php

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
$domain = 'fanbai123.cn';
if(env('APP_ENV') == 'local'){
    $domain = 'luca_cms.com';
}

Route::group(['domain' => 'poetry.' . $domain], function(){
    Route::get('/', 'Site\PoetryController@index');
    Route::get('/poetries', 'Site\PoetryController@index');
    //Route::group(['middleware'=>'throttle:20'],function(){
    Route::put('/poetries/{poetryid}/like', 'Site\PoetryController@like')->where('poetryid', '[\s\S]{1,20}');
    Route::get('/poetries/{key}/{value}', 'Site\PoetryController@index')->where('key', 'ages|authors')->where('age', '[\s\S]{1,10}');;
    //});
    //Route::group(['middleware'=>'throttle:20'],function(){
    Route::put('/poetries/{poetryid}/like', 'Site\PoetryController@like')->where('poetryid', '[\s\S]{1,20}');
    //});
    //Route::group(['middleware'=>'throttle:30'],function(){
    Route::get('/poetries/{poetryid}', 'Site\PoetryController@show')->where('poetryid', '[\s\S]+');
    Route::get('/authors' , 'Site\AuthorController@index');
    //});
});

// 多子域名 无登陆可访问
Route::group(['domain' => '{domain}.' . $domain, 'middleware' => ['throttle:20']], function(){
     Route::post('/auth/ajaxlogin', 'Auth\LoginController@ajaxLogin');

});

// 多子域名 登陆后可访问
Route::group(['middleware' => ['comment'], 'domain' => '{domain}.' . $domain], function(){
    Route::post('/comments/list', 'Site\CommentController@list');
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('/comments', 'Site\CommentController');
        Route::post('/comments/mark', 'Site\CommentController@mark');
    });

});

Route::group(['domain' => $domain], function(){
    Route::get('/', 'SiteController@index');
        // 社交
    Route::get('/users/{user_id}', 'UserController@homePage')->where('user_id', '[\d]+');

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('/home/im/chats', 'Im\ChatController');
        Route::resource('/home/im/friends', 'Im\FriendController');
        Route::resource('/home/im/groups', 'Im\GroupController');
        Route::resource('/home/im/lbses', 'Im\LbsController');
        Route::resource('/home/im/blogs', 'Im\blogController');
        Route::resource('/home/im/messages', 'Im\MessageController');
    });

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::resource('/home/admin', 'AdminController');
        Route::resource('/home/admin/helpers', 'HelperController');
    });

    //登录页
    Route::group(['middleware' => ['auth']], function () {
        
        //站点配置
        Route::get('home/settings', 'SettingController@index');
        Route::resource('home/settings/configs', 'Setting\ConfigController');
        Route::resource('home/settings/dicts', 'Setting\DictController');
        Route::get('/home/sites/config', 'Cms\SiteController@config');
        Route::put('/home/sites/config', 'Cms\SiteController@configUpdate');
        Route::get('/home/sites/admin', 'Cms\SiteController@admin');
        Route::resource('/home/sites', 'Cms\SiteController');
        Route::get('/home/sites/{siteid}/select', 'Cms\SiteController@select')->where('siteid', '[0-9]+');
        Route::get('/home/sites/{siteid}/select-back', 'Cms\SiteController@selectBack')->where('siteid', '[0-9]+');
        // Route::get('/home/sites/{siteid}/admin/init', 'Cms\SiteController@init')->where('siteid', '[0-9]+');

        // 用户资料
        Route::put('/home/users/profile', 'UserController@profileUpdate');
        Route::get('/home/users/profile', 'UserController@profile');
        Route::put('/home/users/secure', 'UserController@resetPassword');
        Route::get('/home/users/secure', 'UserController@secure');

        // 文件管理
        Route::delete('/home/folders', 'Cms\FileFolderController@delMuti');
        Route::resource('home/folders', 'Cms\FileFolderController');
        Route::put('/home/files/setViewMode', 'Cms\FileController@setViewMode');
        Route::delete('/home/files', 'Cms\FileController@delMuti');
        Route::resource('home/files', 'Cms\FileController');
        // 文件上传
        Route::post('/server/uploads', 'Cms\Servercontroller@uploads');
    });

    //站点
    Route::group(['middleware' => ['auth', 'site.select']], function () {
        Route::get('/home/companies/{form}', 'Cms\CompanyController@edit')->where('form', 'config|desc|qualification|contact|password|dict');
        Route::get('/home/companies/', 'Cms\CompanyController@edit');
        Route::resource('/home/companies', 'Cms\CompanyController');
        Route::resource('/home/article-groups', 'Cms\ArticleGroupController');
        Route::resource('/home/articles', 'Cms\ArticleController');
        Route::resource('/home/article-cats', 'Cms\ArticleCatController');
        Route::resource('/home/albums', 'Cms\AlbumController');
        Route::resource('/home/photos', 'Cms\PhotoController');
        Route::Post('/home/blogs/{blogid}/comment', 'Cms\BlogController@comment')->where('blogid', '[0-9]+');
        Route::Post('/home/blogs/{blogid}/like', 'Cms\BlogController@like')->where('blogid', '[0-9]+');
        Route::resource('/home/blogs', 'Cms\BlogController');
        Route::put('/home/jobs/state', 'Cms\JobController@onoff');
        Route::get('/home/jobs/resumes-recieve', 'Cms\JobController@resumeRecieve');
        Route::get('/home/jobs/cats/{gid}', 'Cms\JobController@cats')->where('gid', '[0-9]+');
        Route::put('/home/jobs/resumes/state', 'Cms\ResumeController@onoff');
        Route::get('/home/jobs/resumes/apply', 'Cms\ResumeController@jobApply');
        Route::resource('/home/goods/vendors', 'Cms\GoodsVendorController');
        Route::resource('/home/goods/cats', 'Cms\GoodsCatController');
        Route::resource('/home/jobs/resumes', 'Cms\ResumeController');
        Route::resource('/home/jobs', 'Cms\JobController');
        Route::resource('/home/templates', 'Cms\TemplateController');
        Route::get('/home/goods/groups', 'Cms\GoodsController@groups');
        Route::put('/home/goods/state', 'Cms\GoodsController@onoff');
        Route::resource('/home/goods', 'Cms\GoodsController');
        Route::resource('/home/pays', 'Cms\PayController');
        Route::resource('/home/orders', 'Cms\OrderController');
        Route::put('/home/albums/{photoId}/set-cover', 'Cms\AlbumController@setCover')->where('photoId', '[0-9]+');
    });
    Route::group(['middleware'=>'throttle:20'],function(){
        Auth::routes();
    });
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/document', 'HomeController@document');
});

Route::group(['domain' => '{siteName}.' . $domain, 'middleware' => ['front', 'uservisite']], function(){
    // 前端站点
    Route::get('/', 'Front\HomeController@index');
    Route::get('{menuName}', 'Front\ArticleController@index')->where('menuName', 'blogs'); 
    Route::get('{menuName}/{id}', 'Front\ArticleController@show')->where('menuName', 'blogs')->where('id', '[0-9]+'); 
});


