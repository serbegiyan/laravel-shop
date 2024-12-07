<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoutbookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RefryController;
use App\Http\Controllers\SmartphoneController;
use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'show'])->name('main');


Route::get('/dashboard',  function (Request $request) {
    $user_number = $request->session()->get('user_number');
    $purchase = Basket::where('user_number', '=', $user_number)->get();
    $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';
    return view('dashboard', compact('all_purchases'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/noutbooks', [NoutbookController::class, 'index'])->name('noutbooks.index');
Route::get('/noutbooks/create', [NoutbookController::class, 'create'])->name('noutbooks.create');
Route::post('/noutbooks/store', [NoutbookController::class, 'store'])->name('noutbooks.store');
Route::get('/noutbooks/{noutbook}', [NoutbookController::class, 'show'])->name('noutbooks.show');
Route::get('/noutbooks/{noutbook}/comments', [NoutbookController::class, 'indexComments'])->name('noutbooksComments.index');
Route::get('/noutbooks/{noutbook}/comments/create', [NoutbookController::class, 'createcomment'])->name('noutbooksComments.create')->middleware('auth');
Route::get('/noutbooks/comments/store', [NoutbookController::class, 'storecomment'])->name('noutbooksComments.store');

Route::get('/refries', [RefryController::class, 'index'])->name('refries.index');
Route::get('/refries/{refry}', [RefryController::class, 'show'])->name('refries.show');
Route::get('/refries/{refry}/comments', [RefryController::class, 'indexComments'])->name('refriesComments.index');
Route::get('/refries/{refry}/comments/create', [RefryController::class, 'createcomment'])->name('refriesComments.create')->middleware('auth');
Route::get('/refries/comments/store', [RefryController::class, 'storecomment'])->name('refriesComments.store');

Route::get('/smartphones', [SmartphoneController::class, 'index'])->name('smartphones.index');
Route::get('/smartphones/{smartphone}', [SmartphoneController::class, 'show'])->name('smartphones.show');
Route::get('/smartphones/{smartphone}/comments', [SmartphoneController::class, 'indexComments'])->name('smartphonesComments.index');
Route::get('/smartphones/{smartphone}/comments/create', [SmartphoneController::class, 'createcomment'])->name('smartphonesComments.create')->middleware('auth');
Route::get('/smartphones/comments/store', [SmartphoneController::class, 'storecomment'])->name('smartphonesComments.store');

Route::post('basket/store', [BasketController::class, 'store'])->name('basket.store');
Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
Route::get('/basket/delete', [BasketController::class, 'delete'])->name('basket.delete');
Route::get('/basket/edit', [BasketController::class, 'edit'])->name('basket.edit');

Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::get('/comments/{user}', [CommentController::class, 'show'])->name('userComments.show');

require __DIR__.'/auth.php';
