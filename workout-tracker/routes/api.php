

<?php
// this for all URLs the user can call to interact with the backend 
// Without defining routes Laravel wouldn't know which code to run when receive an API request
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController; //All the routes inside here require a valid login token

Route::get('/ping', function () {
    return response()->json(['pong' => true]);
});

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () { 
    Route::get('/workouts', [WorkoutController::class, 'index']);  // get all workouts , + create it
    Route::post('/workouts', [WorkoutController::class, 'store']); // store all workouts 
    Route::get('/workouts/{id}', [WorkoutController::class, 'show']); // view all workouts 
    Route::put('/workouts/{id}', [WorkoutController::class, 'update']); // update workout 
    Route::delete('/workouts/{id}', [WorkoutController::class, 'destroy']); //delete workout 
    

    
});

