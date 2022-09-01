<html>
<body>
<style>
body{
   
background-image: url('mbg.png');
background-size: 1000px 750px;
background-position:left;
background-repeat: no-repeat;
}
table{
 background: linear-gradient(to right, #0066ff 0%, #cc66ff 100%);
width: 33%;
height: 58%;
margin: -40px 15px 50px 30px;
}

}
</style>
<form name="changep" onsubmit="return validate()" method="post" action="changep.php">
<table align="right" border-radius:20px  bordercolor="white" cellpadding=10 cellspacing=20>
<h1 align="right" style="color:purple;margin: 10px 120px 20px 10px;">Change Password</h1>
<tr style="font-size:25;color:white"><td>MV ID <input type="text" required name="id"></tr></td><br>
<tr style="font-size:25;color:white"><td>User Name <input type="text" required name="name"></tr></td><br>

<tr style="font-size:25;color:white"><td>Old Password <input type="password" required placeholder="Enter your old password" name="oldp"></tr></td><br>
<tr style="font-size:25;color:white"><td>New Password <input type="password" required placeholder="Enter your new password" name="password"></tr></td><br>
<tr style="font-size:25;color:white"><td>Re-Enter Password <input type="password" required placeholder="Enter your new password" name="renewp"></tr></td>
<tr style="font-size:25;color:white"><td><input type="checkbox" onclick="show()">Show Password</tr></td>
<tr align="center"><td><button type="submit">Submit</tr></td>
</body>
</form>

</html>

<?php
$host="localhost";
$db="helloworld";

try{
$pdo= new pdo("mysql:'localhost',dbname='helloworld'","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo"not connected".$e->getMessage();
die();
}
$con=mysqli_connect("localhost","root","","helloworld");
if(!empty($_POST['name'])&&!empty($_POST['id'])&&!empty($_POST['password']))
{
$name=$_POST['name'];
$id=$_POST['id'];
$password=$_POST['password'];


mysqli_query($con,"UPDATE mvusers set name='$name',password='$password' WHERE id='$id'");
echo"<p style='font-size:25;color:purple;background-color:cyan' align='center'>Data Updated";
mysqli_close($con);
echo"<tr><td><a href='login.php'<p style='font-size:25;color:purple;background-color:yellow' align='center''>Click here to Login</a></td></tr>";
               
}
?>


<script>
function validate()
{
window.alert("aaa");
var newp=document.forms["changep"]["newp"];
var renewp=document.forms["changep"]["renewp"];
var oldp=document.forms["changep"]["oldp"];

window.alert(newp.value);
if(newp.value!=renewp.value)
{
window.alert("Entered Passwords dont match");
newp.focus();
}

if(newp.value==oldp.value)
{
window.alert("New Password and old password can't be same");
newp.focus();
}
}

function show()
{
var newp=document.forms["changep"]["password"];
var renewp=document.forms["changep"]["renewp"];
var oldp=document.forms["changep"]["oldp"];


if(newp.type=="password")
{
newp.type="text";
renewp.type="text";
oldp.type="text";
}
else
{
newp.type="password";
renewp.type="password";
oldp.type="password";
}
return true;
}
</script>


















