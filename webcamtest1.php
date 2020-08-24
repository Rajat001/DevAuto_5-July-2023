<html>
<head>
    
    <style type="text/css">
        .videoObject{
            border : 12px solid black;
            background : grey;
            height : 500px;
            width : 700px;
        }
    </style>
</head>

<body>    
    <div class="videoObject">
        <video src="" id="videoElement" autoplay="true" width="700" height="500"></video>
    </div>




<script>
var video = document.querySelector("#videoElement");

if(navigator.mediaDevices.getUserMedia){
    navigator.mediaDevices.getUserMedia({
        video : true
    }).then(function(stream){
        video.srcObject = stream
        video.play();
    }).catch(function(error){
        console.log(error);
    });
}</script>

</body>
</html>