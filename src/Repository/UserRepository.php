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

        $userArray = $this->hydrateUser();
        
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

    public function updateStatusConfirmEmail(string $email)
    {
        $userArray = $this->hydrateUser();
        
        foreach($userArray as $user){
            if($user->email === $email){
                $user->mail_validation = true;
                break;
            }
        }

        $userArray = json_encode(
            $userArray,
            JSON_PRETTY_PRINT
        );

        file_put_contents(self::JSON_USER_PATH, $userArray);
    }

    private function hydrateUser(): array
    {
        $fileUsersData = file_get_contents(self::JSON_USER_PATH);
        return json_decode($fileUsersData);
    }


    public function findByEmail(string $email): array
    {
        $userArray = $this->hydrateUser();
        $userProfile = [];
        foreach($userArray as $user){
            if($user->email === $email){
                $userProfile[] = [
                    "name" => $user->name,
                    "email" => $user->email
                ];
                break;
            }
            
        }

        return $userProfile;
    }

    public function deleteByEmail(string $email)
    {
        $userArray = $this->hydrateUser();
        $userProfile = [];
        
        foreach($userArray as $user){
            if($user->email !== $email){
                $userProfile[] = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'mail_validation' => $user->mail_validation
                ];
            }
        }

        $json = json_encode(
            $userProfile,
            JSON_PRETTY_PRINT
        );

        file_put_contents(self::JSON_USER_PATH, $json);
    }
}