<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>

<div class="container" align="center">
	
	<form id="submit_form" action="testuploaddata.php" method="post">
	
	<div class="form-group">
		<label>Select Image :- </label>
		<input type="file" name="file" id="image_file">
		<span class="help-block"> Allowed File Type - jpg , jpeg , png , gif </span>
	</div>
	<input type="submit" name="upload_button" class="btn btn-info">
	</form>
	<br>
	<h3 align="center"> Image Preview</h3>

	<div id="image_preview">
	</div>
</div>
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

