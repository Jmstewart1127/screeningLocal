<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;

//Route::group(['middleware' => ['web']], function () {
//    /**
//     * Show Task Dashboard
//     */
//    Route::get('/', function () {
//        return view('tasks', [
//            'tasks' => Task::orderBy('created_at', 'asc')->get()
//        ]);
//    });
//
//    /**
//     * Add New Task
//     */
//    Route::post('/task', function (Request $request) {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|max:255',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('/')
//                ->withInput()
//                ->withErrors($validator);
//        }
//
//        $task = new Task;
//        $task->name = $request->name;
//        $task->save();
//
//        return redirect('/');
//    });
//
//    /**
//     * Delete Task
//     */
//    Route::delete('/task/{id}', function ($id) {
//        Task::findOrFail($id)->delete();
//
//        return redirect('/');
//    });
//
//});


    Route::resource('positions', 'PositionsController');

    Route::resource('business', 'BusinessController');

    Route::resource('user', 'AuthController');

    Route::get('business/show/{id}', 'BusinessController@showPositions');

//    Route::post('positions/vote/{id}', 'PositionsController@thumbUp');

    Route::get('positions/create/{id}', 'PositionsController@newPosition');

    Route::post('positions/create/{id}', 'PositionsController@saveNewPosition');




Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('/home', 'HomeController@index');

    Route::resource('positions', 'PositionsController');

    Route::resource('business', 'BusinessController');

    Route::resource('user', 'AuthController');

    Route::post('rating/vote/{id}', 'RatingsController@thumbUp');

    Route::get('business/show/{id}', 'BusinessController@showPositions');

    Route::post('positions/vote/{id}', 'PositionsController@thumbUp');

    Route::get('positions/create/{id}', 'PositionsController@newPosition');

    Route::post('positions/create/{id}', 'PositionsController@saveNewPosition');

});
