

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<input type="text" id="receiptdata" />
<input type="button" id="getreceipt" value="Get Details"/>
<div class="user-content">
    <h4>Receipt Details</h4>
    <p>Amount: <span id="amount"></span></p>
    
    <div id="receiptdetailone" style="display: none;">
    <p>Customer Name: <span id="cusName"></span></p>
    <p>Mobile: <span id="mobile"></span></p>
    </div>
</div>


<br><br>

<input type="text" id="receiptdataone" />
<input type="button" id="getreceiptone" value="Get Details"/>
<div class="user-content">
    <h4>Receipt Details One</h4>
    <p>Amount One: <span id="amountone"></span></p>
    
    <div>
    <p>Customer Name: <span id="cusNameone"></span></p>
    <p>Mobile: <span id="mobileone"></span></p>
    </div>

</div>


<script>
$(document).ready(function(){
    $('#getreceipt').on('click',function(){
        var receiptdata = $('#receiptdata').val();
        var receiptdataonematch  = $('#receiptdataone').val();
        $.ajax({
            type:'POST',
            url:'test2data.php',
            dataType: "json",
            data:{receiptdata:receiptdata},
            success:function(data){
                if(receiptdata == receiptdataonematch){
                    alert("Receipt Cannot Be Same !!!");
                    $( "#receiptdataone" ).val('');
                }
                else if(data.status == 'ok'){
                    $('#amount').text(data.result.amtPaid);
                    //$('#amount').val(data.result.amtPaid); // Here Calling For Input Type Text....
                    $('#cusName').text(data.result.cusName);
                    $('#mobile').text(data.result.mobile);
                    //$('#userCreated').text(data.result.created);
                    //$('.user-content').slideDown();
                    $('#receiptdetailone').show();
                }
                else{
                    //$('.user-content').slideUp();
                    alert("User not found 1...");
                    $( "#amount" ).empty();
                    $( "#cusName" ).empty();
                    $( "#mobile" ).empty();
                    $('#receiptdetailone').hide();
                } 
            }
        });
    });


    $('#getreceiptone').on('click',function(){
     var receiptdataone  = $('#receiptdataone').val();
     $.ajax({
       type : "POST",
       url : "test2data.php",
       dataType : "json",
       data : {receiptdataone:receiptdataone},
       success:function(data){

        if(data.status == "ok"){
            $("#amountone").text(data.result.amtPaid);
            $("#cusNameone").text(data.result.cusName);
            $("#mobileone").text(data.result.mobile);
            
        }else{
            alert("User not found 2...");
            $( "#amountone" ).empty();
            $( "#cusNameone" ).empty();
            $( "#mobileone" ).empty();
        }

           }    
        });
    });
});
</script>