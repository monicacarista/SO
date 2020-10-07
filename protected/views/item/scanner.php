
<!DOCTYPE html>
<html>
   <head>
      <title>BridgeIt  Scan </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
      <link rel="icon" type="image/png" href="favicon.png"/>
      <meta name="apple-mobile-web-app-capable" content="yes" />
      
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,600,300,400' rel='stylesheet' type='text/css'/>
      <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css"/>
      <link rel="stylesheet" href="css/mobile.css" type="text/css" />
      <link rel="stylesheet" href="css/syntax.css" type="text/css" />
      
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=geometry"></script>
      <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
      
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
	    <h1><span class="bridge-font-color">BridgeIt</span></h1>
	</div>

        <div data-role="content">
            <div>
    <h2>Native Scanning</h2>
    <fieldset class="desc">
        <div class="row"><p class="normalText">Scan a QR Code with a simple line of JavaScript...</p></div>
        <div class="row shown-xs">
<figure class="highlight"><pre><code class="language-javascript" data-lang="javascript"><span class="nx">bridgeit</span><span class="p">.</span><span class="nx">scan</span><span class="p">(</span><span class="s1">'myId'</span><span class="p">,</span> 
  <span class="nx">callback</span><span class="p">);</span></code></pre></figure>
        </div>
        <div class="row hidden-xs">
<figure class="highlight"><pre><code class="language-javascript" data-lang="javascript"><span class="nx">bridgeit</span><span class="p">.</span><span class="nx">scan</span><span class="p">(</span><span class="s1">'myId'</span><span class="p">,</span> <span class="nx">callback</span><span class="p">);</span></code></pre></figure>
        </div>
    </fieldset>
    
    <a id="scanBtn" type="button" class="btn"
        onclick="bridgeit.scan('scanBtn','onAfterCaptureScan');">Scan a Code</a>
        
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
        var row2 = document.createElement('div');
        row2.setAttribute('class','row');
        row2.innerHTML = text;
        scans.insertBefore(row1, scans.firstChild);
        scans.insertBefore(row2, scans.firstChild);
    }
    </script>
</div>

        </div>
        	<div data-role="footer" data-id="footer" > 
	    <a href="#" class="icesoft-link" data-role="none">
	        <img src="images/icesoft-logo-bw-2x.png"/>
	    </a>
		<div class="copyright">&copy;&nbsp;2002-2013 ICEsoft Technologies Inc. All rights reserved.</div>
		<a href="https://github.com/bridgeit" data-role="none"><i class="icon-github"></i></a>
		<a href="https://twitter.com/BridgeItApp" data-role="none"><i class="icon-twitter-sign"></i></a>
		<a href="https://www.facebook.com/bridgeitmobi" data-role="none"><i class="icon-facebook-sign"></i></a>
	</div> 
        <script type="text/javascript">
        setMinContentHeight();
        $(document).bind('pageshow', setMinContentHeight);
        $(window).bind('orientationchange', setMinContentHeight);
        $(window).bind('resize', setMinContentHeight);
        </script>
    </div>
    <div id="getBridgeItPopup" style="opacity: 0;display:none;" class="ui-body-c">
        <a id="closeGetBridgePopup" onclick="closeGetBridgeItPopup();"><i class="icon-remove-sign"></i></a>
        <p>Missing BridgeIt native features..would you like to download the BridgeIt utility app now?</p>
        <a id="appStoreLink" href="http://www.icesoft.org/projects/ICEmobile/containers.jsf"
            class="whiteButton bridgeItBtn" onclick="return closeGetBridgeItPopup();" target="_blank">Download the utility app now</a>
    </div>
</body>
</html>

