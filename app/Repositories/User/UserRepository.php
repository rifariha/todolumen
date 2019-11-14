<?php

namespace App\Repositories\User;

use App\Repositories\User\UserInterface as UserInterface;
//PANGGIL MODEL USER
use App\User;

class UserRepository implements UserInterface
{
	protected $user;

	public function __construct(User $user)
	{
        $this->user = $user;
    }
    
    public function getAll()
    {
        return $this->user->all();
    }

    public function find($id)
    {
        return $this->user->findUser($id);
    }


    public function delete($id)
    {
        return $this->user->deleteUser($id);
    }

}