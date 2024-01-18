<?php

namespace App\Repositories\UserRepository;


interface UserRepositoryInterface{


    public function getAllUser();

    public function create($data);
}