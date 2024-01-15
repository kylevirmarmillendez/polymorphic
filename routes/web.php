<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Photo;
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
});

Route::get('/create', function(){
    $staff =  Staff::find(1);
    $staff->photos()->create(['path'=>'example.jpg']);
}); 

Route::get('/read', function(){

    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo){
        return $photo->path;
    }
});

Route::get('/update', function(){
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos->where('id',1)->first();
    
    $photo->path = 'Update example.jpg';
    $photo->save();
});

Route::get('/delete', function(){
    $staff =Staff::findOrFail(1);
    $staff->photos()->where('id',1)->delete();

});
