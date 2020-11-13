<?php

    require_once 'Core/ORM.php';
    require_once '../models/User.php';

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
    }