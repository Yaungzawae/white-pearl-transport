<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;


class UserDetailsController extends Controller
{
    public function import(Request $request)
{
    $file = $request->file('file');
    $fileContents = file($file->getPathname());

    foreach ($fileContents as $line) {
        $data = str_getcsv($line);
        $password = generateRandomPassword(10);

        UserDetails::truncate();

        User::create([
            'username' => $data[0],
            'password' => bcrypt($password),
            'email' => $data[18]
        ]);

        UserDetails::create([
            'id' => $data[0],
            'password' => $password,
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
            'school_to_home' => $data[23],
            'home_to_school' => $data[24],
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
