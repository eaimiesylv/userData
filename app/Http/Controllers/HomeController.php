<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository\UserRepository;

class HomeController extends Controller
{
    
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
      
    }
    public function index()
    {

       
        return view('home', ['data'=>$this->userRepository->getAllUser()]);
         
       
    }
}
