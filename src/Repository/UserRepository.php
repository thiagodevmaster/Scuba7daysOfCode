<?php

namespace Scuba\Repository;

class UserRepository
{
    private const JSON_USER_PATH = __DIR__ . "/../../data/users.json";

    public function addUser(array $userData): void
    {
        $json = json_encode(
            $userData,
            JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE
        );

        $fileOpen = fopen(self::JSON_USER_PATH, 'r+');
        
        //Enquanto não chegar ao fim do arquivo
        while(!feof($fileOpen)){
            //Ler a linha atual do loop e atribui a variavel $linha
            $linha = fgets($fileOpen);
            // se linha existir e for igual ao ultimo conjunto json 
            if(trim($linha) === "}"){
                fwrite($fileOpen ,",".$json."]");    
            }
        }

        fclose($fileOpen);
        
    }
}