<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Med Aid</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/index.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" onsubmit="ajaxResponse('assets\\php\\login_register\\login.php', loadDoc)" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" autofocus required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="http://phpoll.com/recover" tabindex="4" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="assets\php\login_register\register.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm Password" required>
									</div>
									<div class="form-group">
										<label>Blood Type:</label>
										<select id="bloodtype" name="selectbt" class="form-control">
											<option selected disabled>Select Blood Type</option>
											<option>A+</option>
											<option>A-</option>
											<option>B+</option>
											<option>B-</option>
											<option>O+</option>
											<option>O-</option>
											<option>AB+</option>
											<option>AB-</option>
										</select>
									</div>
									<div class="form-group">
										<label>Gender:</label>
										<select id="gender" name="selectg" class="form-control">
											<option selected disabled>Select Gender</option>
											<option>Male</option>
											<option>Female</option>
											<option>Other</option>
										</select>
									</div>
									<div class="form-group" required>
										<label>Date of Birth:</label>
										<input type="date" name="bday">
									</div>
									<div class="form-group">
										<input type="text" name="phonenum" id="phonenum" class="form-control" placeholder="Phone Number" value="" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.js"></script>
	
	<script type="text/javascript">
		$(function() {

			$('#login-form-link').click(function(e) {
				$("#login-form").delay(100).fadeIn(100);
				$("#register-form").fadeOut(100);
				$('#register-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#register-form-link').click(function(e) {
				$("#register-form").delay(100).fadeIn(100);
				$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});

		});
	</script>
	
	<button type="button"
		onclick="ajaxResponse('assets\\php\\login_register\\login.php', loadDoc)">Change Content
	</button>
	
	<script type="text/javascript">
		function ajaxResponse(url, cFunction){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					cFunction(this);
				}
			};
			
			console.log(document.getElementById("login-form").getElementById("email"));
			console.log(document.getElementById("password").innerHTML);
			xhttp.open("POST", url, false);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("password=" + "dc1" + "&email=" + "dc1@dc.com");
		}
		
		function loadDoc(xhttp){
			switch(xhttp.responseText){
				case '0':{
					alert("Wrong Login Credentials, Please Try Again");
					break;
				}
				case '1':{
					header('Location: http://medaid.azurewebsites.net/');
					break;
				}
				case '2':{
					window.location = 'http://medaid.azurewebsites.net/donation_center/dashboard_dc.php';
					break;
				}
				case '3':{
					window.location = 'http://medaid.azurewebsites.net/red_cross/dashboard_rc.php';
					break;
				}
			}
		 console.log(xhttp.responseText);
		}
	</script>

</body>

</html>
