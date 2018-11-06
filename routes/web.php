<?php
use Illuminate\Http\Request;

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

Route::get('/', function () {
    $tasks = DB::table('tasks')->get();
    return view('welcome',compact('tasks'));
});

Route::post('tasks',function(Request $request){
DB::table('tasks')->insert([
'name'=>$request->name,
'created_at'=>now(),
'updated_at'=>now()
]);
return redirect('/');
});

Route::delete('tasks/{id}',function($id){
    DB::table('tasks')->where('id','=',$id)->delete();
    return redirect ('/');
});