<?php

namespace App\Http\Controllers;

use LDAP\Result;
use App\Models\Driver;
use App\Models\Schedule;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Output\ConsoleOutput;


class DriverController extends Controller
{
    private $locations;

    public function __construct(){
        $this->locations = ["1" => ["latitude" => "0", "longitude" => "0"]];
    }

    public function register(Request $request){
        $incomingFields = $request->validate([
            'school' => 'required',
            'username' => ['required', "min:6", Rule::unique('users', 'username')],
            'password' => ['required', 'min:8']
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = Driver::create($incomingFields);
        auth()->login($user);
        return redirect("/");
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => ['required', "min:6"],
            'password' => ['required', 'min:8']
        ]);


        if(auth()->guard("driver")->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended("/driver");
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function update_bus_location(Request $request){
        $schedule_id = Auth::guard("driver")->user()->id;
        $this->locations["1"] = $_POST;
        Schedule::where('id', $schedule_id)->update(["latitude"=>$_POST['latitude'], "longitude"=> $_POST["longitude"]]);
        return Response::json($this->locations);
    }

    // public function get_bus_location(Request $request){
    //     $locations = [];
    //     $schedule_id = UserDetails::where("id", Auth::user()->id)->first(["home_to_school", "school_to_home"]);
    //     $locations["home_to_school"] =  Schedule::where("id", $schedule_id["home_to_school"])->first(["latitude", "longitude"]);
    //     $locations["school_to_home"] =  Schedule::where("id", $schedule_id["school_to_home"])->first(["latitude", "longitude"]);
    //     return Response::json($locations);
    //     }

    public function get_bus_location(Request $request){
        // $locations = [];
        $type = $_POST["type"];
        $schedule_id = UserDetails::where("id", Auth::user()->id)->first($type)[$type];
        $locations =  Schedule::where("id", $schedule_id)->first(["latitude", "longitude"]);
        // $locations["school_to_home"] =  Schedule::where("id", $schedule_id["school_to_home"])->first(["latitude", "longitude"]);
        return Response::json($locations);
        }

    public function get_bus_details(Request $request){
        $bus_id = NULL;

        if($request["type"]=="home_to_school"){
            $bus_id = UserDetails::select("home_to_school")->where("id", Auth::id())->first();
        } else {
            $bus_id = UserDetails::select("school_to_home")->where("id", Auth::id())->first();
        }

        $data = Schedule::where("id", $bus_id)->first();
        return Response::json($data);
    }
}
