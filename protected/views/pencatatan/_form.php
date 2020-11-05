
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>


<?php
/* @var $this PencatatanController */
/* @var $model Pencatatan */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pencatatan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

  
<html>
   <head>
      
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
      <link rel="icon" type="image/png" href="favicon.png"/>
      <meta name="apple-mobile-web-app-capable" content="yes" />
       -->
      <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,600,300,400' rel='stylesheet' type='text/css'/>
      <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css"/>
      <link rel="stylesheet" href="css/mobile.css" type="text/css" />
      <link rel="stylesheet" href="css/syntax.css" type="text/css" />
       -->
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=geometry"></script>
      <!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
      <!-- <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
       -->
      <!-- bridgeit.js UNSTABLE VERSION -->
      <script type="text/javascript" src="http://bridgeit.github.io/bridgeit.js/src/bridgeit.js"></script>
      
      <!-- bridgeit.js STABLE VERSION 
      <script type="text/javascript" src="http://api.bridgeit.mobi/bridgeit/v1.x-latest/bridgeit.js"></script>
      -->

      <script type="text/javascript" src="http://bridgeit.github.io/bridgeit.io.js/lib/bridgeit.io.js"></script>
      
      
      <script type="text/javascript" src="javascript/bridgeit-demos.js"></script>

      <!-- APP ICONS -->
      <link rel="apple-touch-icon" href="images/touch-icon-iphone.png"/>
      <link rel="apple-touch-icon" sizes="76x76" href="images/touch-icon-ipad.png"/>
      <link rel="apple-touch-icon" sizes="120x120" href="images/touch-icon-iphone-retina.png"/>
      <link rel="apple-touch-icon" sizes="152x152" href="images/touch-icon-ipad-retina.png"/>
      <link rel="apple-touch-startup-image" href="images/touch-startup-image.png"/>

      <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

         ga('create', 'UA-45568600-1', 'bridgeit.mobi');
         ga('send', 'pageview');

      </script>
   </head>

<body>
    <div data-role="page" id="scan" >  
        	<div data-role="header" class="hdr demo" data-id="header">
	    <a class="btnBack" href="./index.html" data-dom-cache="true"
	    	data-transition="slide" data-direction="reverse" >
	    	<i class="icon-chevron-left"></i>
	    </a>
	  
	        </div>

    <div data-role="content">
     
    
        
    <fieldset id="scans">
    </fieldset>
        <script type="text/javascript">
        function onAfterCaptureScan(event)  {
            console.log('onAfterCaptureScan: ' + JSON.stringify(event));
            var HTTP = "http";
            var text = event.value;
          
            if (HTTP == text.substring(0, HTTP.length))  {
          
                text = "<span class='ellipsis'><a href='" + text + "'>" + text + "</a></span>";
            }
            
          
            var scans = document.getElementById("scans");
            var row1 = document.createElement('div');
            row1.setAttribute('class','row timestamp');
            row1.innerHTML = "<span class='ellipsis'>Scanned on " + new Date() + "</span>";
            $("#Pencatatan_id_item").val(text)
            var row2 = document.createElement('div');
            row2.setAttribute('class','row');
            row2.innerHTML = text;
           scans.insertBefore(row1, scans.firstChild);
            scans.insertBefore(row2, scans.firstChild);
           selectID();
        }
        </script>
  </div>
 
        <!-- <script type="text/javascript">
        setMinContentHeight();
        $(document).bind('pageshow', setMinContentHeight);
        $(window).bind('orientationchange', setMinContentHeight);
        $(window).bind('resize', setMinContentHeight);
        </script> -->
  </div>
        <div id="getBridgeItPopup" style="opacity: 0;display:none;" class="ui-body-c">
            <a id="closeGetBridgePopup" onclick="closeGetBridgeItPopup();"><i class="icon-remove-sign"></i></a>
            <p>Missing BridgeIt native features..would you like to download the BridgeIt utility app now?</p>
            <a id="appStoreLink" href="http://www.icesoft.org/projects/ICEmobile/containers.jsf"
                class="whiteButton bridgeItBtn" onclick="return closeGetBridgeItPopup();" target="_blank">Download the utility app now</a>
        </div>
</body>
</html>
</html>

<div class="container">
        
   <div class="row">
      <div class="col-25">
        <label for="id_item">Nama Item</label>
      </div>
      <div class="col-75">
            <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name'=>'nama_item',
        'attribute' => 'id_item',
        'id'=>'nama_item',
        'value'=>$model->id_item ? $model->item->nama_item:'',
        'source'=>'js: function(request, response) {
          $.ajax({
            url: "'.$this->createUrl('Pencatatan/cariitem').'",
            dataType: "json",
            data: {
              term: request.term,
              brand: $("#Pencatatan_id_item").val()
            },
            success: function (data) {
               response(data);
               
            }
          })
        }',
        //'sourceUrl' => array('carianggota'),
        //'source'=>$this->createUrl('kegiatan/carianggota'),
        'options'=>array(
          'minLength'=>'1',
          'focus'=> 'js:function( event, ui ) {
            $( "#Pencatatan_id_item" ).val( ui.item.label );
            return false;
          
          }',
          'search'=>"js: function(event, ui) {
            $('#Pencatatan_id_item').val();
       
          
          }",
          'select'=>'js:function( event, data ) {
           
            $(\'#kode_item\').val(data.item.kode_item);
            $(\'#Pencatatan_id_item\').val(data.item.id_item);
           
          }', 
          
        ),
      ));
      ?> 
  
      </div>
    </div>
    <br>
  <div class="row">
       <div class="col-md-4 col-lg-2">
    <a id="scanBtn" type="button" class=" btn btn-success btn-sm btn-block "
        onclick="bridgeit.scan('scanBtn','onAfterCaptureScan');">Scan a Code</a>
      </div>
   </div>


    <div class="row">
          <div class="col-25">
            <label for="id_item">Kode Item</label>
          </div>
          <div class="col-75">
                <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'kode_item',
            'attribute' => 'id_item',
          'id'=>'kode_item',
            'value'=>$model->id_item ? $model->item->kode_item:'',
            'source'=>'js: function(request, response) {
              $.ajax({
                url: "'.$this->createUrl('Pencatatan/carikode').'",
                dataType: "json",
                data: {
                  term: request.term,
                  brand: $("#Pencatatan_id_item").val()
                },
                success: function (data) {
                  response(data);
                },
              })
            }',
            //'sourceUrl' => array('carianggota'),
            //'source'=>$this->createUrl('kegiatan/carianggota'),
            'options'=>array(
              'minLength'=>'1',
              'focus'=> 'js:function( event, ui ) {
                $( "#Pencatatan_id_item" ).val( ui.item.label );
                return false;
              
              }',
              'search'=>"js: function(event, ui) {
                $('#Pencatatan_id_item').val();
              }",
              'select'=>'js:function( event, data ) {
          
                //ngesave id item
                $(\'#Pencatatan_id_item\').val(data.item.id_item);     
                $(\'#nama_item\').val(data.item.nama_item);
                  
              }',   
              
            ),
          ));
          ?> 
          </div>
        </div>
            
        <div class="row">
              <div class="col-25">
                <label for="id_item1">Id Item</label>
              </div>
              <div class="col-75">
            <?php echo $form->textField($model,'id_item'); ?>
              </div>
            </div>


  



  <script type = "text/javascript">
  function selectID(){
    var data = "id_item="+$('#Pencatatan_id_item').val();
   //alert(data);
    jQuery.ajax({
      'type':'GET',
      'url':'<?php echo CController::createUrl('Pencatatan/pilihID');?>',
      'data': data,
      'success': function(data){
           $('#nama_item').val(data.nama_item);
           $('#id_item').val(data.id_item);
           $('#kode_item').val(data.kode_item);
          //  console.log(data.nama_item);
          //  console.log(data.id_item);
        //alert(data.nama_item);

      },
      'error':function(data){
        alert('error'+data);
      },'dataType':'json'
    });
      }
  </script>


<div class="row">
		<div class="col-25">
			<label for="id_dtl_item">Batch Number</label>
		</div>
		<div class="col-25">
		<?php 
			$this->widget('ext.select2.ESelect2',array(
			'model'=>$model,
			'attribute'=>'id_dtl_item',
			'data'=>CHtml::listData(
			DtlItem::model()->findAll(), 'id_dtl_item', 'batch'),

			'options'=>array(
			'placeholder'=>'Pilih Batch Number',
			'allowClear'=>true,
			),
			'htmlOptions'=>array(						
			'options'=>array(''=>array('value'=>null,'selected'=>null),
			),
			),		
			)); 
		?>
		</div>
		</div>

    <div class="row">
      <div class="col-25">
        <label for="stok_tempat">Stok</label>
      </div>
      <div class="col-75">
	  <?php echo $form->textField($model,'stok_tempat'); ?>
      </div>
    </div>
    <br>

    <div class="row">
     <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?> 
    </div>

    <?php $this->endWidget(); ?>
  </form>


  
</div>

</body>
