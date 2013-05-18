<?php

include ("db_utils.php");

updateDb(){
	// make query to update people table 
	$peopleQuery = "INSERT INTO";
	$peopleQuery .= "tbl_people SET";
	$peopleQuery .= "pk_netid='$netID',";
	$peopleQuery .= "fld_firstname='$$firstName',";
	$peopleQuery .= "fld_lastname='$$firstName',";
	$peopleQuery .= "fld_middleinitial='$$firstName',";
	$peopleQuery .= "fld_streetaddress='$$firstName',";
	$peopleQuery .= "fld_zipcode='$$firstName',";
	$peopleQuery .= "fld_email='$$firstName',";
	$peopleQuery .= "fld_major='$$firstName',";
	$peopleQuery .= "fld_graddate='$$firstName',";
	$peopleQuery .= "fld_phone='$$firstName'";

	// execute query
	execute($peopleQuery);

	// make query to update application database
	$appQuery = "INSERT INTO";
	$appQuery .= "tbl_application SET";
	
}


?>

