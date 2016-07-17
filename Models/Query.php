<?php namespace Models;
    /**
     *
     */

    use mysqli as mysqli;
    include_once "Include.php";
    class Query
    {


      public function __construct()
      {
        
        $this->servername=$GLOBALS['server'];
        $this->dbname=$GLOBALS['base_datos'];
        $this->username=$GLOBALS['user_bd'];
        $this->password=$GLOBALS['pass_bd'];
        
        // Check connection for testing

        /*
        $this->servername="localhost";
        $this->dbname="database4";
        $this->username="root";
        $this->password="";
        */


        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
      }



      function consulta($query)
      {
        $resultado = mysqli_query($this->connection,$query);
        return $resultado;
      }

      function get_id(){
        return $this->connection->insert_id;
      }


    }

 ?>
