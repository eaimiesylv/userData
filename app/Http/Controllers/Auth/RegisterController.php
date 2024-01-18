<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository\UserRepository;
use App\Http\Requests\UserFormRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
   

    use RegistersUsers;
    protected $redirectTo = '/home';
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('guest');
        $this->userRepository = $userRepository;
      
    }

    protected function validator(array $data)
    {
        return UserFormRequest::validate($data);
     
    }

    protected function create(array $data)
    {
      
        return $this->userRepository->create($data);
        
    }
}
