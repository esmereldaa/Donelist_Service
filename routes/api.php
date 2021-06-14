<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatalistController;

use App\Models\DataListModel;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1'], function () {
    Route::get('getData', function(){
        $datas = User::all();
        return response($datas);
    });
    Route::post('createAccount',  function(Request $request) {
        $user = new User;
        $inputs = request()->all();
        $token = md5($inputs['uname'].date('Y-m-d H:i:s'));

        $user->uname = $inputs['uname'];
        $user->token = $token;
        $user->email = $inputs['email'];
        $user->password = $inputs['password'];

        $user->save();
        
        $statusCode = '201';
        $message = "Berhasil Daftar";

        $data = ['token' => $token, 'message' => $message, 'statusCode' => $statusCode];

        return response()->json($data);
    });
    Route::post('login', function(Request $request){
        $inputs = request()->all();
        $users = User::all();

        $statusCode = "500";
        $value = "";
        $token = "";
        foreach($users as $user){
            if($user->email == $inputs['email']){
                if($user->password == $inputs['password']){
                    $value = $user;
                    $token = $user->token;
                    $message = "Login";
                    $statusCode = "201";
                    break;
                }
                $message = "Password Salah";
                break;
            }
            $message = "500 User tidak ada";
        }

        $data = ['value' => $value, 'token' => $token, 'message' => $message, 'statusCode' => $statusCode];
        // $data = json_encode($responses);
        return response()->json($data);
    });
    Route::group(['prefix' => '{token}'], function () {
        Route::get('getData', function(Request $request, $token){
            $inputs = request()->all();
            $user = User::where('token', $token)->first();
            $responses = (object)array();
            
            $dataList = DataListModel::where('user_id', $user->user_id)->get()->toArray();
    
            if($dataList){
                $value = $dataList;
                $message = "Data Ada";
                $statusCode = "201";
            }else{
                $value = "";
                $message = "Data Kosong";
                $statusCode = "500";
            }
    
            return response()->json($value);
        });
        Route::get('getUser', function(Request $request, $token){
            $inputs = request()->all();
            $user = User::where('token', $token)->get();
    
            if($user){
                $value = $user;
                $message ="Berhasil";
                $statusCode ="201";
            }else{
                $value ="";
                $message ="Gagal";
                $statusCode ="500";
            }
    
            $data = ['value' => $value, 'message' => $message, 'statusCode' => $statusCode];
    
            return response()->json($data);
        });
        Route::post('setData', function(Request $request, $token){
            $inputs = request()->all();
            $user = User::where('token', $token)->first();
            
            $dataList = new DataListModel;
            $dataList->task_data = $inputs['donedata'];
            $dataList->user_id = $user->user_id;
            $dataList->date = date('Y-m-d H:i:s');
    
            $dataList->save();
    
            $data = [ 'message' => "Saved", 'statusCode' => "201"];
            
            return response($data);
        });
    });
});

// Route::group(['prefix' => 'v1'], function () {
//     Route::get('getData', function(){
//         $datas = User::all();
//         return response($datas);
//     });
//     Route::get('getData3', [DatalistController::class, 'alldatalist']);
//     Route::post('createAccount', 'DatalistController@createAccount');
//     Route::post('login', 'DatalistController@login');
//     Route::group(['prefix' => '{token}'], function () {
//         Route::get('getData', 'DatalistController@getData');
//         Route::get('getUser', 'DatalistController@getUser');
//         Route::post('setData', 'DatalistController@setData');
//     });
// });
