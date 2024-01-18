<?php

namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserRepository{

    public function create($data){
        
        if (isset($data['profile_image'])) {
            $path = $data['profile_image']->store('profile_images', 'public');
            dd($path);
            //$user->update(['profile_image' => $path]);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}