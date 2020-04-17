<?php 

$one = 1;

$two = 2;

$three = 3;

$four = 4;

$five = 5;

$six = 20;


echo $sum1 = $one + $two + $three + $four + $five;
echo "<br>";
echo $sum2 = $six;
echo "<br>";
$result = $sum1 - $sum2;

//echo $result;
echo "<br>";
if($sum1 > $sum2){
	echo "-" . $result;
}else{
	echo "+" . $result;
}

?>