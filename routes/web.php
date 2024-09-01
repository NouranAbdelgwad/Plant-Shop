<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\RegisterationController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PlantController::class, "index"]);
Route::get("/contact", function(){return view("emails.contact");});
Route::post("/contact", [ContactController::class, "send"]);
Route::get("/plants", [PlantController::class, "get"]);
Route::get("/sorted", [PlantController::class, "filter"]);
Route::get("/about", function(){return view("about");});
Route::get("/plants/{id}", [PlantController::class, "show"]);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete("/cart/delete/{id}", [CartController::class, "delete"])->name('cart.delete');
Route::put("/cart/update", [CartController::class, "updateAll"])->name('cart.update');



// Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::delete("/product/delete/{id}", [DashboardController::class, 'delete']);
Route::post("/dashboard/add", [DashboardController::class, "create"]);
Route::put("/dashboard/update/{id}", [DashboardController::class, "update"]);

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get("/sign-up", [RegisterationController::class, "index"]);
Route::post("/sign-up", [RegisterationController::class, "store"]);

Route::get("/log-in", [LogInController::class, "index"]);
Route::post("/log-in", [LogInController::class, "check"]);

Route::post('/logout', [LogInController::class, 'logout'])->name('logout');


require __DIR__.'/auth.php';
