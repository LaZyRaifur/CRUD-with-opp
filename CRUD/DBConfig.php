<?php
/**
 * Created by PhpStorm.
 * User: raifurrahim
 * Date: 4/5/2018
 * Time: 1:31 AM
 */

class DBConfig
{


    private $_host= 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database='users';

    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);


            if (!$this->connection) {
                echo 'Cannot connection with database server';
                exit;
            }
        }

        return $this->connection;
    }

}
?>