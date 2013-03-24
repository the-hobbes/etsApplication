<!doctype html>
	<head>
		<title>ETS Student Technician Application</title>		
		<link rel="stylesheet" href="css/style.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--		<script type="text/javascript" src="scripts/jquery-validation-1.11.0/dist/jquery.validate.min.js"></script>-->
		<script>
		//run when the document has fully loaded
		// $(document).ready(function(){
		// });//end document ready

		/*
			validateForm
			Used to validate the entire form when submit its clicked. 
			If not valid, will rerender the page with errors.
			If indeed valid, forward the contents of the submission on to the server. 
		*/
		function validateForm(){
			//get all text field inputs
			var $textInputs = $('#applicationForm :input[type="text"]');
			//loop through each text input 
			$textInputs.each(function() {
				//if the input is required and empty, add a red background to it and display an error
				if( $(this).prev().hasClass('required') && ($(this).val().length < 1) ){
					console.log("required");
					$(this).addClass('error');
					$(this).after('<span class="errorMessage">**This Field is Required**</span>');
				}//end if
				else{
					$(this).removeClass('error');

					//if the source object is an email, check to see if it is valid
					if($(this).attr('name') == "emailAddress"){
					isValid = isEmail($(this).value);
					if($(this) == true)
						$(this).removeClass('error');
					else
						$(this).addClass('error');
						$(this).after('<span class="errorMessage">** Not a valid email **</span>');
					}
				}
			});//end each loop for textInputs

			//go back to the top of the page when all done
			$("html, body").animate({ scrollTop: 0 }, "slow");
		}

		/*
			lookup
			Used to validate the required parts of the form, and called on each keyup in the form.
			If the item calling the lookup is valid, then nothing will happen. If it is not, then it will be turned red.
		*/
		function lookup(arg){
			var value = arg.value;
			var sourceObject = $(arg); //convert to jquery object

			// console.log(value);
			// console.log(sourceObject.attr('name'));

			if (value.length < 1){
				//is it empty? it shouldn't be. show an error
				sourceObject.addClass('error');
				// sourceObject.after('<span class="errorMessage">**This Field is Required**</span>');
			}
			else{
				//there is stuff in there. take away the error class and the error message
				// sourceObject.next().remove();
				sourceObject.removeClass('error');

				//if the source object is an email, check to see if it is valid
				if(sourceObject.attr('name') == "emailAddress"){
					isValid = isEmail(value);
					if(isValid == true)
						sourceObject.removeClass('error');
					else
						sourceObject.addClass('error');
				}

				//if the source object is a zipcode, check to see if it is valid
				if (arg.value != arg.value.replace(/[^0-9,-\.]/g, '')) {
					arg.value = arg.value.replace(/[^0-9,-\.]/g, '');
					sourceObject.addClass('error');
				}
				else
					sourceObject.removeClass('error');
					
			}//end else
		}//end lookup
		/*
			isEmail
			Uses regular expressions to determine if the email is in a valid format. 
		*/
		function isEmail(email) {
		  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		  return regex.test(email);
		}
		</script>
	</head>

	<body>
		<header>
			<a href="http://www.uvm.edu/it/help/?Page=CDCjobs.html" target="_blank"><h1>Student Technician Application</h1></a>
		</header>
		
		<hr>

		<div id="instructions">
			<p>Please fill out the following form to be considered for anETS Student technician position. Note that required
				fields are marked in by  <span style="color:#FF3030;">**</span>.</p>
		</div>

		<form id="applicationForm" action="#">
			<fieldset>
				<legend>Personal Information:</legend>

				<label>
					<span class="required"><span style="color:#FF3030;">**</span>Last Name:</span>
					<input type="text" name="lastName" onkeyup="lookup(this);">
				</label>

				<label>
					<span class="required"><span style="color:#FF3030;">**</span>First Name:</span>
					<input type="text" name="firstName" onkeyup="lookup(this);">
				</label>

				<label>
					<span class="required"><span style="color:#FF3030;">**</span>Middle Initial:</span>
					<input type="text" name="middleInitial" onkeyup="lookup(this);">
				</label>

				<label>
					<span class="required"><span style="color:#FF3030;">**</span>Street Address:</span>
					<input type="text" name="lastName" onkeyup="lookup(this);">
				</label>

				<label>
					<span class="required"><span style="color:#FF3030;">**</span>Zip Code:</span>
					<input type="text" name="zipCode" onkeyup="lookup(this);">
				</label>

				<label>
					<span class="required"><span style="color:#FF3030;">**</span>Email Address:</span>
					<input type="text" name="emailAddress" onkeyup="lookup(this);">
				</label>				

				<label>
					<span class="required"><span style="color:#FF3030;">**</span>UVM NetID:</span>
					<input type="text" name="netId" onkeyup="lookup(this);">
				</label>

				<label>
					<span class="required"><span style="color:#FF3030;">**</span>UVM Major:</span>
					<input type="text" name="major" onkeyup="lookup(this);">
				</label><!--end UVM Information-->	
				
				<label>
					<div class="required"><span style="color:#FF3030;">**</span>You are eligible to work in the United States:</div>
					<input type="radio" name="eligibility" value="true" checked="checked">True
					<input type="radio" name="eligibility" value="false"> False
				</label>		
			</fieldset>

			<fieldset>
				<legend>UVM Specific Information</legend>

				<label>
					<div>Have you previously worked for UVM?</div>
					<input type="radio" name="previousWork" value="yes" checked="checked">Yes
					<input type="radio" name="previousWork" value="no"> No
				</label>

				<label>
					<div>Are you currently an Undergraduate student at UVM?</div>
					<input type="radio" name="undergradStudent" value="yes" checked="checked">Yes
					<input type="radio" name="undergradStudent" value="no"> No
				</label>

				<label>
					<div>Are you currently an Graduate student at UVM?</div>
					<input type="radio" name="gradStudent" value="yes" checked="checked">Yes
					<input type="radio" name="gradstudent" value="no"> No
				</label>

				<label>
					<span>If you are a UVM student, in how many credits are you enrolled?</span>
					<input type="text" name="credits">
				</label>

				<label>
					<span class="required"><span style="color:#FF3030;">**</span>What is your expected date of graduation?</span>
					<input type="text" name="gradDate" onkeyup="lookup(this);">
				</label>

				<label>
					<span>Enter any work study award amount (if applicable):</span>
					<input type="text" name="workStudyAmount">
				</label>
			</fieldset><!-- end UVM Specific Information-->
			
			<fieldset>
				<legend>Previous Employment</legend>

				<label>
					<span>Employer Name:</span>
					<input type="text" name="employerName">
				</label>

				<label>
					<span>Employer Address:</span>
					<input type="text" name="employerAddress">
				</label>

				<label>
					<span>Employer Phone Number:</span>
					<input type="text" name="employerPhone">
				</label>

				<label>
					<span>Pay Rate:</span>
					<input type="text" name="payRate">
				</label>

				<label>
					<span>Hours worked per week:</span>
					<input type="text" name="hoursPerWeek">
				</label>

				<label>
					<div>Job Duties:</div>
					<textarea name="jobDuties"></textarea>
				</label>

				<label>
					<div>May we contact this employer?</div>
					<input type="radio" name="contactEmployer" value="yes" checked="checked">Yes
					<input type="radio" name="contactEmployer" value="no"> No
				</label>
			</fieldset><!-- end Previous Employment-->

			<fieldset>
				<legend>References</legend>

				<label>
					<span>Reference Name:</span>
					<input type="text" name="referenceName">
				</label>

				<label>
					<span>Reference Phone Number:</span>
					<input type="text" name="referencePhone">
				</label>

				<label>
					<span>Reference Relationship:</span>
					<input type="text" name="referencePhone">
				</label>
			</fieldset><!-- end References-->

			<fieldset>
				<legend>Candidate Information</legend>

				<label>
					<div>Tell us what makes you a good candidate for this job:</div>
					<textarea name="goodCandidate"></textarea>
				</label>

				<label>
					<div>Describe any previous customer service experience you have had:</div>
					<textarea name="csExperience"></textarea>
				</label>

				<label>
					<div>Describe any computer troubleshooting service experience you have had:</div>
					<textarea name="ctsExperience"></textarea>
				</label>
			</fieldset><!-- end candiate information-->

			<input class="submit" type="button" value="Submit" onclick="validateForm()"/>

		</form><!--end application form-->

		<footer>
			<h3>Enterprise Client Services, UVM</h3>
		</footer>
	</body>
</html>