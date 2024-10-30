<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\backend\CmsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HireRequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentSystems\CommentsController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\marketplace\MarketplaceController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\backend\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ChatSystem\ChatController;
use App\Http\Controllers\ChatSystem\RequestChatController;


Route::get('/', [FrontController::class, 'home'])->name('prompt.home');
Route::get('/about-us', [FrontController::class, 'about'])->name('prompt.about');
Route::get('/contact-us', [FrontController::class, 'contactus'])->name('prompt.contact');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('prompt.pricing');
Route::get('/blogs', [FrontController::class, 'blogs'])->name('prompt.blogs');
Route::get('/blog/{slug}', [FrontController::class, 'blogs_details'])->name('prompt.blogs_details');
Route::get('/get-users-by-role', [BackendController::class, 'getUsersByRole'])->name('get_users_by_role');
Route::get('/discover', [FrontController::class, 'discover'])->name('prompt.explore');
Route::get('/hire', [FrontController::class, 'hire'])->name('prompt.hire');
Route::get('/creator/{slug}', [FrontController::class, 'creator_single'])->name('prompt.profile');
Route::get('/generate/{id}', [FrontController::class, 'generation_single'])->name('prompt.generation_single');
Route::get('/create', [FrontController::class, 'create'])->name('prompt.create');
Route::get('/shop', [MarketplaceController::class, 'shop'])->name('prompt.marketplace');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [BackendController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/admin/create', [FrontController::class, 'create'])->name('admin.prompt.create');
    Route::get('/subcsription-create', [BackendController::class, 'create_subscription'])->name('subscription.create');
    Route::get('/subcsription-lists', [BackendController::class, 'list_subscription'])->name('subscription.lists');
    Route::get('/get-subs', [BackendController::class, 'get_subs'])->name('subscriptions.index');
    Route::post('/prices', [BackendController::class, 'store_subscription'])->name('prices.store');
    Route::get('/edit-pricing/{id}', [BackendController::class, 'edit'])->name('edit.pricing');
    Route::put('/prices/{id}', [BackendController::class, 'update_subscription'])->name('prices.update');
    Route::delete('/prices/{id}', [BackendController::class, 'destroy_subscription'])->name('prices.destroy');
    Route::get('/admin-profile-update', [BackendController::class, 'profile_update'])->name('admin_profile_update');
    Route::post('/admin-update-profile', [BackendController::class, 'updateProfile'])->name('admin_update_profile');
    Route::get('/admin-prompts', [BackendController::class, 'my_prompts'])->name('admin_prompts');
    Route::get('/admin-chat', [BackendController::class, 'chatUser'])->name('admin_chat_user');

    Route::get('/admin-blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/get-blogs', [BlogController::class, 'get_blogs'])->name('blogs.get');
    Route::get('/admin-create-blog', [BlogController::class, 'create_blogs'])->name('create_blogs');
    Route::post('/admin-blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('/admin-blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    Route::get('/admin-categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/get-categories', [CategoryController::class, 'get_categories'])->name('categories');
    Route::post('/admin-categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('categories/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('/admin-test-api', [BackendController::class, 'testApi'])->name('admin_generate_image');
    Route::get('/admin-contact-settings', [CmsController::class, 'contact_page'])->name('admin.contact_page');
});

Route::middleware(['auth', 'role:general_user'])->group(function () {
    Route::get('/user/dashboard', [BackendController::class, 'dashboard'])->name('user_dashboard');
//    Route::get('/user/create', [FrontController::class, 'create'])->name('user_prompt_create');
    Route::get('/user-profile-update', [BackendController::class, 'profile_update'])->name('user_profile_update');
    Route::post('/user-update-profile', [BackendController::class, 'updateProfile'])->name('user_update_profile');
    Route::get('/user-chat', [BackendController::class, 'chatUser'])->name('user_chat');
    Route::post('/user-test-api', [BackendController::class, 'testApi'])->name('user_generate_image');



});

Route::middleware(['auth', 'role:content_creator'])->group(function () {
    Route::get('/creator-profile-update', [BackendController::class, 'profile_update'])->name('creator_profile_update');
    Route::get('/creator-dashboard', [BackendController::class, 'dashboard'])->name('creator_dashboard');
    Route::get('/creator-create', [FrontController::class, 'create'])->name('creator_prompt_create');
    Route::get('/creator-prompts', [BackendController::class, 'my_prompts'])->name('creator-prompts');
    Route::post('/creator-test-api', [BackendController::class, 'testApi'])->name('creator_test_api');
    Route::post('/creator-update-profile', [BackendController::class, 'updateProfile'])->name('creator_update_profile');
    Route::get('/creator-chat', [BackendController::class, 'chatUser'])->name('creator_chat');
    Route::post('/creator-update-prompt', [BackendController::class, 'updatePrompt'])->name('creator.update.prompt');
    Route::get('/get-prompt-cats', [BackendController::class, 'get_prompt_categories'])->name('prompt_categories');

});

Route::post('/hire-content-creator', [HireRequestController::class, 'store'])->name('hire_Creator');
Route::post('/accept-hiring-request', [HireRequestController::class, 'accept'])->name('accept.hire_creator');
Route::post('/reject-hiring-request', [HireRequestController::class, 'reject'])->name('reject.hire_creator');


Route::middleware(['auth'])->group(function () {
    Route::post('/profile-likes',[LikeController::class,'add_remove_like'])->name('profile.like');
    Route::post('/comments-likes',[LikeController::class,'add_remove_comments_like'])->name('comment.like');

    Route::get('/notifications', [NotificationController::class, 'getUserNotifications'])->name('notifications.all');

});


Route::prefix('comments')->group(function () {
    Route::get('/main-comments',[CommentsController::class,'get_all_comments'])->name('comments.main');
    Route::get('/child-comments',[CommentsController::class,'child_all_comments'])->name('comments.child');
    Route::post('/send-comments',[CommentsController::class,'insert_comment'])->name('comments.insert');
});

Route::prefix('/chat')->group(function () {
    Route::get("/get-users" , [RequestChatController::class , 'requested_users'])->name('get-users');
    Route::get("/get-chat-messages" , [ChatController::class , 'index'])->name('get-chat-messages');
    Route::post("/send-messages" , [ChatController::class , 'store'])->name('send-messages');
});

Route::post('/message/user' , [RequestChatController::class, 'user_request_chat'])->name('user_request_chat');


Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Auth::routes();
