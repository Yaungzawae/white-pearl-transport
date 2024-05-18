<?php

use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Models\Schedule;

Route::get('/', function () {
    return view('home', ["data" => UserDetails::find(Auth::id())]); 
})->middleware('auth');

Route::get("/login", function (){
    return view("auth/login");
})->name("login");

Route::post("/login", [UserController::class, "login"]);

Route::get("/detail", function(){
    return view('detail', ["data" => UserDetails::find(Auth::id())]);
})->middleware('auth');

Route::get("/school_to_home_details", function(){
    $selectFields = ["bus_no", "bus_plate", "color", "phone_number", "driver_name","license_no", "monitor", "insurance", "policy_no"];
    $bus_id = UserDetails::select("school_to_home")->where("id", Auth::id())->first()["school_to_home"];
    $data = Schedule::select($selectFields)->where("id", $bus_id)->first();
    return view('detail', ["data" => UserDetails::find(Auth::id()), "type" => "school_to_home", "details"=>$data]);
})->middleware('auth');

Route::get("/home_to_school_details", function(){
    $selectFields = ["bus_no", "bus_plate", "color", "phone_number", "driver_name","license_no", "monitor", "insurance", "policy_no"];
    $bus_id = UserDetails::select("home_to_school")->where("id", Auth::id())->first()["home_to_school"];
    $data = Schedule::select($selectFields)->where("id", $bus_id)->first();
    return view('detail', ["data" => UserDetails::find(Auth::id()), "type" => "home_to_school", "details"=>$data]);
})->middleware('auth');

Route::get("/request", function(){
    $home_to_school = Schedule::select("home_to_school", "id")->get();
    $school_to_home = Schedule::select('school_to_home', "id")->get();
    return view('request', ["data" => UserDetails::find(Auth::id()), "home_to_school" => $home_to_school, "school_to_home" => $school_to_home]);
})->middleware('auth');

Route::get("/map", function(){
    return view("map");
});

Route::get("/home_to_school_map", function(){
    return view("map", ["type"=>"home_to_school"]);
});

Route::get("/school_to_home_map", function(){
    return view("map", ["type"=>"school_to_home"]);
});

Route::post("/request", [UserController::class, 'request'])->name("request");

Route::get('/history', function () {
    return view('history', ["data" => UserDetails::find(Auth::id())]);
})->middleware('auth');

Route::post("/history", [UserController::class, 'get_history']);

Route::get("/table", function(){
    return view("table");
});

Route::post("/table", [AdminController::class, 'uploadCsv'])->name("table");

Route::post("/schedule", [AdminController::class, 'uploadSchedule'])->name("schedule");

Route::get("/driver", function(){
    return view("driver/location");
})->middleware("auth:driver");

Route::get("/driver/check-in", function(){
    return view("driver/checkin");
})->middleware("auth:driver");

Route::get("/driver/check-out", function(){
    return view("driver/checkout");
})->middleware("auth:driver");

Route::get("/driver/login", function(){
    return view("auth/driver_login");
});

Route::post("/driver/login", [DriverController::class, "login"])->name("driver.login");

Route::get("/a", function(){
    return view("db");
});

Route::post("/cancel-bus", [UserController::class, "cancel_request"]);

Route::post("/update-bus-location", [DriverController::class, "update_bus_location"]);

Route::post("/get-bus-location", [DriverController::class, "get_bus_location"]);
