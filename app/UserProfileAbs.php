<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.05.2018
 * Time: 22:31
 */

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

abstract class UserProfileAbs extends Model
{

    public function main(){

        $mains = self::where('main','=', true)->get();

        foreach ($mains as $main){
            $main->main = null;
            $main->save();
        }

        $this->main = true;
        return $this->save();
    }

    public function edit($attr, $value){
        $this->$attr = $value;
        $this->user_id =  Auth::user()->id;
        return $this->save();
    }
}