<?php namespace Models;
    /**
     *
     */

    use mysqli as mysqli;
    include_once "Include.php";
    class Query
    {
      var $servername;
      var $username;
      var $password;
      var $dbname;
      var $connection;



      public function __construct()
      {
        
        $this->servername=constant("servername");
        $this->dbname=constant("dbname");
        $this->username=constant("username");
        $this->password=constant("password");

        // Check connection
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

 
