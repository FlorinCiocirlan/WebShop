<?php


    namespace App\Services\TokenService;

    require_once '../Core/Encryption.php';

    use App\Core\Encryption\Encryption;


    class TokenService extends Encryption
    {
        public function tokenEncrypt(string $string): string
        {
            return $this->encrypt($string);
        }

        public function tokenDecrypt(string $encrypted): array
        {
            $decryptedToken = explode('__', $this->decrypt($encrypted));

            return ["email" => $decryptedToken[0], "timestamp" => $decryptedToken[1]];
        }
    }