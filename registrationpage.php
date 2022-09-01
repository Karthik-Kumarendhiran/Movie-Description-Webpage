<html>
<body>
<style>
body{
   
background-image: url('mbg.png');
background-size: 950px 820px;
background-position:left;
background-repeat: no-repeat;
}
table{
 background: linear-gradient(to right, #0066ff 0%, #cc66ff 100%);
margin: -40px 15px 50px 30px;
}

}
</style>
<form name="regi"  action="registration.php" method="POST" onsubmit="return validate()">
<table align="right"  border-radius:20px  bordercolor="white" cellpadding=10 cellspacing=20>
<h1 align="right" style="color:purple;margin: 10px 120px 20px 10px;">Registration Page</h1>
<tr style="font-size:25;color:white"><td>Enter your MV ID <input type="text" name="id"></tr></td><br>
<tr style="font-size:25;color:white"><td>Enter your User Name <input type="text" required placeholder=" User-name" name="name"></tr></td><br>
<tr style="font-size:25;color:white"><td>Enter your Name <input type="text" required placeholder="Name" name="rname"></tr></td><br>
<tr style="font-size:25;color:white"><td>Enter your Password  <input type="password" required placeholder="Password" name="password"></tr></td>
<tr style="font-size:25;color:white"><td>Re-Enter your Password  <input type="password" required placeholder="Password" name="renewp"></tr></td>
<tr style="font-size:25;color:white"><td>Enter your mail <input type="email" required placeholder="Mail" name="mail"></tr></td>
<tr style="font-size:25;color:white"><td>Enter your phone number <input type="tel" required placeholder="Phone number" minlength="10" maxlength="10"name="tel"></tr></td>
<tr style="font-size:25;color:white"><td>Date Of Birth <input type="date" name="date"></tr></td>
<tr style="font-size:25;color:white"><td>Show Password<input type="checkbox" onclick="show()"></td> </tr>
<tr align="center"><td><br><input type=submit>     <button type="reset">Reset</button></tr></td>

</table>
</form>
</body>

</html>

<?php
$host="localhost";
$db="helloworld";

try{

$pdo= new PDO("mysql:host=$host;dbname=$db","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e){

echo "not connected ".$e->getMessage();
die();
}

if ( !empty($_POST['name']) && !empty($_POST['password'])&& !empty($_POST['id'])) {
$sql = "INSERT INTO mvusers (id,name, password) VALUES (:id,:name, :password)";

$stmt = $pdo->prepare($sql);

if( $stmt->execute(array(':id' => $_POST['id'],':name' => $_POST['name'],':password' => $_POST['password']))==true)

echo"<p style='font-size:25;color:purple;background-color:cyan' align='center'>ONE USER WAS ADDED";

else

"eror";
}
?>

<script>
function validate()
{
window.alert("aaa");
var uname=document.forms["regi"]["uname"];
var name=document.forms["regi"]["name"];
var newp=document.forms["regi"]["newp"];
var renewp=document.forms["regi"]["renewp"];
var mail=document.forms["regi"]["mail"];
var tel=document.forms["regi"]["tel"];
var date=document.forms["regi"]["date"];

var mailformat = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;


if(name.value==""||uname.value=="")
{
window.alert("Enter name and user name");
name.focus();
uname.focus();
return false;
}

if(newp.value==""||renewp.value=="")
{
window.alert("Enter your password");
newp.focus();
return false;
}

if(newp.value!=renewp.value)
{
window.alert("Entered passwords don't match");
newp.focus();
return false;
}

if(mail.value=="")
{
window.alert("Enter mail ID");
mail.focus();
return false;
}

if(tel.value=="")
{
window.alert("Enter mobile number");
tel.focus();
return false;
}

if(date.value=="")
{
window.alert("Enter date");
date.focus();
return false;
}
return true;
}
function show()
{
var newp=document.forms["regi"]["password"];
var renewp=document.forms["regi"]["renewp"];
if(newp.type=="password")
{
newp.type="text";
renewp.type="text";
}
else
{
newp.type="password";
renewp.type="password";
}
}
</script>