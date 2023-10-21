<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Nume utilizator</label>
     	<input type="text" name="uname" placeholder="Nume utilizator"><br>

     	<label>Parola</label>
     	<input type="password" name="password" placeholder="Parola"><br>

     	<button type="submit">Logare</button>
          <a href="signup.php" class="ca">N-ai cont? Creaza unul!</a>
     </form>
</body>
</html>