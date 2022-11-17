<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h2>Result</h2>
<?php 
$check = false;
$name = $_POST['name'];
$fh = fopen("1000.txt","r")or die("Can't open file");
while(!feof($fh))
{
$line = fgets($fh);
$compare = trim($line);
if (strcmp($name,$compare) == 0)
{
    $check = true;
}
}
if ($check == true){
print ("<h1>" . $name . " is an acceptable password</h1><br>");
fclose($fh);
}
else{ 
print ("<h1>" . $name . " is not an acceptable password</h1><br>");
}
?>
<form method="post" action="index.php"> 
  
  <input type="submit" name="submit" value="Back">  
</form>
</body>

</html>
