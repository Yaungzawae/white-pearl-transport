<?php

namespace App\Http\Controllers;

use App\Mail\hello;
use App\Mail\HistoryMail;
use App\Models\history;
use App\Models\Schedule;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'school' => 'required',
            'username' => ['required', "min:6", Rule::unique('users', 'username')],
            'password' => ['required', 'min:8']
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect("/");
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => ['required', "min:6"],
            'password' => ['required', 'min:8']
        ]);

        if(auth()->attempt(['username'=>$credentials["username"], 'password'=>$credentials["password"]])){
            $request->session()->regenerate();
            return redirect()->intended("/");
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function request(Request $request){

        $request_fields = [
            "user_id" => Auth::id(),
            "date" => date("Y/m/d"),
            "type" => "request"
        ];
        $update_fields = [];
        if($request["home_to_school"] != ""){
            $request_fields["home_to_school_time"] = Schedule::select("home_to_school")->where("id", $request["home_to_school"])->first()["home_to_school"];
            $update_fields["home_to_school"] = $request["home_to_school"];
        }
        if($request["school_to_home"] != ""){
            $request_fields["school_to_home_time"] = Schedule::select("school_to_home")->where("id", $request["school_to_home"])->first()["school_to_home"];
            $update_fields["school_to_home"] = $request["school_to_home"];
        }
        UserDetails::where('id', Auth::id())->update($update_fields);
        history::create($request_fields);
        return redirect()->back()->with('success', 'Requested successfully.');
    }

    public function cancel_request(Request $request){
        UserDetails::where('id', Auth::id())->update(["home_to_school" => "", "school_to_home" => ""]);
        return redirect()->back()->with('success', 'Requested successfully.');
    }

    public function get_history(Request $request){
        $start = "2024-1-1";
        $end = "2025-1-1";
        $data = history::select(["date", "home_to_school_time", "school_to_home_time", "request_at"])->where("user_id", Auth::id())->whereBetween("date", [$start, $end])->get();


        Mail::to("yezaw07aung@gmail.com")
        ->send(new HistoryMail($data, $start, $end));
        return view("email/historyEmail", ["data"=>$data, "start"=>$start, "end"=>$end]);
    }
}
