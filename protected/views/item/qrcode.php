<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src ="jquery.min.js"></script>
<script src="instascan.min.js"></script>

<body>
<div class="container">
<div class="row justify-content-center mt-5">
<div class="col-md-5">
<div class="card-header bg-transparent mb-o"><h5 class="text center"><span class="font-weight-bold text-primary">Scan</span></h5></div>
<div class="card-body">

<video id="preview" width="300" height="300"></video>
<div class="form-group">
<input type="text" class="form-control"/>
</div>
</div>
</div>
</div>
</div>


</body>
<!-- 
<script type="text/javascript">

let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        alert(content);
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



</script> -->

