<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository\UserRepository;
use App\Http\Requests\UserFormRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\UserHasRegistered;

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
       
        $userData = $this->userRepository->create($data);
         event(new UserHasRegistered($userData));
      
        
    }
}
