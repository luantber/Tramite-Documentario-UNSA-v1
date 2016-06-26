<?php
    /**
     *
     */
    class query
    {
      var $servername;
      var $username;
      var $password;
      var $dbname;
      var $query;
      var $connection;
      var $result;


      function __construct($servername, $username, $password, $dbname)
      {
        $this->servername=$servername;
        $this->username=$username;
        $this->password=$password;
        $this->dbname=$dbname;

        // Check connection
        $this->connection = new mysqli($servername, $username, $password, $dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
      }



      function make_query($query)
      {
        $resultado = mysqli_query($this->connection,$query);
        return $resultado;
      }


    }

 ?>
