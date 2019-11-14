<?php

namespace App\Repositories\User;

use App\User;

class UserRepository
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
		return $this->user->find($id);
	}

   public function findBy($column, $data)
	{
		return $this->user->where($column, $data)->get();
	}
}