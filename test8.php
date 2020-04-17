<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<p id="one" value="ttetetete"> Hello </p>

<p id="result"></p>

<span class="class1" style="display: none;"> 1</span>

<span class="class2" style="display: none;"> 6</span>

<br>

<span id="totalresult"></span>

<script type="text/javascript">

$(document).ready(function(){

// var one = $('#one').val();
// var two = document.getElementById('#one').value();
//document.getElementById('#result').innerHTML = three;

var three = "Hello Rajat Singh";
document.getElementById('result').innerHTML = three;

//document.getElementById("result").value = three;	

var test = document.getElementById("one").value;

var $temp = $('.class1').text();
var $temp1 = $('.class2').text();

//alert($temp);
var $result = parseInt($temp, 10) + parseInt($temp1, 10);
//alert($result);

document.getElementById('totalresult').innerHTML = $result;
});

</script>




