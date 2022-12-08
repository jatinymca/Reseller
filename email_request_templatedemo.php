	<!-- <script src="js/tinymce/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'#pclu-textarea',branding: false });</script> -->
 
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
 <!-- <link rel="stylesheet" href="ckeditor/samples/css/samples.css"> -->
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">



<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card card-box">
			

			<div class="card-body">
			   	<div class="row">	
			   		<div class="col-md-12 col-sm-12">
				
				
				
				        <?php include('drag_drap/editor.php')?>
				
				

                    </div>
                 </div>
             </div>
          </div>
      </div>
</div>
	
<!-- jquery-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.hotkeys.js"></script>

<!-- bootstrap-->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- builder code-->
<script src="libs/builder/builder.js"></script>	
<!-- undo manager-->
<script src="libs/builder/undo.js"></script>	
<!-- inputs-->
<script src="libs/builder/inputs.js"></script>	


<!-- media gallery -->
<link href="libs/media/media.css" rel="stylesheet">
<script>
window.mediaPath = 'media';
</script>
<script src="libs/media/media.js"></script>	
<script src="libs/media/ccsearch.js"></script>
<script src="libs/builder/plugin-media.js"></script>	

<!-- bootstrap colorpicker //uncomment bellow scripts to enable -->
<!--
<script src="libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<link href="libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<script src="libs/builder/plugin-bootstrap-colorpicker.js"></script>
-->

<!-- components-->
<!-- script src="libs/builder/components-server.js"></script -->	
<script src="libs/builder/components-common.js"></script>	
<!-- script src="libs/builder/components-elements.js"></script -->	
<script src="libs/builder/components-bootstrap5.js"></script>	
<script src="libs/builder/components-widgets.js"></script>	
<script src="libs/builder/components-html.js"></script>	

<!-- sections-->
<script src="libs/builder/sections-bootstrap4.js"></script>	

<!-- blocks-->
<script src="libs/builder/blocks-bootstrap4.js"></script>	

<!-- plugins -->

<!-- code mirror - code editor syntax highlight -->
<link href="libs/codemirror/lib/codemirror.css" rel="stylesheet"/>
<link href="libs/codemirror/theme/material.css" rel="stylesheet"/>
<script src="libs/codemirror/lib/codemirror.js"></script>
<script src="libs/codemirror/lib/xml.js"></script>
<script src="libs/codemirror/lib/formatting.js"></script>
<script src="libs/builder/plugin-codemirror.js"></script>





	


<!-- 
Tinymce plugin
Clone or copy https://github.com/tinymce/tinymce-dist to libs/tinymce-dist 
-->
<!-- 
<script src="libs/tinymce-dist/tinymce.min.js"></script>
<script src="libs/builder/plugin-tinymce.js"></script>	
-->

<!-- 
CKEditor plugin
Unzip the latest ckeditor release zip from https://github.com/ckeditor/ckeditor4/releases to libs/ckeditor 
-->
<!--
<script src="libs/ckeditor/ckeditor.js"></script>
<script src="libs/builder/plugin-ckeditor.js"></script>	
-->

<!-- jszip - download page as zip -->
<!-- script src="libs/jszip/jszip.min.js"></script>
<script src="libs/builder/plugin-jszip.js"></script -->


<!-- autocomplete plugin used by autocomplete input-->
<script src="libs/autocomplete/jquery.autocomplete.js"></script>	

<script>
$(document).ready(function() 
{
	//if url has #no-right-panel set one panel demo
	if (window.location.hash.indexOf("no-right-panel") != -1)
	{
		$("#vvveb-builder").addClass("no-right-panel");
		$(".component-properties-tab").show();
		Vvveb.Components.componentPropertiesElement = "#left-panel .component-properties";
	} else
	{
		$(".component-properties-tab").hide();
	}

	Vvveb.Builder.init('demo/narrow-jumbotron/index.html', function() {
		//run code after page/iframe is loaded
	});

	Vvveb.Gui.init();
	Vvveb.FileManager.init();
	Vvveb.SectionList.init();
	Vvveb.FileManager.addPages(
	[
		{name:"narrow-jumbotron", title:"Jumbotron",  url: "demo/narrow-jumbotron/index.html", file: "demo/narrow-jumbotron/index.html", assets: ['demo/narrow-jumbotron/narrow-jumbotron.css']},
		{name:"landing-page", title:"Landing page",  url: "demo/landing/index-2.html", file: "demo/landing/index-2.html", assets: ['demo/startbootstrap-landing-page/css/landing-page.min.css']},
		{name:"album", title:"Album",  url: "demo/album/index.html", file: "demo/album/index.html", folder:"content", assets: ['demo/album/album.css']},
		{name:"blog", title:"Blog",  url: "demo/blog/index.html", file: "demo/blog/index.html", folder:"content", assets: ['demo/blog/blog.css']},
		{name:"carousel", title:"Carousel",  url: "demo/carousel/index.html",  file: "demo/carousel/index.html", folder:"content", assets: ['demo/carousel/carousel.css']},
		{name:"offcanvas", title:"Offcanvas",  url: "demo/offcanvas/index.html", file: "demo/offcanvas/index.html", folder:"content", assets: ['demo/offcanvas/offcanvas.css','demo/offcanvas/offcanvas.js']},
		{name:"pricing", title:"Pricing",  url: "demo/pricing/index.html", file: "demo/pricing/index.html", folder:"ecommerce", assets: ['demo/pricing/pricing.css']},
		{name:"product", title:"Product",  url: "demo/product/index.html", file: "demo/product/index.html", folder:"ecommerce", assets: ['demo/product/product.css']},
		//uncomment php code below and rename file to .php extension to load saved html files in the editor
		/*
		<?php 
		   $htmlFiles = glob('{my-pages/*.html,demo/*\/*.html, demo/*.html}',  GLOB_BRACE);
		   foreach ($htmlFiles as $file) { 
			   if (in_array($file, array('new-page-blank-template.html', 'editor.html'))) continue;//skip template files
			   $pathInfo = pathinfo($file);
			   $filename = $pathInfo['filename'];
			   $folder = preg_replace('@/.+?$@', '', $pathInfo['dirname']);
			   $subfolder = preg_replace('@^.+?/@', '', $pathInfo['dirname']);
			   if ($filename == 'index' && $subfolder) {
				   $filename = $subfolder;
			   }
			   $url = $pathInfo['dirname'] . '/' . $pathInfo['basename'];
		?>
		{name:"<?php echo ucfirst($filename);?>", file:"<?php echo ucfirst($filename);?>", title:"<?php echo ucfirst($filename);?>",  url: "<?php echo $url;?>", folder:"<?php echo $folder?>"},
		<?php } ?>
		*/
	]);
	
	 Vvveb.FileManager.loadPage("narrow-jumbotron");
	 Vvveb.Breadcrumb.init();
});
</script>
					
					
					
					
					
					
					
					
					
					
				</div>
			</div>
		</div>
	</div>							
</div>


<script type="text/javascript">
	
	function languageradios(){

		var language_radioval = $('input[name="language_radio"]:checked').val();
    
        if(language_radioval==1)   
        {  
            $(".language_div").css({"display": "block"});
        }
        else
        {
            $(".language_div").css({"display": "none"});
        }

	}

</script>

<script>
	initSample();
</script>
