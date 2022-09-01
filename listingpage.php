<html>
<html>
<center>
<h1 style="background-color:aquamarine;">Catalogue Page</h1>
<style>
body{
background-image: url('bag.jpg');
background-size: 100%;
background-repeat: 1;
}
table{
font-size: 30px;
color:white;
}
.dr{font-size: 10px;}
</style>
<table border="3"width="80%" height="50%" align="center" bgcolor="Night">
<th>Movie Poster</th><th>Movie name</th><th>Description</th>
</body>
</html>

</html>
<?php
$conn=mysqli_connect("localhost","root","","helloworld");
$sql="SELECT * FROM movies;";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);

if($resultcheck>0)
{
while($row=mysqli_fetch_assoc($result))
{
if($row['name']=='dardevil')
{
echo "<tr><td> <img src='".$row['mvid']."''><td>".$row['name']."<td>".$row['description']."</td></tr>";}
echo "<tr align='center'><td> <img src='".$row['mvid']."''><td>".$row['name']."<td>".$row['description']."</td></tr>";
if($row['name']=='dardevil')
{
echo "<tr align='center'><td> <img src='".$row['mvid']."''><td>".$row['name']."<td>".$row['description']."</td></tr>";}
}
}
else
{
echo"None";
}
$conn->close();
?>
</table>
</html>
