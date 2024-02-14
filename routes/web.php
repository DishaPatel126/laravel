<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');

    //fetech all values (raw sql query, query builder, eloquent(user model))
    // $users = DB::select("select * from users");
    // $users = DB::table('users')->get();
    // $users = DB::table('users')->where('id', 1)->get();
    // $users = User::all();
    // $users = User::where('id', 1)->get();
    // $users = User::find(6);


    //insert a user (raw sql query, query builder, eloquent(user model))
    // $users = DB::insert("insert into users (name, email, password) values (?,?,?)", ['dim', 'dim@gmail.com', 'dim26112']);
    // $users = DB::table('users')->insert([
    //     'name' => 'raaghav',
    //     'email' => 'raaghav@gmail.com',
    //     'password' => 'raaghav1907'
    // ]);
    // $users = User::create([
    //     'name' => 'Manushi',
    //     'email' => 'manushi@gmail.com',
    //     'password' => 'manushi2512'
    // ]);

    //update a user (raw sql query, query builder, eloquent(user model))
    // $users = DB::update("update users set password = ? where id = ?", ['dimsha2611', '2']);
    // $users = DB::table('users')->where('id', 3)->update(['password' => 'raaghav197']);
    // $users = User::where('id', 8)->update(['name' => "Disha"]);

    //delete a user (raw sql query, query builder, eloquent(user model))
    // $users = DB::delete("delete from users where id = 2");
    // $users = DB::table('users')->where('id', 3)->delete();
    // $users = User::where('id', 5)->delete();

    // dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
