<?php
/* SIGN IN
* hangles sign in / login
*/
require 'config.php';

// Check if form has been submitted, then process
if (isset($_POST['submit'])) {
	
	// 1. check if email and password are empty
	if ( $_POST['email'] == "" || $_POST['password'] == ""){
    echo "Error. Make sure no fields are left blank.";
  }else{
  	// process the form ...
  	// 2. check if user exists in database
  	$query = "SELECT * FROM users WHERE email='{$_POST['email']}' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if($result){
    	// result was ran succcessfully
    	// 3. check if num_rows is greater than 0 (i.e. we found your user in the db)
    	if($result->num_rows > 0){
    		// user exists!
    		// 4. check that password matches
    		$user = mysqli_fetch_assoc($result);
    		$password_on_file = $user['password'];
    		if($_POST['password'] == $password_on_file){
    			// sign in success! credentials match!
    			// 5. create a session variable 'current_user' and set to user's ID
    			$_SESSION['loggedin_user'] = $user['id'];
    			// redirect to the homepage
    			header('Location: https://ipd-php-api-demo-dbrouse.c9users.io/');
    		}else{
    			echo "your password is incorrect. Try again";
    		}
    		
    	}else{
    		echo "Sorry, there is no account for that email.";
    	}
    	
    }else{
    	echo "Sorry something went wrong.";
    }
    
    
  	
  }
  die();
}


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign In - My Book Store</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/styles.css?v=1" rel="stylesheet" type="text/css">
</head>
<body>
  <header>
    <h1>Sign in</h1>
  </header>
	
	<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
		<input type="email" name="email" placeholder="Email Address" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit" name="submit" value="Sign In" />
	</form>
	
  </div><!--/page-main-->

</body>
</html>
