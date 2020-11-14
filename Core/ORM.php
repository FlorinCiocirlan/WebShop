<?php
    namespace App\Core\ORM;

    use App\Core\DbConnection\DbConnection;

    require_once 'DbConnection.php';

    class ORM
    {
        protected string $modelClass = '';
        protected string $table = '';
        protected $conn = null;

        function __construct()
        {
            $this->conn = DbConnection::getInstance()->getConnection();
        }

        public function updateById($id, array $updateValues)
        {
            $this->update('id', $id, $updateValues);
        }

        public function update($byColumn, $byValue, array $updateValues)
        {
            if ($this->table === '') {
                throw new Exception('Unknown table');
            }
            $cols = array();
            foreach ($updateValues as $key => $value) {
                $cols[] = "$key = '$value'";
            }
            $query = "UPDATE $this->table SET ".implode(', ', $cols). " WHERE $byColumn = :value";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([":value" => $byValue]);

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

            $query = "SELECT * FROM $this->table WHERE $column = :value";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([':value' => $value]);
//            $result = $stmt->fetch(PDO::FETCH_ASSOC);
//            $model = new $this->modelClass();
            //            Implement model setters;


            return $stmt->fetchObject($this->modelClass);
        }

//        private function getConnection(): PDO
//        {
//           //  implement singleton to get connection
//            //  implement configurations to get username , password , host , port, dbname;
//            $credentials = $this->getCredentials();
//            $db_username = $credentials['username'];
//            $db_password = $credentials['password'];
//            $db_name = 'eturia';
//            $db_server = "localhost:".$credentials['port'];
//
//            return new PDO("mysql:host=$db_server;dbname=$db_name", $db_username, $db_password);
//        }
//
//        private function getCredentials(): array
//        {
//            return ["username" => "florin", "password" => "123456", "port" => "3306"];
//        }
    }