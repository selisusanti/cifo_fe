<?php


namespace App\Services;


class UserService extends BaseService
{
    public function getUserList($page) {
        return $this->get('users?page='.$page);
    }

}