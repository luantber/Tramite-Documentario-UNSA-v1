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
        $this->dbname="tramite";
        $this->username="root";
        $this->password="";
        */


        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        $this->connection->set_charset("utf8");
      }



      function consulta($query)
      {
        $resultado = mysqli_query($this->connection,$query);
        return $resultado;
      }

      function get_id(){
        return $this->connection->insert_id;
      }

      function getFecha()
      {
        $timezone  = -5; //(GMT -5:00) EST (U.S. & Canada)
		    $a = gmdate("Y-m-j", time() + 3600*($timezone));
		    return $a ;
      }

    }

 ?>
