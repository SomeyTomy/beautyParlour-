<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="">
eneter the array:
<input type="text" name="txt"></input>
eneter the  element:
<input type="text" name="txt1"></input>
<input type= "submit" name="sub" value="submit"></input>
</form>
<?php
if(isset($_POST['sub']))
{
	$arr=$_POST['txt'];
	$n=$_POST['txt1'];
	echo $arr;
	$x=explode(",", $arr);
	$low=0;
	$high=count($x);
	$count = 0;
	while($low<=$high-1)
	{
		$mid=floor(($low+$high)/2);
		if($x[$mid] == $n)
		{
			echo "$n Found at  " .++$mid. "location";
			$count++;
			break;
		}
		else if($x[$mid] <$n)	
		{
			$low=$mid+1;
		}	
		else
		{
			$high=$mid-1;
		}
	}
	if($count!=1)
	{
		echo "Elememt is NOt found";
	}
}
?>
</body>
</html>