<!-- Start Footer --> 
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 text-left footer-left">Copyrights &copy; 2018 <a href="http://theopeneyes.com/" target="_blank">OpenEyes Software Solutions Pvt. Ltd</a></div>
			<div class="col-md-6 col-sm-6 text-right footer-right">
				<ul class="social_links">
					<li><a href="https://twitter.com/OpenEyesTech" target="_blank"><i class="flaticon-twitter-logo-silhouette" aria-hidden="true"></i></a></li>
					<li><a href="https://www.linkedin.com/company/13243146/" target="_blank"><i class="flaticon-linkedin" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<div class="clearfix"></div>
<!-- End Footer -->

<!-- Start Scripts -->
<script>
setTimeout(function(){
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}
	  },100);
	  $('body').tooltip({
			selector: '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])',
			trigger: 'hover',
			container: 'body'
			}).on('click mousedown mouseup', '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])', function () {
			$('[data-toggle="tooltip"], [title]:not([data-toggle="popover"])').tooltip('destroy');
			});
</script>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>


<script src="assets/js/sweetalert2.min.js"></script>
<!-- End Scripts -->

</body>
</html>