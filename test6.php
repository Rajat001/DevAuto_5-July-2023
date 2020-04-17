<!DOCTYPE html>
<html>
<head>
    <title></title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<div id="accessories"> 
    <input type="button" id="add" value="New Thing" />
    <div  class="addNew">
<label id="font-color-label">  Accessories </label>

<select class="form-control" id="accessorieId">  
<option value="">----Select----</option>        
<?php 
include 'header/conn.php';
$s = "SELECT * FROM accessories";
$se = mysqli_query($conn, $s);
While($sel = mysqli_fetch_array($se)){      ?>

<option value="<?php echo $sel['id']; ?>"><?php echo $sel['name']; ?></option>
<?php } ?>

</select>

<br><br>

<div class="form-group">
<label id="font-color-label">Sub Accessories</label>        

<select class="form-control" id="subaccessorieId" disabled="disabled"> 
<option value=""> ---- Select ----</option>
</select>           
</div>
<br>

<label>Cost :- </label>

<select class="form-control" id="cost" disabled="disabled">
<option value=""> </option>
</select>   
        <input type="button" class="addAccessorie" value="New Field For Stuff" />
        <br />
        <br />

    </div>
</div>


<script type="text/javascript">
    
      $('#accessories').on('click','.addAccessorie', function () {
          var newthing=$('div.addNew:first').clone().find('.addAccessorie').removeClass('addAccessorie').addClass('remove').val('Remove Field!').end();

         $('#accessories').append(newthing);
    });
    
     $('#accessories').on('click','.remove', function () {
        
        $(this).parent().remove();
    });
    
    
    $('#add').on('click', function () {
        
        var thing=$('div.addNew:first').clone();
        $('#accessories').append(thing);
    });

</script>

</body>
</html>