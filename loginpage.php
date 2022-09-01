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
margin: -40px 15px 50px 30px;
}

}
</style>
<form name="login" onsubmit="return validate()" method="post" action="login.php">
<table align="right" border-radius:20px  bordercolor="white" cellpadding=10 cellspacing=20>
<h1 align="right" style="color:purple;margin: 10px 200px 20px 10px;">Login</h1>
<tr style="font-size:25;color:white"><td>Enter your MV ID <input type="text" name="id"></tr></td><br>
<tr style="font-size:25;color:white"><td>Enter your User Name <input type="text" required placeholder="Name" name="name"></tr></td><br>
<tr style="font-size:25;color:white"><td>Enter your Password <input type="password" required placeholder="Password" name="password"></tr></td>
<tr style="font-size:25;color:white"><td><input type="checkbox" onclick="show()">Show Password</tr></td>
<tr style="font-size:25;color:white"><td><a href="Movie Forgotp Page.html"><b>Forgot Password</tr></td>
<tr style="font-size:25;color:white"><td><a href="changep.php"><b>Change Password</tr></td>
<tr style="font-size:25"><td><a href="registration.php"><b>Register as New member</td></tr>	
<tr align="center"><td><button type="submit">Submit</tr></td>
</form>
</body>
</html>
<?php
$host="localhost";
$db="helloworld";

try{
$pdo=new pdo("mysql:host=$host;dbname=$db","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(pdoException $e)
{
echo "Not connected".$e->getMessage();
die();
}
if(!empty($_POST['name']) && !empty($_POST['id']) && !empty($_POST['password']))
{
$name=$_POST['name'];
$id=$_POST['id'];
$password=$_POST['password'];


$stmt = $pdo->prepare("SELECT * FROM mvusers WHERE name=? and id=? and password=?");
$stmt->execute([$name,$id,$password]); 
$user = $stmt->fetch();
if ($user) {

echo"<p style='font-size:25;color:purple;background-color:cyan' align='center''>Valid User";
echo"<tr><td><a href='listing.php'<p style='font-size:25;color:purple;background-color:yellow' align='center''>Click here to Login</a></td></tr>";
               
} 


else 
{
   echo"<p style='font-size:25;color:purple;background-color:cyan' align='center'>Invalid User";
} 
}

?>

<script>
function validate()
{
var name=document.forms["login"]["name"];
if(/[^a-zA-Z]/.test(name.value))
{
window.alert("Enter alphabets in name")
return false;
}
}

function show()
{
var newp=document.forms["login"]["password"];

if(newp.type=="password")
{
newp.type="text";
}
else 
{
newp.type = "password";
}
}
</script>












