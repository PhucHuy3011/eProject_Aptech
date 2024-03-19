<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MylayoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerProject;
use App\Models\Category;
use App\Models\Country;
use App\Models\Feedback;
use App\Models\News;
use App\Models\User;
use GuzzleHttp\Middleware;

Route::group([], function () {
    Route::get('/', [ControllerProject::class, 'home']);
    Route::get('/index', [ControllerProject::class, 'home'])->name('index');
    Route::get('/index2', [ControllerProject::class, 'home2'])->name('index2');
    

    Route::get('/search', [ControllerProject::class, 'search']);

    Route::group(['prefix' => 'world'], function () {
        Route::get('/', [ControllerProject::class, 'listworld']);
        Route::get('/{countryname}', [ControllerProject::class, 'world']);
        Route::get('/{countryname}/{name}', [ControllerProject::class, 'news']);
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/{categoriesname}', [ControllerProject::class, 'category']);
        Route::get('/{categoriesname}/{name}', [ControllerProject::class, 'news']);
    });

    Route::group(['prefix' => 'breakingnews'], function () {
        Route::get('/', [ControllerProject::class, 'breakingnews']);
        Route::get('/{news}/{name}', [ControllerProject::class, 'news']);
    });

});

Route::get('/dashboard', function () {
    $data = [
        'total_category' => Category::count() + Country::count(),
        'total_news' => News::count(),
        'total_user' => User::count(),
        'total_feedback' => Feedback::count(),
    ];
    return view('layout/admin/index')->with($data);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create']);
});*/
Route::get('/registers', [AuthController::class, 'register'])->name('registers');
Route::post('/registers', [AuthController::class, 'registerPost'])->name('registers');

Route::get('/logins', [AuthController::class, 'login']);
Route::post('/logins', [AuthController::class, 'loginPost'])->name('logins');







Route::get('/logon', [AdminController::class, 'logon'])->name('logon');
Route::post('/logon', [AdminController::class, 'postlogon'])->name('admin.logon');
Route::get('/sign-out', [AdminController::class, 'signOut'])->name('admin.signout');

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/', [MylayoutController::class, 'index']);
    Route::get('/index', [MylayoutController::class, 'index']);

    //Category
    Route::get('/addCategory', [MylayoutController::class, 'addCategory']);
    Route::post('/saveCategory', [MylayoutController::class, 'saveCategory']);

    Route::get('/editCategory/{id}', [MylayoutController::class, 'editCategory']);
    Route::post('/updateCategory', [MylayoutController::class, 'updateCategory']);

    Route::get('/listCategory', [MylayoutController::class, 'listCategory']);
    Route::get('/deleteCategory/{id}', [MylayoutController::class, 'deleteCategory']);

    //Country
    Route::get('/addCountry', [MylayoutController::class, 'addCountry']);
    Route::post('/saveCountry', [MylayoutController::class, 'saveCountry']);

    Route::get('/editCountry/{id}', [MylayoutController::class, 'editCountry']);
    Route::post('/updateCountry', [MylayoutController::class, 'updateCountry']);

    Route::get('/listCountry', [MylayoutController::class, 'listCountry']);
    Route::get('/deleteCountry/{id}', [MylayoutController::class, 'deleteCountry']);

    //News
    Route::get('/listNews', [MylayoutController::class, 'listNews']);

    Route::get('/addNews', [MylayoutController::class, 'addNews']);
    Route::post('/saveNews', [MylayoutController::class, 'saveNews']);

    Route::get('/editNews/{id}', [MylayoutController::class, 'editNews']);
    Route::post('/updateNews', [MylayoutController::class, 'updateNews']);

    Route::get('/deleteNews/{id}', [MylayoutController::class, 'deleteNews']);

    //User
    Route::get('/editUser/{id}', [MylayoutController::class, 'editUser']);
    Route::post('/updateUser', [MylayoutController::class, 'updateUser']);

    Route::get('/listUser', [MylayoutController::class, 'listUser']);
    Route::get('/deleteUser/{id}', [MylayoutController::class, 'deleteUser']);

    //Feedback
    Route::get('/listFeedback', [MylayoutController::class, 'listFeedback']);
    Route::get('/deleteFeedback/{id}', [MylayoutController::class, 'deleteFeedback']);

});
require __DIR__ . '/auth.php';
