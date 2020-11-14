<?php

    namespace App\Services\UserService;

    require_once '../Core/ORM.php';
    require_once 'models/User.php';

    use App\Core\ORM\ORM;

    class UserService extends ORM
    {
        protected string $table = 'users';
        protected string $modelClass = 'User';

        public function updateByEmail($email, array $updateValues)
        {
            $this->update('email', $email, $updateValues);
        }

        public function fetchByEmail($email)
        {
            return $this->fetch('email', $email);
        }

        public function checkResetTime(string $time)
        {
            if ((time() - (int)$time) > 3600) {
                return false;
            }

            return true;
        }

        public function checkResetLink(string $resetLink)
        {
            if ("http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" !== $resetLink) {
                return false;
            }

            return true;
        }
    }