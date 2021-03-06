<?php include "head.php" ?>

<div class="row" id="subcriptionSection">

	<div class="row">
		<div class="small-10 small-centered columns floating">
            <?php
            if(isset($_SESSION['username'])) {
                header('Location: userprofile.php?username='.$_SESSION['username']);
            } else {
            ?>
            <div class="small-12 medium-6 columns">
                <?php
				if(!empty($_POST)) {
					if(isset($_POST['usernameLogin'], $_POST['passwordLogin'])) {
						$username = trim($_POST['usernameLogin']);
						$password = trim($_POST['passwordLogin']);
						if(!empty($username) && !empty($password)) {				
							$password = md5($password);
							//echo $username , ' ', $password;
							if ($results = $db->query("SELECT username FROM users 
								WHERE username='$username' AND password='$password'")) {
								if($results->num_rows) {
									$_SESSION['username'] = $username;
                                    $str = 'Location: userprofile.php?username='.$username;
									header($str);
								}
								$results->free();
							}
						}
					}
				}
				?>
				<form method="post" name="loginForm">
					<fieldset>
						<h3>Log In</h3>
						<label for="usernameLogin">Username</label>
						<input name="usernameLogin" id="usernameLogin" type="text">
						<label for="passwordLogin">Password</label>
						<input name="passwordLogin" id="passwordLogin" type="password">
						<button type="submit" id="wikiButton">Log in</button>
					</fieldset>
				</form>
			</div>
			<div class="small-12 medium-6 columns">
				<?php
				if(!empty($_POST)) {
					if(isset($_POST['email'], $_POST['username'], $_POST['password'])) {
						$email = trim($_POST['email']);
						$username = trim($_POST['username']);
						$password = trim($_POST['password']);
						if(!empty($email) && !empty($username) && !empty($password)) {					
							$password = md5($password);
							$insert = $db->prepare("INSERT INTO users (email, username, password) 
								VALUES (?, ?, ?)");
							$insert->bind_param('sss', $email, $username, $password);
							if($insert->execute()) {
								header('Location: loginform.php?registered=True');
								die();
							}
						}
					}
				}
				?>
				<form method="post" name="registerForm">
					<fieldset>
						<h3>Register</h3>
						<?php
						if(isset($_GET['registered'])) {
							echo "<p>You have successfully registered for an account.
							You may now log in.</p>";
							}
						?>
						<label for="email">Email Address</label>
						<input name="email" id="email" type="email">
						<div id="email_feedback"></div>
						<label for="username">Username</label>
						<input name="username" id="username" type="text">
						<div id="username_feedback"></div>
						<label for="password">Password</label>
						<input name="password" id="password" type="password">
						<button type="submit" id="wikiButton">Register</button>
					</fieldset>
				</form>
			</div>
            <?php
            }
            ?>
		</div>
	</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#username_feedback').load('functions/registerFormCheck.php').show();
    $('#username').keyup(function() {
       $.post('functions/registerFormCheck.php', { username: registerForm.username.value },   // post into registerFormCheck.php the post variable 'username'
            function(result) {      // result is what registerFormCheck.php returns
                $('#username_feedback').html(result).show(); // display the result where #feedback is
       });
    });
    $('#email_feedback').load('functions/registerFormCheck.php').show();
    $('#email').keyup(function() {
       $.post('functions/registerFormCheck.php', { email: registerForm.email.value },
            function(result) { 
                $('#email_feedback').html(result).show();
       });
    });
});    
</script>
<?php include 'tail.php'; ?>
