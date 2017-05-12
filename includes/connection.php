
<?php
define("DB_SERVER", "mysql.webcindario.com");
define("DB_USER", "petme");
define("DB_PASS", "Temporal123");
define("DB_NAME", "petme");

$con = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die("Cannot select DB");
	
	?>