<?php


    class ORM
    {
        protected string $modelClass = '';
        protected string $table = '';

        public function updateById($id, array $updateValues)
        {

            $this->update('id', $id, $updateValues);
        }

        public function update($byColumn, $byValue, array $updateValues)
        {
            // implement update method
        }

        public function fetchById(int $id)
        {
            return $this->fetch('id', $id);
        }

        public function fetch(string $column, $value)
        {
            if ($this->table === '') {
                throw new Exception('Unknown table');
            }

            if ($this->modelClass === '') {
                throw new Exception('Unknown model');
            }
            $conn = $this->getConnection();
            $query = "SELECT * FROM :table WHERE :column = :value";
            $stmt = $conn->prepare($query);
            $stmt->execute([':table' => $table, ':column' => $column, ':value' => $value]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $model = new $this->modelClass();


//            Implement model setters;


            return $model;
        }

        private function getConnection(): PDO
        {
           // TODO : implement singleton to get connection
            // TODO : implement configurations to get username , password , host , port, dbname;
            $credentials = $this->getCredentials();
            $db_username = $credentials['username'];
            $db_password = $credentials['password'];
            $db_name = 'eturia';
            $db_server = "localhost:".$credentials['port'];

            return new PDO("mysql:host=$db_server;dbname=$db_name", $db_username, $db_password);
        }

        private function getCredentials(): array
        {
            return ["username" => "florin", "password" => "123456", "port" => "3306"];
        }
    }