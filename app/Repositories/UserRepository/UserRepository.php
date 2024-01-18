<?php

namespace App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Repositories\UserRepository\UserRepositoryInterface;


class UserRepository implements UserRepositoryInterface{


    public function getAllUser(){

        return User::latest()->paginate(10);

    }

    public function create($data){
        
        if (isset($data['profile_image'])) {
            // $path = $data['profile_image']->store('profile_images', 'public');
            // dd($path);
            //$user->update(['profile_image' => $path]);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'profile_image' => $data['profile_image'],
            'password' => Hash::make($data['password']),
        ]);
    }
}