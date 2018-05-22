<?php

namespace App\Http\Controllers;

use App\UserProfilePhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfilePhone extends Controller
{
    public function getEditPhone()
    {
        $user = Auth::user();

        if(isset($_GET['id'])){
            $phone = \App\UserProfilePhone::where('id','=', $_GET['id'])
                ->where('user_id','=', $user->id)->get()[0];
        }
        else{
            $phone = null;
        }

        return view('editPhone',
            [
                'user' => $user,
                'phone' => $phone
            ]);
    }

    public function postEditPhone(Request $request){

        $validator = $this->validate($request, [
            'phone' => 'required|unique:userProfilePhone|size:11'
        ]);

        if( isset($request->id)){
            $phone =  UserProfilePhone::find($request->id);
        }
        else{
            $phone = new UserProfilePhone();
        }

        $result = $phone->edit('phone',$request->phone);

        if($result){
            return redirect()->route('home');
        }
    }



    public function postMainPhone(Request $request){
        $phone = \App\UserProfilePhone::find($request->id);
        echo $phone->main();

    }

    public function postDelPhone(Request $request){

        \App\UserProfilePhone::destroy($request->delPhone);

        return redirect()->back();
    }
}
