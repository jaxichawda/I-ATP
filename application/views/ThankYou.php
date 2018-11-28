<?php include("header.php"); ?>

<!-- Inner Section -->
<!--<div class="inner_banner">
    <img src="assets/images/inner_banner.jpg" alt="" class="img-responsive" />
    <div class="innerbanner_text">OpenEyes Software Solutions Pvt. Ltd</div>
</div>
<div class="clearfix"></div>-->
<!-- End Inner Section -->

<!-- Inner Section -->
<div class="inner_content">
  <div class="container ">
    <div class="row">
      <div class="col-md-12 col-sm-12">
	   <div class="content-area">
	   <div id="main">
	   <!--<h1 class="text-center">Thank You</h1>
		<div class="separator text-center"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div>-->
          <div class="thankyou_block">
				<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
					<h3>Thank you for sharing your information!</h3>
				</div>
          </div>
          <div class="clearfix"></div>
		  </div>
		  </div>
          </div>
        </div>
      </div>
</div>
<div class="clearfix"></div>
<script>
        var timer = setTimeout(function() {
          location.href = '<?php echo $this->config->base_url(); ?>';  
          //window.location=''
        }, 7000);
    </script>
<!-- End Inner Section --> 

<?php include("footer.php"); ?>