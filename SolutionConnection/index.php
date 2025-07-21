<?php
// echo phpinfo();
$hostname_database = "DESKTOP-HC1PCNK";    // server name

$database_database = "Company";    // Data Base Name

$username_database = "sa";         // DB user name

$password_database = "sa123456";          // DB password
 
ini_set('memory_limit', '256M');  // This also needs to be increased in some cases. Can be changed to a higher value as per need)

ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M

ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv
 
function mssql_query($query){

		global $conn;

		 $res= sqlsrv_query( $conn, $query , array(), array('Scrollable' => 'buffered'));

		 if( $res === false ) {

			 print $query;

			 print "<pre>";

			 die(  print_r( sqlsrv_errors(), true));

		}
		return   $res;

	}
$connectionInfo = array( "Database"=>$database_database, "UID"=>$username_database, "PWD"=>$password_database);
 
$conn = sqlsrv_connect( $hostname_database, $connectionInfo);

	 $database=$conn;

	if( $conn ) {

		// echo "Connection established.<br />";

	}else{

	   echo "Connection could not be established.<br />";

		 print "<pre>";

		 die( print_r( sqlsrv_errors(), true));

		 exit;

	}
    function mssql_close($database){
		sqlsrv_close($database);
	}
 
	function mssql_fetch_assoc($result){
		return sqlsrv_fetch_array( $result,SQLSRV_FETCH_ASSOC  );//SQLSRV_FETCH_BOTH
	}
 
	function mssql_num_rows($result){
		global $sqlsrvNumRows;
		$x=0;

		return sqlsrv_num_rows( $result );
	}
   $result = mssql_query("Select * from  Employees  where Id = 5");
  while( $rows = mssql_fetch_assoc($result)){
      echo "<pre>" ;
      print_r($rows);
  }
 
//    echo "<pre>";
//     while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
//          print_r($row);
//     }
//    echo "</pre>";
   
    ?>