<html>
<body>
Hello World 

<?php 

function pg_connection_string() {
  	if(getenv('USERNAME') == "RHINOPOTAMUS$")
  	{
		return "dbname=postgres user=postgres password=m0n0na";
	} else {
		return getenv('PG_CONNECTION_STRING');
	}	
}

$db = pg_connect(pg_connection_string());
if (!$db) {
    echo "Database connection error.";
    exit;
} else {
	echo "database connection success!";
}

?>

</body>
</html>