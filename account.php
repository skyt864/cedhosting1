<?php
include('Dbconnection.php'); 
include('User.php');
include('header.php');  
  $Dbcon=new Dbconnection();
  
  $User = new User();



 if(isset($_POST['submit'])){
  $username =$_POST['user_name'];
  // echo $username;
  $mobile = $_POST['mobile'];
  // echo $mobile;
  $email=$_POST['email'];
  // echo trim($email);
  // echo '</br>';
  // echo $email;
  // echo $email;
  $password=$_POST['password'];
  // echo $password;
  $repassword=$_POST['repassword'];
  // echo $repassword;
  $question =$_POST['questions'];
  // echo $question;
  $answer=$_POST['answers'];
  // echo $answer;
  
  
  
  
  if($email==''||$username==''||$mobile==''||$password==''||$repassword==''&&$question=''||$answer=='')
{
	echo '<script>alert("not null allowed");</script>';
	// header('location:index.php');
}
if($password!=$repassword)
{
	echo '<script>alert("password did not matched")</script>';
}
elseif(trim($username)!=$username)
{
	echo '<script>alert("no spaces at username allowed")</script>';
}
elseif (trim($email)!=$email) {
	echo '<script>alert("no spaces at email allowed")</script>';
}
elseif(preg_match("[\s]",$email))
{
echo '<script>alert("no spaces at email allowed")</script>';
}
elseif (trim($password)!=$password) {

echo '<script>alert("no spaces at password allowed")</script>';
}

elseif (trim($question)!=$question) {

echo '<script>alert("no spaces at questions allowed")</script>';
}

elseif (trim($answer)!=$answer) {

echo '<script>alert("no spaces at answers allowed")</script>';
}
// elseif(!((preg_match("/^[A-Za-z]+$/", $username)) || !(preg_match("/^[a-zA-Z]+(\s[a-zA-Z]+){1,}?$/", $username))))
// {
// 	echo '<script>alert("Only Alphabet allowed")</script>';
// }
elseif(!preg_match("/^([a-zA-Z0-9]+\s?)*$/", $username))
{
echo '<script>alert("invalid name")</script>';
}
elseif (preg_match(" /^(\d)\1{9}/", $mobile)){
	echo '<script>alert("Phone Number should Not contain identical values")</script>';
}

elseif (!preg_match(" /^(0|[+91]{3})?[123456789][0-9]{9}$/", $mobile)) {
	echo '<script>alert("Phone Number Not Valid")</script>';
}

// elseif (!preg_match("/^[a-zA-Z_]{3,10}$/", $username)){
// 	echo '<script>alert("username should contains only alphabets")</script>';
// }
elseif (!preg_match("/^([^\.]|([^\.])\.[^\.])*$/", $email)) {
	echo '<script>alert("email should not contain two decimal ")</script>';
}
elseif (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/", $email)) {
	echo '<script>alert("Not correct pattern email ")</script>';
}
elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/",$password)) {
  echo '<script>alert("password not in correct pattern")</script>';
}
// elseif (!preg_match("/^([a-zA-Z0-9]+\s?)*$/", $username)) {
// 	 echo '<script>alert("more than one space in username")</script>';
// }
elseif (preg_match("/^@*#*!*&*/", $answer)) {
	echo '<script>alert("all special characters not allowed")</script>';
}
else
{
  $sql=$User->Register($email,$username,$mobile,$password,$repassword,$question, $answer,$Dbcon->conn);
  echo $sql;
}
}
?>

	<!---header--->
	
	<!---header--->
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
				 <div class="register-but">
		  	  <form action="account.php" method="POST"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>Name<label>*</label></span>
						<input type="text" name="user_name"> 
					 </div>
					 <div>
						<span>Mobile No<label>*</label></span>
						<input type="text" name="mobile"> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" name="email"> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password">
							 </div>
							 <div>
								<span>Re-Password<label>*</label></span>
								<input type="password" name="repassword">
							 </div>
							 <h3>Security Questions</h3>
							 <div>
							 	<span>Security Question<label>*</label></span>
								<select class="bg-white" name="questions" id="questions">
			                             <option value="">Select Your Security Question</option>
			                             <option value="What Is your favorite book?">What was your childhood nickname?</option>
			                             <option value="What is your favorite food?">What is the name of your favourite childhood friend?</option>
			                             <option value="What city were you born in?">What was your favourite place to visit as a child?</option>
			                             <option value="Where is your favorite place to vacation?">What was your dream job as a child?</option>
			                             <option value="Where did you meet your spouse?">What is your favourite teacher's nickname?</option>
			                    </select>
                            </div>
                     
                     <div id="divid">
						 <span>Security Answer<label>*</label></span>
						 <input type="text" name="answers"> 
					 </div>
					    
							 
					 </div>
					           <div class="clearfix"> </div>
				               
				      	
                                 <input type="submit" name ="submit" value="submit">
                                 <div class="clearfix"> </div>
				</form>
				
				  
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
				<!---footer--->
				<div class="facebook-section">
					<div class="container">
					<div class="face-top">
						<h5><img src="images/facebook.png"><span>I can’t believe my grand mothers making me take Out the garbage I’m rich fuck this I’m going home I don’t need this shit</span><h5>
					</div>
					</div>
				</div>
				<div class="footer-section">
					<div class="container">
						<div class="footer-grids">
							<div class="col-md-3 footer-grid">
								<h4>flickr widget</h4>
								<div class="footer-top">
									<div class="col-md-4 foot-top">
										<img src="images/f1.jpg" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-4 foot-top">
									<img src="images/f2.jpg" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-4 foot-top">
									<img src="images/f3.jpg" class="img-responsive" alt=""/>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="footer-top second">
									<div class="col-md-4 foot-top">
									<img src="images/f4.jpg" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-4 foot-top">
									<img src="images/f1.jpg" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-4 foot-top">
									<img src="images/f2.jpg" class="img-responsive" alt=""/>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-3 footer-grid">
								<h4>tag cloud</h4>
								<ul>
								<li><a href="#">Premium</a></li>
								<li><a href="#">Graphic</a></li>
								<li><a href="#">1170px</a></li>
								<li><a href="#">Photoshop Freebie</a></li>
								<li><a href="#">Designer</a></li>
								<li><a href="#">Themes</a></li>
								<li><a href="#">thislooksgreat chris</a></li>
								<li><a href="#">Lovely Area</a></li>
								<li><a href="#">You might use it...</a></li>
								</ul>
							</div>
							<div class="col-md-3 footer-grid">
							<h4>recent posts</h4>
								<div class="recent-grids">
									<div class="col-md-4 recent-great">
										<img src="images/f4.jpg" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-8 recent-great1">
										<a href="#">This is my lovely headline title for this footer section.</a>
										<span>22 October 2014</span>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="recent-grids">
									<div class="col-md-4 recent-great">
										<img src="images/f1.jpg" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-8 recent-great1">
										<a href="#">This is my lovely headline title for this footer section.</a>
										<span>22 October 2014</span>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="recent-grids">
									<div class="col-md-4 recent-great">
										<img src="images/f3.jpg" class="img-responsive" alt=""/>
									</div>
									<div class="col-md-8 recent-great1">
										<a href="#">This is my lovely headline title for this footer section.</a>
										<span>22 October 2014</span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-3 footer-grid">
								<h4>get in touch</h4>
								<p>8901 Marmora Road</p>
								<p>Glasgow, DO4 89GR.</p>
								<p>Telephone : +1 234 567 890</p>
								<p>Telephone : +1 234 567 890</p>
								<p>FAX : + 1 234 567 890</p>
								<p>E-mail : <a href="mailto:example@mail.com"> example@mail.com</a></p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="copy-section">
							<p>&copy; 2016 Planet Hosting. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
						</div>
					</div>
				</div>
			<!---footer--->
</body>
</html>