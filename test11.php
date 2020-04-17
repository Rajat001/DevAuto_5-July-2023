<!-- Below is CODE FOR TEXT COLOR CHANGED VIA SELECT DROPDOWN using Jquery-->

<?php
$values = array(350,520,480);
$values_count = count($values);
for ($i=0; $i < $values_count; $i++) { // loop $values_count number of times
    $str = ''; // this string will store the part before = in each line
    $total = 0; // initialize total to 0 after printing every line

    for ($j = 0; $j <= $i; $j++) { // loop across the first $i values in the $values array
        $str .= $values[$j] . " + "; // append to the string
        $total += $values[$j]; // add to total
    }

    //$str = substr($str, 0, -3); // remove the final ' + ' from the string
    echo $str . ' = ' . $total . "\n\n"; // print line
}
?>
<br>
<?php 
$one_dimensional_array = array(350,520,480);
$sum = 0;
foreach ($one_dimensional_array as $value) {
    $sum += $value;
}
echo "The sum of array items is: " . $sum;
?>
<br>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<button>Test</button>

<p id="P44" class="test">
    Testing...
</p>
<br>

<script type="text/javascript">
$(function(){
$("button").mouseover(function(){
var $p = $("#P44");
$p.stop()
.css("background-color","yellow")
.hide(1500, function() {
$p.css("background-color","red")
.show(1500);
});
});
});
</script>


<br><br><br><br>
<label id="font-color-label"> &nbsp; Receipt Wise (One) </label> 
<select id="receiptoptionone" name="receiptoptionone" class="btn btn-default btn-outline">
<option value="1"> No </option>
<option value="2"> Yes </option>

</select>

<p id="receiptoptiononeshow"> Data Will Be OK and Not Ok HERE ...</p>

<script>
$(document).ready(function () {
$showvalue = $("#receiptoptionone").val();	
if($showvalue == 2){
$("#receiptoptiononeshow").css("background-color","red")
$("#receiptoptiononeshow").css('text-decoration','line-through');
}
else if($showvalue == 1){
$("#receiptoptiononeshow").css("background-color","yellow");
$("#receiptoptiononeshow").css('text-decoration','none');
}		
});
</script>


<script type="text/javascript">
$(document).ready(function(){
$('#receiptoptionone').on('change', function() {
if ( this.value == '1')
{
$("#receiptoptiononeshow").css("background-color","yellow");
$("#receiptoptiononeshow").css('text-decoration','none');
}
else if (this.value == '2')
{
$("#receiptoptiononeshow").css("background-color","red")
$("#receiptoptiononeshow").css('text-decoration','line-through');
}
});
});
</script>

<?php 
if($cas['payVia'] == 'Cheque'){
?>              
<script>
$(document).ready(function () {
$("#payment_via_check_date").show();
});
</script>               
<?php } ?>

<p id="phpdatasection">asdasdlkasdlkasdhlaksdh </p>

<?php $showvalue = 2; ?>

<script>
$(document).ready(function () {
//$showvalue = $("#receiptoptionone").val();	


if($showvalue == 2){
$("#phpdatasection").hide();	
}
else if($showvalue == 1){
$("#phpdatasection").show();	
}		
});
</script>