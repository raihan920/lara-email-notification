<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\BirthdayWish;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('all-users', compact('users'));
    }
    //sending individually
    public function sendIndividualEmailNotification(Request $request){
        $user = User::where('email', "$request->email")->first();
        $message['message_heading'] = "Happy Birthday {$user->name}";
        $message['message_body'] = "A warm wish from ".env('APP_NAME');
        $user->notify(new BirthdayWish($message));
        return redirect()->route('all-users')->withSuccess("Birthday wish was send to {$user->name} successfully!");

    }

    //sending all who has birthday today
    public function sendAllEmailNotification(){
        //those who has birthday today
        $users = User::where('birth_date', today())->get();
        //if users have birthday today
        if($users->isNotEmpty()){
            foreach($users as $user){
                $message['message_heading'] = "Happy Birthday {$user->name}";
                $message['message_body'] = "A warm wish from ".env('APP_NAME');
                $user->notify(new BirthdayWish($message));
            }
            return redirect()->route('all-users')->withSuccess("Birthday wish was sent successfully to all having birthday today!!!");
        }
        return redirect()->route('all-users')->with("no_birthday","No one has birthday today!!!");
    }

}
