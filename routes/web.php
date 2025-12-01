



<?php
use App\Http\Controllers\UserDataController;


Route::get('/', function(){ return redirect()->route('user.index'); });


Route::resource('user', UserDataController::class);
Route::get('/export-csv',[UserDataController::class,'exportCSV'])->name('user.export.csv');
?>
