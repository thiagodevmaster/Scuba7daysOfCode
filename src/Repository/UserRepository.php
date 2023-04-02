<?php

namespace Scuba\Repository;

class UserRepository
{
    private const JSON_USER_PATH = __DIR__ . "/../../data/users.json";

    public function addUser(array $userData): bool
    {

        $json = json_encode(
            $userData,
            JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE
        );

        $fileUsersData = file_get_contents(self::JSON_USER_PATH);
        $userArray = json_decode($fileUsersData);
        
        foreach($userArray as $user){
            if($user->email === $userData['email']){
                return false;
            }
        }

        $userArray[] = $userData;
        $userArray = json_encode(
            $userArray,
            JSON_PRETTY_PRINT
        );

        file_put_contents(self::JSON_USER_PATH, $userArray);
        return true; 
    }
}