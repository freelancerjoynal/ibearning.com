<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\adminLoginController;
use App\Http\Controllers\admin\adminWorkingZoneController;
use App\Http\Controllers\admin\classController;
use App\Http\Controllers\admin\courseController;
use App\Http\Controllers\admin\notificationController;
use App\Http\Controllers\admin\paymentController;
use App\Http\Controllers\admin\siteDetailController;
use App\Http\Controllers\admin\supportingTeamController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\user\timeline\timelineController;
use App\Http\Controllers\user\paymentController as UserPaymentController;
use App\Http\Controllers\user\postController;
use App\Http\Controllers\user\postLikeController;
use App\Http\Controllers\user\profileController;
use App\Http\Controllers\user\userDashboardController;
use App\Http\Controllers\user\userLoginRegisterController;
use App\Http\Controllers\user\workingZoneController;
use App\Http\Controllers\website\websiteController;
use App\Models\paymentRequest;
use Illuminate\Support\Facades\Route;
//=======================================
//Public website routes
//=======================================



Route::get('/' , [websiteController::class, 'HomePage'] );
Route::get('/about' , [websiteController::class, 'AboutPage'] );
Route::get('/courses' , [websiteController::class, 'CoursePage'] );

Route::get('/privacy-policy', function(){
    return view('website.privacy');
});

Route::get('/register' , [userLoginRegisterController::class, 'showRegisterPage'] );
Route::post('/register-confirm' , [userLoginRegisterController::class, 'userRegistration'] );
Route::get('/log-in' , [userLoginRegisterController::class, 'showLogInPage'] );
Route::post('/login-confirm' , [userLoginRegisterController::class, 'userLoginConfirm'] );
Route::get('/refer/{referid}' , [userLoginRegisterController::class, 'registerByRefer'] );

//========================================
//Users
//========================================

Route::prefix('user')->group(function () {
    Route::middleware(['userPanelMiddleware'])->group(function(){

        //Showing the posts in timeline
        Route::get('/', function(){ return redirect('/timeline'); });
        Route::get('/timeline' , [timelineController::class, 'showTimeLine'] );

        //Saving the like in database
        Route::post('/post/like' , [postLikeController::class , 'likeOnly']);
        //Showing the post details
        Route::get('/post-id/{postid}' , [postController::class, 'showPostDetails'] );
        //Commenting on post
        Route::post('/comment/insert' , [postController::class , 'insertNewComment']);


        Route::get('/dashboard' , [userDashboardController::class, 'showTheDashbard'] );
        Route::get('/log-out' , [userDashboardController::class, 'logOut'] );

        //Payment Request routes
        Route::prefix('payment')->group(function () {
            Route::post('/request' , [UserPaymentController::class , 'addNewRequest']);
            Route::get('/pay-du/{id}' , [UserPaymentController::class , 'payDuPoint']);
        });

        //Profile Routes
        Route::get('/my-profile' , [profileController::class , 'ShowOwnProfile']);
        
        Route::prefix('profile')->group(function () {
            Route::post('/update' , [profileController::class , 'updateProfile']);
            Route::get('/{userid}' , [timelineController::class , 'showProfile']);


            //Posting System
            Route::get('/{userid}' , [timelineController::class , 'showProfile']);

            //Insert Post
            Route::post('/add-new/post' , [timelineController::class , 'addNewPost']);
            //delete post
            Route::get('/post-delete/{postid}' , [timelineController::class , 'deletePost']);

        });

        //Working Zone Routes
        Route::prefix('working-zone')->group(function () {
            Route::get('/' , [workingZoneController::class , 'showTheWorks']);
            Route::post('/add-new' , [workingZoneController::class , 'submitWork']);
        });

    });
});
//========================================
//Main Admin Routes
//========================================
Route::prefix('web-admin')->group(function () {
    
    //LOGIN PAGE
    Route::get('/', function(){ return redirect('/web-admin/dashboard'); });
    Route::get('/login' , [adminLoginController::class , 'showLoginPage']);
    Route::post('/admin-login-check' , [adminLoginController::class, 'adminLoginCheck'] );

      
    //ADMIN DASHBOARD
     Route::middleware(['adminPanel'])->group(function(){
        Route::get('/dashboard', function () { return view('admin.dashboard'); });
        Route::get('/log-out' , [adminController::class , 'logOut']);

        //The site detail Routes
        Route::get('/site-detail' , [siteDetailController::class , 'showTheDetails']);
        Route::post('/site-detail/update' , [siteDetailController::class , 'UpdateTheSiteDetail']);

        //The Course Routes
        Route::prefix('courses')->group(function () {
            Route::get('/' , [courseController::class , 'showTheCourses']);
            Route::post('/add-new-couse' , [courseController::class , 'AddNewCourse']);
            Route::get('/delete/{courseId}' , [courseController::class , 'deleteCourse']);
            Route::get('/edit/{courseId}' , [courseController::class , 'editCourse']);
            Route::post('/update' , [courseController::class , 'updateCourses']);
        });

        //The users Routes
        Route::prefix('users')->group(function () {
            Route::get('/' , [userController::class , 'showUserList']);
            Route::post('/update-point' , [userController::class , 'updatePoint']);
            Route::get('/view/{userId}' , [userController::class , 'viewTheUserData']);
            Route::get('/aprove/{userId}' , [userController::class , 'userAprove']);
            Route::get('/deactive/{userId}' , [userController::class , 'userDeActive']);
            Route::get('/sms-done/{userId}' , [userController::class , 'smsSentDone']);
            Route::get('/delete/{userId}' , [userController::class , 'deleteUser']);
        });

        //The notification routes
        Route::prefix('notifications')->group(function () {
            Route::get('/' , [notificationController::class , 'showNotifications']);
            Route::post('/add-new' , [notificationController::class , 'addNewNotifiation']);
            Route::get('/delete/{id}' , [notificationController::class , 'deleteNotification']);  
        });

        //Payment Request routes
        Route::prefix('payment-request')->group(function () {
            Route::get('/' , [paymentController::class , 'showThePaymentRequest']);
            Route::get('/paid/{requestid}' , [paymentController::class , 'payTheRequest']);
            Route::get('/delete/{requestid}' , [paymentController::class , 'deleteRequest']);
        });

        //Class option routes
        Route::prefix('classes')->group(function () {
            Route::get('/' , [classController::class , 'showTheClasses']);
            Route::post('/add-new' , [classController::class , 'addNewClass']);
            Route::get('/edit/{id}' , [classController::class , 'editClassItem']);
            Route::post('/update' , [classController::class , 'updateClassitem']);
            Route::get('/delete/{id}' , [classController::class , 'deleteClass']);
        });

        //Working Zone routes
        Route::prefix('working-zone')->group(function () {
            Route::get('/' , [adminWorkingZoneController::class , 'showThelinksSubmitted']);
            Route::get('/submit-done/{id}/{userid}' , [adminWorkingZoneController::class , 'openTheAproveForm']);
            Route::post('/aprove-done' , [adminWorkingZoneController::class , 'AproveTheWork']);
            Route::get('/submit-delete/{id}' , [adminWorkingZoneController::class , 'deleteTheSubmitted']);
        });

        //Supporting team routes
        Route::prefix('support-team')->group(function () {
            Route::get('/' , [supportingTeamController::class , 'showTheSupportingTeamList']);
            Route::post('/add-new' , [supportingTeamController::class , 'addNewMember']);
            
            Route::get('/delete/{id}' , [supportingTeamController::class , 'delteTheTeamMember']);
        });
    });  
});