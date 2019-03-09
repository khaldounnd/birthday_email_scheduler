<?php
/**
 * Created by PhpStorm.
 * User: Khaldoun
 * Date: 2/28/2019
 * Time: 11:21 AM
 */

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    /**
     * @param $inputs
     */
    public function store($inputs)
    {
        $inputs['password'] = bcrypt($inputs['password']);

        $user = new User();
        $user->fill($inputs);
        $user->save();
    }

    /**
     * @param $inputs
     * @param $userId
     * @return User
     */
    public function update($inputs, $userId){

        $user = User::where('id', $userId)->first();

        $user->update($inputs);
        $user->save();

        return $user;
    }



}