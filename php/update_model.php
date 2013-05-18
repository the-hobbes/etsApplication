<?php

include ("db_utils.php");
date_default_timezone_set('UTC');

updateDb($data){
	// make query to update people table 
	$peopleQuery = "INSERT INTO";
	$peopleQuery .= "tbl_people SET";
	$peopleQuery .= "pk_netid=" . $data['netID'] . ",";
	$peopleQuery .= "fld_firstname=" . $data['firstName'] . ",";
	$peopleQuery .= "fld_lastname=" . $data['lastName'] . ",";
	$peopleQuery .= "fld_middleinitial=" . $data['middleInitial'] . ",";
	$peopleQuery .= "fld_streetaddress=" . $data['streetAddress'] . ",";
	$peopleQuery .= "fld_zipcode=" . $data['zipcode'] . ",";
	$peopleQuery .= "fld_email=" . $data['email'] . ",";
	$peopleQuery .= "fld_major=" . $data['major'] . ",";
	$peopleQuery .= "fld_graddate=" . $data['graduationDate'];
	// execute query
	execute($peopleQuery);

	// make query to update application database
	$appQuery = "INSERT INTO";
	$appQuery .= "tbl_application SET";
	$appQuery .= "fk_netid=" . $data['netID'] . ",";
	$appQuery .= "fld_submissiondate=" . date('l jS \of F Y h:i:s A') . ",";
	$appQuery .= "fld_prevworked=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_wrkeligible=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_undergrad=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_graduatestudent=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_credits=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_workstudy=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_employername=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_employeraddress=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_employerphone=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_prevpayrate=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_hrsworked=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_jobduties=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_maywecontact=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_refname=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_refphone=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_refrelationship=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_goodcandidate=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_prevcustexperience=" . $data['previouslyWorked'] . ",";
	$appQuery .= "fld_prevcts=" . $data['previouslyWorked'];

	// execute query
	execute($appQuery);
	

}


?>

