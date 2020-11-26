<?php
  $page_title = 'Login Page';
  include('../includes/header.html');
?>
<style>
body
{
  background-color: #5F9EA0;
}
h1
{
    text-align: center;
    font-size: 2.50em;
}
img
{
  text-align: center;
  padding: 8px;
}
.login-form
{
  padding: 18px;
}

input[type=email], input[type=password]
{
  width:55%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
label
{
  font-size: 1.08em;
}
button
{
    padding: 14px 20px;
    margin: 8px 0;
    width:18%;
}
form
{
  background-color:#FFE4C4;
  border: 3px solid #f1f1f1;
  margin: auto;
  margin-top: 56px;
  width: 600px;
}
</style>
<?php
  if (isset($errors) && !empty($errors)) {
    echo '<h1>Error!</h1><p class="text-danger">The following error(s) occured:<br>';
    foreach ($errors as $msg) {
      echo " - $msg<br>\n";
    }
    echo '</p><p class="text-danger">Please try again.</p>';
  }
 ?>

<body>
<form action="login.php" method="post">
  <h1>User Login</h1>
  <div class="imgAvatar">
  <img src="https://ccinfo.unc.edu/files/2018/03/GroupIcon.png" alt="Avatar" class="avatar">
</div>
<div class="login-form">
  <div id="user_input">
    <label for="email"><b>Email:</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="password"><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
   <input type="checkbox" checked="checked" name="rememberMe"> Remember Me </label>
</div>
</div>
</body>

<?php
  include('../includes/footer.html');
 ?>
