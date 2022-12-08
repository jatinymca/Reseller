		<!-- end page container -->
		<!-- start footer -->
		<div class="page-footer">
			<div class="page-footer-inner"> 2020 &copy; All right reserved By
				<a href="https://www.vert-age.com/" target="_blanck" class="makerCss vert_age">Vert-Age</a>
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="https://momentjs.com/downloads/moment.min.js"></script>
	<script src="assets/plugins/popper/popper.js"></script>
	<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<!-- bootstrap -->
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<script src="assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="assets/js/pages/sparkline/sparkline-data.js"></script>
	<!-- Common js-->
	<script src="assets/js/app.js"></script> 
	<script src="assets/js/layout.js"></script>
	<script src="assets/js/theme-color.js"></script>
	<!-- material -->
	<script src="assets/plugins/material/material.min.js"></script>
	<!--apex chart-->
	<script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="assets/js/pages/chart/chartjs/home-data.js"></script>
	<!-- summernote -->
	<script src="assets/plugins/summernote/summernote.js"></script>
	<script src="assets/js/pages/summernote/summernote-data.js"></script>
	
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
    <script src="js/main.js"></script>
	<!-- favicon -->

	 <script type="text/javascript">
	var objectUrl;

$("#audio").on("canplaythrough", function(e){
    var seconds = e.currentTarget.duration;
    var duration = moment.duration(seconds, "seconds");
    
    var time = "";
    var hours = duration.hours();
    if (hours > 0) { time = hours + ":" ; }
    var part1=parseInt(duration.minutes());
    var part2=parseInt(duration.seconds());
    time = part1*60+part2;
    $("#duration").val(time);
    
    URL.revokeObjectURL(objectUrl);
});

 $("#file").change(function(e){
    var file = e.currentTarget.files[0];
   
    $("#filename").text(file.name);
    $("#filetype").text(file.type);
    $("#filesize").text(file.size);
    
    objectUrl = URL.createObjectURL(file);
    $("#audio").prop("src", objectUrl);
});



function max_size1(set){
 
alert();
}


</script>