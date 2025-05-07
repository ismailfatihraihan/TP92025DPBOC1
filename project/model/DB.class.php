<?php
class DB
{
    var $db_host = "localhost"; // Database host
    var $db_user = "root";      // Database username
    var $db_pass = "";          // Database password
    var $db_name = "mvp_php";   // Database name
    var $db_link;               // Database connection
    var $result;                // Query result
    var $error;                 // Last error message

    function __construct()
    {
        // Constructor
    }

    function open()
    {
        // Open database connection
        $this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        
        // Check connection
        if (!$this->db_link) {
            $this->error = "Connection failed: " . mysqli_connect_error();
            die($this->error);
        }
    }

    function execute($query)
    {
        // Execute query
        $this->result = mysqli_query($this->db_link, $query);
        
        // Check for query errors
        if (!$this->result) {
            $this->error = "Query failed: " . mysqli_error($this->db_link) . " - Query: " . $query;
            echo "<div style='color:red; padding:10px; border:1px solid red; margin:10px;'>";
            echo "<strong>Database Error:</strong> " . $this->error;
            echo "</div>";
            return false;
        }
        
        return $this->result;
    }

    function getResult()
    {
        // Get result
        if ($this->result) {
            return mysqli_fetch_array($this->result);
        }
        return null;
    }

    function close()
    {
        // Close connection
        if ($this->db_link) {
            mysqli_close($this->db_link);
        }
    }
    
    function getError()
    {
        return $this->error;
    }
}
?>