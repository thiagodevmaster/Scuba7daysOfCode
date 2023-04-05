<?php

namespace Scuba\helper;

class CryptoToken
{
    private string $key;

    public function __construct()
    {
        $this->key = openssl_random_pseudo_bytes(20);
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function encrypter(string $message): string
    {
        $key = $this->getKey();
        $message_raw = openssl_encrypt($message, 'aes-128-cbc', $key, 0, '');
        
        return base64_encode($message_raw);
    }

    public function decrypter(string $message_raw, $key): string
    {
        $msg_decrypter = base64_decode($message_raw);
        $original_msg = openssl_decrypt($msg_decrypter, 'aes-128-cbc', $key, 0, '');
        
        return $original_msg;
    }

}