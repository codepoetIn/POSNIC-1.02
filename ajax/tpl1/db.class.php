<?php
  /** A PHP class to access MySQL database with convenient methods
    * in an object oriented way, and with a powerful debug system.\n
    * Licence:  LGPL \n
    * Web site: http://slaout.linux62.org/
    * @version  1.0
    * @author   S&eacute;bastien Lao&ucirc;t (slaout@linux62.org)
    */
  class DB
  {
    /** Put this variable to true if you want ALL queries to be debugged by default:
      */
    var $defaultDebug = false;

    /** INTERNAL: The start time, in miliseconds.
      */
    var $mtStart;
    /** INTERNAL: The number of executed queries.
      */
    var $nbQueries;
    /** INTERNAL: The last result ressource of a query().
      */
    var $lastResult;

    /** Connect to a MySQL database to be able to use the methods below.
      */
    function DB($base, $server, $user, $pass)
    {
      $this->mtStart    = $this->getMicroTime();
      $this->nbQueries  = 0;
      $this->lastResult = NULL;
     $myconnection = mysql_connect($server, $user, $pass);
     $myconnection =  mysql_select_db($base)              ;
      
      if ($myconnection==FALSE) {
          $data='Database Connection is Not valid Please Enter The valid database connection';
   header("location:install.php?msg=$data");
    exit;
       
}
    }

  
    function query($query, $debug = -1)
    {
      $this->nbQueries++;
      $this->lastResult = mysql_query($query) or $this->debugAndDie($query);

      $this->debug($debug, $query, $this->lastResult);

      return $this->lastResult;
    }
    function fetchNextObject($result = NULL)
    {
      if ($result == NULL)
        $result = $this->lastResult;

      if ($result == NULL || mysql_num_rows($result) < 1)
        return NULL;
      else
        return mysql_fetch_object($result);
    }
    function debugAndDie($query)
    {
      $this->debugQuery($query, "Error");
      die("<p style=\"margin: 2px;\">".mysql_error()."</p></div>");
    }
    /** Internal function to debug a MySQL query.\n
      * Show the query and output the resulting table if not NULL.
      * @param $debug The parameter passed to query() functions. Can be boolean or -1 (default).
      * @param $query The SQL query to debug.
      * @param $result The resulting table of the query, if available.
      */
   
    function debug($debug, $query, $result = NULL)
    {
      if ($debug === -1 && $this->defaultDebug === false)
        return;
      if ($debug === false)
        return;

      $reason = ($debug === -1 ? "Default Debug" : "Debug");
      $this->debugQuery($query, $reason);
      if ($result == NULL)
        echo "<p style=\"margin: 2px;\">Number of affected rows: ".mysql_affected_rows()."</p></div>";
      else
        $this->debugResult($result);
    }
   
    function close()
    {
      mysql_close();
    }

    function getMicroTime()
    {
      list($msec, $sec) = explode(' ', microtime());
      return floor($sec / 1000) + $msec;
    }
  } // class DB
?>
