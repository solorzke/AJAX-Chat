<?php 
class Database {
    private static $dsn = "mysql:host=sql.njit.edu;dbname=kas58";
    private static $username = 'kas58';
    private static $password = 'rE0D5LVEC';
    private function __construct() {}
    public static function getDB () {
        try{
            $db = new PDO(self::$dsn, self::$username, self::$password);
            return $db;
        }catch(PDOException $e){ echo $e->getMessage(); }
    }
}
?>