<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Schedule;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    public function uploadCsv(Request $request){
        $file = $request->file('file');
        $fileContents = file($file->getPathname());
        set_time_limit(0);
        User::truncate();
        UserDetails::truncate();
        
        foreach ($fileContents as $line) {
            $data = str_getcsv($line);
            $password = generateRandomPassword(10);

            User::create([
                'username' => $data[18],
                'password' => bcrypt($password),
                ]);

            UserDetails::create([
                'password' => $password,
                'identification_code' => $data[0],
                'first_name' => $data[1],
                'last_name' => $data[2],
                'age' => $data[3],
                'sex' => $data[4],
                'class' => $data[5],
                'g1_first_name' => $data[6],
                'g2_first_name' => $data[7],
                'g3_first_name' => $data[8],
                'g1_last_name' => $data[9],
                'g2_last_name' => $data[10],
                'g3_last_name' => $data[11],
                'g1_city' => $data[12],
                'g2_city' => $data[13],
                'g1_address' => $data[14],
                'g2_address' => $data[15],
                'g1_zip' => $data[16],
                'g2_zip' => $data[17],
                'g1_email' => $data[18],
                'g2_email' => $data[19],
                'g1_home_phone' => $data[20],
                'g2_home_phone' => $data[21],
                'g3_home_phone' => $data[22],
                'g1_mobile_phone' => $data[23],
                'g2_mobile_phone' => $data[24],
                'g3_mobile_phone' => $data[25],
                'school_to_home' => $data[26],
                'home_to_school' => $data[27],
                        ]);
}
    
        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }

    public function uploadSchedule(Request $request){
        // here
        $file = $request->file('file');
        $fileContents = file($file->getPathname());
        array_shift($fileContents);
        set_time_limit(0);
        Schedule::truncate();
        Driver::truncate();

        foreach ($fileContents as $line) {
            $data = str_getcsv($line);
            $password = generateRandomPassword(8);
            // return $data[1];
            Schedule::create([
            'bus_no'=> $data[0],
            'driver_name'=> $data[1],
            'password' => $password,
            'license_no'=> $data[2],
            'insurance'=> $data[3],
            'monitor'=> $data[4],
            'policy_no'=> $data[5],
            'bus_plate'=> $data[6],
            'color'=> $data[7],
            'phone_number'=> $data[8],
            'home_to_school'=> $data[9],
            'school_to_home'=> $data[10]
            ]);

            Driver::create([
                'username' => $data[1],
                'password' => $password
            ]);
        }
        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }
}


function generateRandomPassword($length = 10) {
    // List of characters to include in the password
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    
    // Shuffle the characters
    $shuffledChars = str_shuffle($chars);
    
    // Get the first $length characters
    $randomPassword = substr($shuffledChars, 0, $length);
    
    return $randomPassword;
}
