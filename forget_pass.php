<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
</head>
<body>
  <h2>Forgot Password</h2>
  <p>Enter your email address to reset your password.</p>
  <form action="reset_password.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="Reset Password">
  </form>
</body>
</html>
