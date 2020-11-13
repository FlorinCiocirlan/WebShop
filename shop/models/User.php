<?php


    class User
    {
        private int $id;
        private string $email;
        private string $name;
        private string $password;
        private string $address;
        private string $phone;
        private bool $is_admin;
        private bool $deleted;
        private string $reset_link;
        private string $updated;
        private string $created;

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getEmail(): string
        {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @param string $name
         */
        public function setName(string $name): void
        {
            $this->name = $name;
        }

        /**
         * @return string
         */
        public function getPassword(): string
        {
            return $this->password;
        }

        /**
         * @param string $password
         */
        public function setPassword(string $password): void
        {
            $this->password = $password;
        }

        /**
         * @return string
         */
        public function getAddress(): string
        {
            return $this->address;
        }

        /**
         * @param string $address
         */
        public function setAddress(string $address): void
        {
            $this->address = $address;
        }

        /**
         * @return string
         */
        public function getPhone(): string
        {
            return $this->phone;
        }

        /**
         * @param string $phone
         */
        public function setPhone(string $phone): void
        {
            $this->phone = $phone;
        }

        /**
         * @return bool
         */
        public function is_admin(): bool
        {
            return $this->is_admin;
        }

        /**
         * @param bool $is_admin
         */
        public function setIsAdmin(bool $is_admin): void
        {
            $this->is_admin = $is_admin;
        }

        /**
         * @return bool
         */
        public function isDeleted(): bool
        {
            return $this->deleted;
        }

        /**
         * @param bool $deleted
         */
        public function setDeleted(bool $deleted): void
        {
            $this->deleted = $deleted;
        }

        /**
         * @return string
         */
        public function getResetLink(): string
        {
            return $this->reset_link;
        }

        /**
         * @param string $reset_link
         */
        public function setResetLink(string $reset_link): void
        {
            $this->reset_link = $reset_link;
        }

        /**
         * @return string
         */
        public function getUpdated(): string
        {
            return $this->updated;
        }

        /**
         * @param string $updated
         */
        public function setUpdated(string $updated): void
        {
            $this->updated = $updated;
        }

        /**
         * @return string
         */
        public function getCreated(): string
        {
            return $this->created;
        }

        /**
         * @param string $created
         */
        public function setCreated(string $created): void
        {
            $this->created = $created;
        }


    }