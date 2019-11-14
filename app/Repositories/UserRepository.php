<?php

namespace App\Repositories;

use App\Repositories\Repository;

/**
 * User Repository
 *
 * @author Ridho Fariha <ridhofariha21@gmail.com> 
 */
class UserRepository extends Repository
{   
    public function model() {
        return 'App\User';
    }   
}