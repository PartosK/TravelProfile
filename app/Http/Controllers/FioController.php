<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FioController extends Controller
{
    public function postEditFio(Request $request)
    {

        $validator = $this->validate($request, [
            'fio' => 'max:255'
        ]);
        $user = Auth::user();
        if($request->fio == ''){
            $fio = null;
        }
        else{
            $fio = $request->fio;
        }

        $user->fio = $fio;

         echo $result = $user->save();

    }
}
