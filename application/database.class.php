<?php
/**
 * Author: Tim Ware Jr.
 * Date: 4/19/2021
 * File: database.class.php
 * Description:
 */

class database
{
//define database parameters
    private $param = array(
    'host' => 'localhost',
    'login' => 'phpuser',
    'password' => 'phpuser',
    'database' => 'savory_foods',
    'tblCategories' => 'categories',
    'tblRecipes' => 'recipes',
    'tblUsers' => 'users',
);
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
    $this->objDBConnection = @new mysqli(
        $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
    );
    if (mysqli_connect_errno() != 0) {
        $message = "Connecting database failed: " . mysqli_connect_error() . ".";
        include 'error.php';
        exit();
    }
}

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
    if (self::$_instance == NULL)
        self::$_instance = new Database();
    return self::$_instance;
}

    //this function returns the database connection object
    public function getConnection() {
    return $this->objDBConnection;
}

    //returns the name of the table that stores movies
    public function getCategories() {
    return $this->param['tblCategories'];
}

    //returns the name of the table that stores books
    public function getRecipes() {
    return $this->param['tblRecipes'];
}

    //returns the name of the table storing games
    public function getUsers() {
    return $this->param['tblUsers'];
    }
}