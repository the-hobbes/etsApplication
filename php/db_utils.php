<?php

	// connect to the database
	function connect(){

		$this->con = mysql_connect($this->app->conf['hostname'], $this->app->conf['dbUser'], $this->app->conf['dbPass']);	
		mysql_select_db($this->app->conf['database'], $this->con) or die(mysql_error());

		// Check connection
		if (mysqli_connect_errno($this->con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}

	//execute(): same as query except does not return results
	function execute($string){
		$this->connect();

		$result=mysql_query($string);

		if (!$result) {
		    $message  = 'Invalid query: ' . mysql_error() . "\n";
		    $message .= 'Whole query: ' . $string;
		    die($message);
		}

		mysql_close($this->con);
	}

?>