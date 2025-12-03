<?php
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\DistanceController;

Route::get('/', function(){ return redirect()->route('user.index'); });


Route::resource('user', UserDataController::class);
Route::get('/export-csv',[UserDataController::class,'exportCSV'])->name('user.export.csv');


Route::get('audio', [AudioController::class, 'index'])->name('audio.index');
Route::post('/audio-length', [AudioController::class, 'getAudioLength'])->name('audio.length');

Route::get('distance', [AudioController::class, 'distance_index'])->name('distance.index');
Route::post('distance/calculate', [AudioController::class, 'calculate'])->name('distance.calculate');



?>
