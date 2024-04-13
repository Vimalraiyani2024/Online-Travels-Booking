<?php
echo "<table><tr>";
$i=2;
$j=1;
	for($r=1;$r<=52;$r++)
	{
		if($r%5==0)
		{
			echo "<td><input type='checkbox' name='remember' value='$r'/>$r</tr>";
		}
		else
		{	
			echo "<td><input type='checkbox' name='remember' value='$r'/>$r";
		}
		if($i==$r)
		{
			echo "<td><td><td>";
			$i=$i+5;
		}
}
echo "</tr></table>";
?>


