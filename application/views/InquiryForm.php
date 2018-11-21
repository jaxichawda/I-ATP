<?php include("header.php"); ?>

<!-- Inner Section -->
<!--<div class="inner_banner">
    <img src="assets/images/inner_banner.jpg" alt="" class="img-responsive" />
    <div class="innerbanner_text">Your information</div>
</div>
<div class="clearfix"></div>-->
<!-- End Inner Section -->
<!-- Inner Section -->
<div class="inner_content">
    <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
						   <div class="content-area">
	   <div id="main">
	   <h2 class="text-center">Please provide your information</h2>
		<div class="separator text-center"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div>
                        <div class="clearfix"></div>
                        <?php echo form_open("InquiryForm/addInquiry",array("class"=>"form-validate","id"=>"form-user")); ?>
                            <div class="ans_block">
                                <div class="col-md-2 col-sm-3">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> First Name</label>
                                </div>
                                <div class="col-md-4 col-sm-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" id="first_name" maxlength="50" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Last Name</label>
                                </div>
                                <div class="col-md-4 col-sm-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="last_name" id="last_name" maxlength="50" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2 col-sm-3">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Email Address</label>
                                </div>
                                <div class="col-md-4 col-sm-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" id="email" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Mobile Number</label>
                                </div>
                                <div class="col-md-4 col-sm-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contact" id="contact" maxlength="10" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2 col-sm-3">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Organization Name</label>
                                </div>
                                <div class="col-md-4 col-sm-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company_name" id="company_name" maxlength="100"  />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Designation</label>
                                </div>
                                <div class="col-md-4 col-sm-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="designation" id="designation" maxlength="100"  />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2 col-sm-3">
                                    <label class="pull-right atp_title mt-5" style="text-align:right;"><span class="error_span">*</span> Attending ATP for: </label>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <div class="form-group">
                                        <div class="radio_box">
                                            <input type="radio" name="attend" value="First time" id="Firsttime" />
                                            <label for="Firsttime">First time</label> 
                                            <input type="radio" name="attend" value="Second time" id="Secondtime"/>
                                            <label for="Secondtime">Second time</label> 
                                            <input type="radio" name="attend" value="Third time" id="Thirdtime"/>
                                            <label for="Thirdtime">Third time</label>
                                            <input type="radio" name="attend" value="I lost count" id="Ilostcount" />
                                            <label for="Ilostcount">I lost count</label>
                                        </div>
                                    </div>
                                    <span id="radio_error"></span>
                                </div>
                               
                                <!-- <div class="col-md-2 col-sm-3">
                                    <label class="pull-right mt-5">Comments</label>
                                </div>
                                <div class="col-md-4 col-sm-9">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comments" id="comments" maxlength="500"></textarea>
                                    </div>
                                </div> -->
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4" id="error" style="color: red"></div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-btn">
                                    <button type="submit" class="lgn_btn margin_top" id="btn"><span>Submit</span></button><img src="<?php echo base_url();?>assets/images/loader.gif" id="loader" width="30px" height="auto" style="margin-left:15px;display:none;">
                                </div>
                            </div>
                            <?php echo form_close();?>
            </div>
			</div>
			</div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<!-- End Inner Section -->

<?php include("footer.php"); ?>
<script>
$('#form-user').submit(function(e){
	e.preventDefault();
     $('.error_span').remove();
    //$('#radio_error').remove();
    if ($('input[name="attend"]:checked').length == 0) {
         $('#radio_error').text("Please select one option");
         $('#radio_error').addClass('error_span_radio');
    } else {
        $('#radio_error').remove();
    }
        // return false; } 
	$('#btn').prop('disabled', true);
    $('#btn').addClass('disabled');
	$('#loader').show(); 
	
	var me=$(this);
	$.ajax({
		url:me.attr('action'),
		type:'post',
		data:me.serialize(),
		dataType:'json',
		success:function(response){
			if(response.success == true){
				$('#btn').prop('disabled', false);
				$('#loader').hide(); 
				me.trigger("reset");
                // setTimeout(function() {
				// 			swal({
				// 				title: "Thank You",
				// 				type: "success",
				// 				showConfirmButton: false,
				// 				timer: 4000,
				// 			}, function() {
				// 				window.location = "";
				// 			});
				// 		}, 0);
				//alert("Inquiry added successfully.Check your mail.");
				location.href = '<?php echo $this->config->base_url(); ?>'+'ThankYou';
			}
			else if(response.success == 2){ 
				$('#btn').prop('disabled', false);
				$('#loader').hide(); 
                setTimeout(function() {
							swal({
                                title: "Something went wrong!! ",
                                text: "Please try again.",
								type: "warning",
                                showConfirmButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Ok",
                                closeOnConfirm: true
							}, function() {
								window.location = "";
							});
						}, 0);
			}
			else{
				$('#btn').prop('disabled', false);
				$('#loader').hide(); 
				$.each(response.messages,function(key,value){
					var element=$('#' + key);
					element.after(value);
				});
			}
		}
	});
});
</script>