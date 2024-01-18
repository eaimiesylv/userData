<?php


namespace App\Http\Requests;
use Illuminate\Support\Facades\Validator;



class UserFormRequest
{

    public static function validate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'profile_image' =>'',
        ]);
    }
    
}
