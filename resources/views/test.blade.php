<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>croppic</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/croppic/bootstrap.css')}}">


    <!-- Custom styles for this template -->
    <link href="{{asset('css/croppic/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/croppic.css')}}" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Mrs+Sheppards&subset=latin,latin-ext' rel='stylesheet' type='text/css'>



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <h1 class="logo">croppic</h1>
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="scrollToLink" data-scroll="examplesTarget" >examples</a></li>
                <li><a class="scrollToLink" data-scroll="documentationTarget" >docs</a></li>
                <li><a class="scrollToLink" data-scroll="downloadTarget">download</a></li>
                <li><a href="https://github.com/sconsult/croppic">github</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div id="headerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- <img class="logoImg" src="assets/img/logo.png" /> -->

                <span class="logoHeader">croppic</span>
                <h2>is an image cropping jquery plugin that will satisfy your needs and much more</h2>

                <a href="#" class="downloadButton" >download <sup>v1.0.1</sup></a>
                <!--
                form class="form-inline" role="form">
                  <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email address">
                  </div>
                  <button type="submit" class="btn btn-warning btn-lg">Invite Me!</button>
                </form>
                -->
            </div><!-- /col-lg-6 -->
            <div class="col-lg-6 cropHeaderWrapper">
                <div id="croppic"></div>
                <span class="btn" id="cropContainerHeaderButton">click here to try it</span>
            </div><!-- /col-lg-6 -->

        </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /headerwrap -->

<div class="container">
    <div class="row mt centered">
        <div class="col-lg-12">
            <h2 style="border-bottom:1px solid #ccc; padding-bottom:20px;">croppic is supported on current browsers, such as chrome, firefox, IE, safari and opera</h2>
        </div>
    </div><!-- /row -->
    <div class="row mt centered">
        <div class="col-lg-12">
            <h1 id="examplesTarget" style="border-bottom:1px solid #ccc; padding-bottom:20px;">EXAMPLES</h1>
        </div>
    </div><!-- /row -->
    <div class="row mt ">
        <div class="col-lg-4 ">
            <h4 class="centered"> MODAL </h4>
            <p class="centered">( open in modal window )</p>
            <div id="cropContainerModal"></div>
        </div>

        <div class="col-lg-4 ">
            <h4 class="centered"> OUTPUT </h4>
            <p class="centered">( display url after cropping )</p>
            <div id="cropContaineroutput"></div>
            <input type="text" id="cropOutput" style="width:100%; padding:5px 4%; margin:20px auto; display:block; border: 1px solid #CCC;" />
        </div>

        <div class="col-lg-4 ">
            <h4 class="centered"> EYECANDY </h4>
            <p class="centered">( no background image )</p>
            <div id="cropContainerEyecandy"></div>
        </div>
    </div>
    <div class="row mt ">
        <div class="col-lg-4 ">
            <h4 class="centered"> Minimal Controls </h4>
            <p class="centered">( define the controls available )</p>
            <div id="cropContainerMinimal"></div>
        </div>
        <div class="col-lg-4 ">
            <h4 class="centered"> Preload </h4>
            <p class="centered">( if the picture is already available )</p>
            <div id="cropContainerPreload"></div>
        </div>
        <div class="col-lg-4 ">
            <div id="cropContainerPlaceHolder2"></div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row mt centered">
        <div class="col-lg-12">
            <h1 id="documentationTarget" style="border-bottom:1px solid #ccc; padding-bottom:20px;">DOCUMENTATION</h1>
        </div>
    </div><!-- /row -->

    <div class="row mt ">
        <div class="col-lg-4 optionsDiv" id="optionsFloating">
            <h2 class="">OPTIONS</h2>
            <a class="scrollToLink" data-scroll="optionTarget-uploadUrl">uploadUrl</a>
            <a class="scrollToLink" data-scroll="optionTarget-uploadData">uploadData</a>
            <a class="scrollToLink" data-scroll="optionTarget-cropUrl">cropUrl</a>
            <a class="scrollToLink" data-scroll="optionTarget-cropData">cropData</a>
            <a class="scrollToLink" data-scroll="optionTarget-preloadImage">preloadImage</a>
            <a class="scrollToLink" data-scroll="optionTarget-controls">defineControls</a>
            <a class="scrollToLink" data-scroll="optionTarget-outputUrlId">outputUrlId</a>
            <a class="scrollToLink" data-scroll="optionTarget-customUploadButtonId">customUploadButtonId</a>
            <a class="scrollToLink" data-scroll="optionTarget-modal">modal</a>
            <a class="scrollToLink" data-scroll="optionTarget-loaderHtml">loaderHtml</a>
            <a class="scrollToLink" data-scroll="optionTarget-processInline">processInline</a>
            <a class="scrollToLink" data-scroll="optionTarget-imgEyecandy">imgEyecandy options</a>
            <a class="scrollToLink" data-scroll="optionTarget-callbacks">CALLBACKS</a>
            <a class="scrollToLink" data-scroll="optionTarget-methods">METHODS</a>



        </div><!--/col-lg-4 -->



        <div class="col-lg-8 col-lg-offset-4">
            <h2 class="centered">INITIALISATION</h2>
            <p class="centered">Simplest implementation. Beware that you must provide width and height of the container. </p>
            <h3 class="centered">JS</h3>
            <pre>
		var cropperHeader = new Croppic('yourId');
				</pre>

            <h3 class="centered">HTML</h3>
            <pre>
		&lt;div id="yourId"&gt;&lt;/div&gt;
				</pre>

            <h3 class="centered">CSS</h3>
            <pre>
		#yourId {
			width: 200px;
			height: 150px;
			position:relative; /* or fixed or absolute */
		}
				</pre>


            <hr id="optionTarget-uploadUrl"/>

            <h2 class="centered">UPLOAD URL</h2>
            <p class="centered">Path to your img upload proccessing file.</p>

            <h3 class="centered">JS</h3>
            <pre>

		var cropperOptions = {
			uploadUrl:'path_to_your_image_proccessing_file.php'
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>


            <p class="centered">
                You will be receiving the image file via AJAX POST method as multipart/form-data; <br/>
                (note that ajax is limited to same domain requests)
            </p>

            <a class="downloadLink" target="_blank" href="img_save_to_file.zip" download="img_save_to_file.zip"><i class="downloadIcon small"></i> <span> Download php example file </span>  </a>

            <p class="centered" style="margin-top:20px;">After successful image saving, you must return the following json. <br/> ( image width and height required for limiting max zoom, so images dont come out blurry. )
            <pre>
			{
				"status":"success",
				"url":"path/img.jpg",
				"width":originalImgWidth,
				"height":originalImgHeight
			}
				</pre>

            <p class="centered" style="margin-top:20px;">In case of error response<p>
            <pre>
			{
				"status":"error",
				"message":"your error message text"
			}
				</pre>
            </p>

            <hr id="optionTarget-uploadData"/>

            <h2 class="centered">UPLOAD DATA</h2>
            <p class="centered">Additional data you want to send to your image upload proccessing file</p>

            <h3 class="centered">JS</h3>
            <pre>

		var cropperOptions = {
			uploadUrl:'path_to_your_image_proccessing_file.php',
			uploadData:{
				"dummyData":1,
				"dummyData2":"text"
			}
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>

            <hr id="optionTarget-cropUrl"/>

            <h2 class="centered">CROP URL</h2>
            <p class="centered">Path to your img crop proccessing file.</p>

            <h3 class="centered">JS</h3>
            <pre>

		var cropperOptions = {
			cropUrl:'path_to_your_image_cropping_file.php'
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>


            <p class="centered">
                You will be receiving the following data via AJAX POST method as multipart/form-data; <br/>
                (note that ajax is limited to same domain requests)
            </p>
            <pre>
	imgUrl 		// your image path (the one we recieved after successfull upload)

	imgInitW  	// your image original width (the one we recieved after upload)
	imgInitH 	// your image original height (the one we recieved after upload)

	imgW 		// your new scaled image width
	imgH 		// your new scaled image height

	imgX1 		// top left corner of the cropped image in relation to scaled image
	imgY1 		// top left corner of the cropped image in relation to scaled image

	cropW 		// cropped image width
	cropH 		// cropped image height
			</pre>
            <a class="downloadLink" target="_blank" href="img_crop_to_file.zip" download="img_crop_to_file.zip"><i class="downloadIcon small"></i> <span> Download php example file <span>  </a>

            <p class="centered" style="margin-top:20px;">After successful image saving, you must return the following json. <br/> ( image width and height required for limiting max zoom, so images dont come out blurry. )
            <pre>
			{
				"status":"success",
				"url":"path/croppedImg.jpg"
			}
			</pre>

            <p class="centered" style="margin-top:20px;">In case of error response<p>
            <pre>
			{
				"status":"error",
				"message":"your error message text"
			}
				</pre>
            </p>

            <hr id="optionTarget-cropData"/>

            <h2 class="centered">CROP DATA</h2>
            <p class="centered">Additional data you want to send to your image crop proccessing file</p>

            <h3 class="centered">JS</h3>
            <pre>

		var cropperOptions = {
			customUploadButtonId:'path_to_your_image_proccessing_file.php',
			cropData:{
				"dummyData":1,
				"dummyData2":"text"
			}
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>

            <hr id="optionTarget-preloadImage"/>

            <h2 class="centered">Preload Image</h2>
            <p class="centered">Load an Image which is already on the Server</p>

            <h3 class="centered">JS</h3>
            <pre>

		var cropperOptions = {
			cropUrl:'path_to_your_image_cropping_file.php',
			loadPicture:'path-to-your-image'
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>

            <hr id="optionTarget-controls"/>

            <h2 class="centered">Controls</h2>

            <p class="centered">
                doubleZoomControls adds two extra zoom controls for 10*zoomFactor zoom (default is true)<br/>
                zoomFactor zooms the image for the value in pixels (default is 10)<br/>
                rotateControls adds two extra rotate controls for left and right rotation (default is true)<br/>
                rotateFactor rotates the image for the value(default is 5)</p>

            <h3 class="centered">JS</h3>
            <pre>

		var cropperOptions = {
			zoomFactor:10,
			doubleZoomControls:true,
			rotateFactor:10,
			rotateControls:true
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>

            <hr id="optionTarget-outputUrlId"/>

            <h2 class="centered">OUTPUT URL</h2>
            <p class="centered">After successful image cropping, cropped img url is set as value for the input containing the outputUrlId</p>

            <h3 class="centered">HTML</h3>
            <pre>
		&lt;input type="text" id="myOutputId"&gt;
				</pre>

            <h3 class="centered">JS</h3>
            <pre>

		var cropperOptions = {
			outputUrlId:'myOutputId'
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);

				</pre>

            <hr id="optionTarget-customUploadButtonId"/>

            <h2 class="centered">CUSTOM UPLOAD BUTTON</h2>
            <p class="centered">If you want a custom upload img button, just like in the first example <a href="#">here</a></p>

            <h3 class="centered">JS</h3>
            <pre>
		var cropperOptions = {
			customUploadButtonId:'myDivId'
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>

            <hr id="optionTarget-modal"/>

            <h2 class="centered">MODAL</h2>
            <p class="centered">If you want to open the cropping in modal window (default is false)</p>

            <h3 class="centered">JS</h3>
            <pre>

		var cropperOptions = {
			modal:true
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>

            <hr id="optionTarget-loaderHtml"/>

            <h2 class="centered">LOADER HTML</h2>
            <p class="centered">
                If you want to open the cropping in modal window (default is false) <br />
                <b>THE WRAPPING DIV MUST CONTAIN "LOADER" CLASS</b>
            </p>

            <h3 class="centered">JS</h3>
            <pre>

		var cropperOptions = {
			loaderHtml:'&lt;img class="loader" src="loader.png" &gt;'
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>

            <hr id="optionTarget-processInline"/>

            <h2 class="centered">Process Inline</h2>
            <p class="centered">
                If you want to handle the Initial Fileupload in Javascript(Filereader) rather then on Server side (default is false) <br />
                <b>NOT ALL BROWSERS SUPPORT THE FILEREADER API: EXAMPLE IE10+ IS SUPPORTED</b>
            </p>

            <h3 class="centered">JS</h3>
            <pre>		7

		var cropperOptions = {
			processInline:true,
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);


				</pre>

            <hr id="optionTarget-imgEyecandy"/>

            <h2 class="centered">IMG EYECANDY</h2>
            <p class="centered">
                Transparent image showing current img zoom <br/>
                <b>TIP:</b> to prevent layout breaking, set the parent div of the cropper to "overflow":"hidden"
            </p>

            <h3 class="centered">JS</h3>
            <pre>
		var cropperOptions = {
			imgEyecandy:true,
			imgEyecandyOpacity:0.2
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);

				</pre>


            <hr id="optionTarget-callbacks"/>

            <h2 class="centered">CALLBACKS</h2>

            <p> Some callbacks ( open your console and watch the output as you mess arround with the <a href="#">example cropper</a> )</p>
            <p> </p>

            <h3 class="centered">JS</h3>
            <pre>
		var cropperOptions = {
			onBeforeImgUpload: 	function(){ console.log('onBeforeImgUpload') },
			onAfterImgUpload: 	function(){ console.log('onAfterImgUpload') },
			onImgDrag:		function(){ console.log('onImgDrag') },
			onImgZoom:		function(){ console.log('onImgZoom') },
			onBeforeImgCrop: 	function(){ console.log('onBeforeImgCrop') },
			onAfterImgCrop:		function(){ console.log('onAfterImgCrop') },
			onReset:		function(){ console.log('onReset') },
			onError:		function(errormsg){ console.log('onError:'+errormsg) }
		}

		var cropperHeader = new Croppic('yourId', cropperOptions);
			</pre>

            <hr id="optionTarget-methods"/>

            <h2 class="centered">METHODS</h2>

            <h3 class="centered">JS</h3>
            <pre>
		var cropper = new Croppic('yourId', cropperOptions);

		cropper.destroy() 	// no need explaining here :)
		cropper.reset() 	// destroys and then inits the cropper

			</pre>

        </div><!--/col-lg-4 -->
    </div><!-- /row -->
</div><!-- /container -->


<div class="container" style="margin-top:50px;">
    <div class="row mt centered">
        <div class="col-lg-12">
            <h1 id="downloadTarget" style="border-bottom:1px solid #ccc; padding-bottom:20px;">DOWNLOAD</h1>
        </div>
    </div><!-- /row -->

    <div class="row mt" style="padding:50px 0;">
        <div class="col-lg-6 ">
            <a class="downloadLink" target="_blank" href="croppicWeb.zip" download="croppicWeb.zip"><i class="downloadIcon small"></i> <span> Download whole website </span>  </a>
        </div>
        <div class="col-lg-6 ">
            <a class="downloadLink" target="_blank" href="croppic.zip" download="croppic.zip"><i class="downloadIcon small"></i> <span> Download croppic </span>  </a>
        </div>

    </div>

</div>

<div id="copyright">
    <p>	- NO PIXELS WERE HARMED DURING THE PRODUCTION OF THIS WEBSITE -	</p>
    <div id="web_by"><img src="assets/img/steinlinconsulting.png" />	 <img id="jobotic" src="assets/img/jobotic.png"> <label> Visit us!</label> </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
<script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>

<script src="{{asset('js/croppic/bootstrap.js')}}"></script>
{{--<script src="assets/js/jquery.mousewheel.min.js"></script>--}}
<script src="{{asset('js/croppic/croppic.min.js')}}"></script>
<script src="{{asset('js/croppic/main.js')}}"></script>
<script>
    var croppicHeaderOptions = {
        //uploadUrl:'img_save_to_file.php',
        cropData:{
            "dummyData":1,
            "dummyData2":"asdas"
        },
        cropUrl:'img_crop_to_file.php',
        customUploadButtonId:'cropContainerHeaderButton',
        modal:false,
        processInline:true,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
    }
    var croppic = new Croppic('croppic', croppicHeaderOptions);


    var croppicContainerModalOptions = {
        uploadUrl:'img_save_to_file.php',
        cropUrl:'img_crop_to_file.php',
        modal:true,
        imgEyecandyOpacity:0.4,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
    }
    var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);


    var croppicContaineroutputOptions = {
        uploadUrl:'img_save_to_file.php',
        cropUrl:'img_crop_to_file.php',
        outputUrlId:'cropOutput',
        modal:false,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
    }

    var cropContaineroutput = new Croppic('cropContaineroutput', croppicContaineroutputOptions);

    var croppicContainerEyecandyOptions = {
        uploadUrl:'img_save_to_file.php',
        cropUrl:'img_crop_to_file.php',
        imgEyecandy:false,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
    }

    var cropContainerEyecandy = new Croppic('cropContainerEyecandy', croppicContainerEyecandyOptions);

    var croppicContaineroutputMinimal = {
        uploadUrl:'img_save_to_file.php',
        cropUrl:'img_crop_to_file.php',
        modal:false,
        doubleZoomControls:false,
        rotateControls: false,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
    }
    var cropContaineroutput = new Croppic('cropContainerMinimal', croppicContaineroutputMinimal);

    var croppicContainerPreloadOptions = {
        uploadUrl:'img_save_to_file.php',
        cropUrl:'img_crop_to_file.php',
        loadPicture:'/js/croppic/depositphotos_106625060-stock-photo-young-beautiful-sexy-girl-blond.jpg',
        enableMousescroll:true,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
    }
    var cropContainerPreload = new Croppic('cropContainerPreload', croppicContainerPreloadOptions);


</script>
</body>
</html>
