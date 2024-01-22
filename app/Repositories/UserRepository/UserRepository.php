<?php

namespace App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Services\FileUploadService\FileUpload;


class UserRepository implements UserRepositoryInterface{

    protected $fileUpload;

    public function __construct(FileUpload $fileUpload)
    {
       
        $this->fileUpload = $fileUpload;
      
    }
    public function getAllUser(){

        return User::latest()->paginate(10);

    }

    public function create($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'profile_image' => $this->fileUpload->uploadFile($data['profile_image'] ?? null),
            'password' => Hash::make($data['password'] ?? null),
        ]);
    }

}