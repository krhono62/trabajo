<?php
class Database
{
    private static $dbName = 'id17105767_donpizza';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'id17105767_root';
    private static $dbUserPassword = '(cBu3BoPI3|W{KE#';
    private static $conection = null;

    public function __construct(){
        die("La funcion de inicio no esta permitida");
    }
    public static function connect(){
        if(null==self::$conection){
            try{
                self::$conection =  new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName,self::$dbUsername, self::$dbUserPassword);
            }catch(PDOException $e){
                die ($e->getMessage());
            }
        }
        return self::$conection;
    }
    public static function disconnect(){
        self::$conection == null;
    }
}
?>