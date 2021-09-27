<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/tester', function(){
  $order = \App\Models\Order::latest()->first();
  // return view('exports.confirmation', compact('order'));
  $pdf = PDF::loadView('exports.confirmation', compact('order'));
  return $pdf->download('confirmation_letter.pdf');
});

Route::group(['middleware' => 'checkStatus'], function(){
  Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
  
  Route::post('/', [App\Http\Controllers\AuthController::class, 'login'])->name('postlogin');
});

Route::group(['middleware' => 'auth'], function(){

  Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])
        ->name('logout');
  Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])
        ->name('profile');
  Route::post('/profile', [App\Http\Controllers\AuthController::class, 'postprofile'])
        ->name('post.profile');  
  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
        ->name('dashboard');
  

  Route::group(['prefix' => '/hotel', 'as' => 'hotel.'], function(){
    Route::get('/facilities', [App\Http\Controllers\HotelFacilitiesController::class, 'index'])
          ->name('facilities');
    Route::get('/room-facilities', [App\Http\Controllers\RoomFacilitiesController::class, 'index'])
          ->name('room.facilities');    

  });

  Route::group(['prefix' => '/room', 'as' => 'room.'], function(){
    Route::get('/configuration', [App\Http\Controllers\RoomConfigurationController::class, 'index'])->name('configuration');    
    Route::get('/statistics', [App\Http\Controllers\RoomStatisticsController::class, 'index'])
          ->name('statistics');
    Route::get('/status', [App\Http\Controllers\RoomStatusController::class, 'index'])
          ->name('status');
    Route::post('/status', [App\Http\Controllers\RoomStatusController::class, 'update'])
          ->name('status.ganti');
    // Route::get('guests', [App\Http\Controllers\RoomGuestsController::class, 'index'])
    //       ->name('guests');
  });

  Route::group(['prefix' => '/reservation', 'as' => 'reservation.'], function(){
    Route::get('/rates', [App\Http\Controllers\RoomRatesController::class, 'index'])
          ->name('rates');
    Route::get('/info', [App\Http\Controllers\RoomInfoController::class, 'index'])
          ->name('info');
    Route::get('/create', [App\Http\Controllers\ReservationController::class, 'create'])
          ->name('create');
    Route::post('/create', [App\Http\Controllers\ReservationController::class, 'store'])
          ->name('store');
    Route::put('/{order}', [App\Http\Controllers\ReservationController::class, 'update'])
          ->name('reservation.update');
    Route::get('/records', [App\Http\Controllers\ReservationController::class, 'index'])
          ->name('records');
    Route::post('/records', [App\Http\Controllers\ReservationController::class, 'cancel'])
          ->name('records.update');
    Route::get('/download/{order}', [App\Http\Controllers\ReservationController::class, 'downloadconfirmation'])
          ->name('download.confirmation');
  });

  Route::group(['prefix' => '/reception', 'as' => 'reception.'], function(){
    Route::get('/guests', [App\Http\Controllers\RoomGuestsController::class, 'index'])
         ->name('guests');
    Route::get('/arrivals', [App\Http\Controllers\GuestArrivalsController::class, 'index'])
         ->name('arrivals');
    Route::get('/departure', [App\Http\Controllers\GuestDeparturesController::class, 'index'])
         ->name('departure');
    Route::post('/departure', [App\Http\Controllers\GuestDeparturesController::class, 'update'])
         ->name('departure.update');
    Route::get('/registration', [App\Http\Controllers\RegistrationController::class, 'create'])
         ->name('registration');
    Route::post('/registration', [App\Http\Controllers\RegistrationController::class, 'store'])
         ->name('store');
    Route::put('/registration/{order}', [App\Http\Controllers\RegistrationController::class, 'update'])
         ->name('registration.update');
    Route::get('/registration/{order}', [App\Http\Controllers\RegistrationController::class, 'downloadregistration'])
         ->name('registration.download');
    Route::post('/receipt', [App\Http\Controllers\RegistrationController::class, 'downloadreceipt'])
         ->name('receipt.download');
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])
         ->name('checkout');
    Route::get('/checkout/{order}', [App\Http\Controllers\CheckoutController::class, 'expenses'])
         ->name('checkout.expenses');
    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])
         ->name('checkout.checkout');
    Route::get('/checkout/invoice/{order}', [App\Http\Controllers\CheckoutController::class, 'billing'])
         ->name('checkout.invoice');
    Route::get('/revenue', [App\Http\Controllers\RoomRevenueController::class, 'index'])
         ->name('revenue');
  });

  Route::group(['middleware' => 'checkRole:guru,admin'], function(){
    Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])
        ->name('setting');
    Route::post('/setting', [App\Http\Controllers\SettingController::class, 'update'])
        ->name('post.setting');

    Route::group(['prefix' => '/users', 'as' => 'users.'], function(){
      Route::get('/', [App\Http\Controllers\UserController::class, 'index'])
            ->name('index');
      Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])
            ->name('create');
      Route::post('/', [App\Http\Controllers\UserController::class, 'store'])
           ->name('store');
      Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])
            ->name('edit');
      Route::put('/{user}', [App\Http\Controllers\UserController::class, 'update'])
            ->name('update');
      Route::delete('/{user}', [App\Http\Controllers\UserController::class, 'destroy'])
            ->name('destroy');
      Route::get('/reset/{user}', [App\Http\Controllers\UserController::class, 'reset'])
            ->name('reset');
      Route::get('/export', [App\Http\Controllers\UserController::class, 'export'])
            ->name('export');
      Route::post('/import', [App\Http\Controllers\UserController::class, 'import'])
            ->name('import');
    });
    

    Route::get('report', [App\Http\Controllers\TeacherController::class, 'index'])
         ->name('report');
    Route::get('detail', [App\Http\Controllers\TeacherController::class, 'detail'])
         ->name('get.detail');
  });

});
