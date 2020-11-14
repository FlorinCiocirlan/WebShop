<?php
    namespace App\Core\DbConnection;
    use PDO;

    require_once(__DIR__.'../../config.php');

    class DbConnection
    {
        private static ?DbConnection $instance = null;
        private PDO $conn;

        private function __construct()
        {
            $this->conn = new PDO(
                "{$_ENV['APP_DB_DSN']}:host={$_ENV['APP_DB_HOST']}:{$_ENV['APP_DB_PORT']};dbname={$_ENV['APP_DB_NAME']}",
                $_ENV['APP_DB_USERNAME'],$_ENV['APP_DB_PASSWORD']
            );
        }

        public static function getInstance()
        {
            if (!self::$instance) {
                self::$instance = new DbConnection();
            }

            return self::$instance;
        }

        public function getConnection()
        {
            return $this->conn;
        }
    }