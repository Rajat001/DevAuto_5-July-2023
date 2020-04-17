<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>

<br><br>

<div class="container" align="center">
<h2> Upload File Image Here</h2>	
<br>
<br>
<label>Name :- </label>
<input type="text" id="namedetail" name="namedetail">
<br><br>
<label>Select Image</label>
<input type="file" name="idproofdocument" id="idproofdocument">
<br>
<br>
<input type="button" id="submit_data" value="Upload Image">

<span id="uploaded_image"></span>
</div>

<script type="text/javascript">

	 $(document).ready(function(){
	 $("#submit_data").click(function(){
	//$(document).on('change' , '#idproofdocument', function(){
		var property = document.getElementById("idproofdocument").files[0];
		var namedetail = $("#namedetail").val();
		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();
		if(jQuery.inArray(image_extension, ['gif','png','jpg','jpeg']) == -1 )
		{
			alert('Invalid Image File');
		}
		var image_size = property.size;
		if(image_size > 2000000){
			alert("Image File Size Exceed Now");
		}
		else{
			var form_data = new FormData();
			form_data.append("idproofdocument", property);
			$.ajax({
				url: "testuploaddata1.php",
				method : "POST",
				data : form_data,
				contentType : false,
				cache : false,
				processData : false,
				beforeSend:function(){
					$('#uploaded_image').html("<label class='text-success'> Image Uploading .... </label> ");
				},
				success:function(data){
					$("#uploaded_image").html(data);
				}
			});
		}
	});
});
</script>

</body>
</html>




<script type="text/javascript">
	$(document).ready(function(){
		$('#submit_form').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				url : "testuploaddata.php",
				method : "POST",
				data: new FormData(this),
				contentType:false,
				processData: false,
				success:function(data){
					$('#image_preview').html(data);
					$('#image_file').val('');
				}
			});
		});
	});w

// $(document).ready(function(){
	// 	$(document).on('change','#file',function(){
	// 		var property = document.getElementById("")
	// 	});
	// });

</script>

