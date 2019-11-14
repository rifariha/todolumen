<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository as Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */

    public function __construct(
        Users $user
    )
    { 
        $this->user = $user;
    }

    /**
     * Get All users.
     *
     * @return Response
     */

    public function userRepo()
    {
        return response()->json($this->user->all(), 200);
    }

    /**
     * Store User.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->user->create($data);
        return "behasil";
    }
}