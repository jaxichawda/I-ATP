<!-- Start Footer --> 
<footer>
		<div class="footer_top">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="header_address">
					<div class="address"><i class="flaticon-placeholder" aria-hidden="true"></i><span><strong>Suite #405, Iscon Atria 1,</strong><br>Gotri Road, Vadodara 390021</span></div>
					<div class="address"><i class="flaticon-smartphone" aria-hidden="true"></i><span><strong>Call Us Now</strong><br><a href="tel:+91 265.298.3937">+91 265.298.EYES (3937)</a></span></div>
					<div class="address"><i class="flaticon-mail" aria-hidden="true"></i><span><strong>Send Us Email</strong><br><a href="mailto:info@theopeneyes.com">info@theopeneyes.com</a></span></div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="footer_bottom">
			<div class="footer_contact">
				<div class="col-md-3 col-sm-3 col-xs-12 partner">
					<img src="assets/images/microsoft-iso.png" alt="" class="img-responsive" />
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12 cntcticons">
					<p><img src="assets/images/call.png" alt="" class="img-responsive" /> +91 265.298.EYES</p>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12 cntcticons">
					<p><img src="assets/images/emailer.png" alt="" class="img-responsive" /> info@theopeneyes.com</p>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12 cntcticons">
					<p><img src="assets/images/website.png" alt="" class="img-responsive" /> www.theopeneyes.com</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="footer_address">
				<ul>
					<li>Washington DC</li>
					<li>Sterling VA</li>
					<li>Vadodara, India</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		
			<!-- <div class="col-md-6 col-sm-6 text-left footer-left">&copy; 2018 <a href="http://theopeneyes.com/" target="_blank">OpenEyes Software Solutions Pvt. Ltd</a></div>
				<div class="col-md-6 col-sm-6 text-right footer-right">
					<ul class="social_links">
						<li><a href="https://twitter.com/OpenEyesTech" target="_blank"><i class="flaticon-twitter-logo-silhouette" aria-hidden="true"></i></a></li>
						<li><a href="https://www.linkedin.com/company/13243146/" target="_blank"><i class="flaticon-linkedin" aria-hidden="true"></i></a></li>
					</ul>
				</div> -->
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
<script type="text/javascript" src="assets/js/jszip.min.js"></script>
<script type="text/javascript" src="assets/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/sweetalert2.min.js"></script>
<!-- End Scripts -->

</body>
</html>