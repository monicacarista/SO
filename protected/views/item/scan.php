
<html>
<head>
	<title>JQuery HTML5 QR Code Scanner using Instascan JS Example - ItSolutionStuff.com</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <script src ="jquery.min.js"></script>
<script src="instascan.min.js"></script> -->

<body>
<div class="container">
<div class="row justify-content-center mt-5">
<div class="col-md-5">
<div class="card-header bg-transparent mb-o"><h5 class="text center"><span class="font-weight-bold text-primary">Scan</span></h5></div>
<div class="card-body">

<video id="preview" width="300" height="300"></video>
<div class="form-group">
<input type="text" id="qrcode" class="form-control"/>
</div>
</div>
</div>
</div>
</div>


</body>

    <h1>JQuery HTML5 QR Code Scanner using Instascan JS Example - ItSolutionStuff.com</h1>
    
    <video id="preview"></video>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        //alert(content);

        $("#qrcode").val(content)  //memnaggil id di jquery
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
   
</body>
</html>