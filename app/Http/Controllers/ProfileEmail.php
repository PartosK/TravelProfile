<?php

namespace App\Http\Controllers;

use App\UserProfileEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileEmail extends Controller
{
    public function getEditEmail()
    {
        $user = Auth::user();

        if(isset($_GET['id'])){
            $email = \App\UserProfileEmail::where('id','=', $_GET['id'])
                ->where('user_id','=', $user->id)->get()[0];
        }
        else{
            $email = null;
        }

        return view('editEmail',
            [
                'user' => $user,
                'email' => $email
            ]);
    }

    public function postEditEmail(Request $request){

        $validator = $this->validate($request, [
            'email' => 'required|email|unique:userProfileEmail|max:255'
        ]);

        if( isset($request->id)){
            $email =  UserProfileEmail::find($request->id);
        }
        else{
            $email = new UserProfileEmail();
        }

        $result = $email->edit('email',$request->email);

        if($result){
            return redirect()->route('home');
        }
    }



    public function postMainEmail(Request $request){
        $mail = \App\UserProfileEmail::find($request->id);
        echo $mail->main();

    }

    public function postDelEmail(Request $request){

        \App\UserProfileEmail::destroy($request->delEmail);

        return redirect()->back();
    }
}
