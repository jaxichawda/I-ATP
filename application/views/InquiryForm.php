<?php include("header.php"); ?>

<!-- Inner Section -->
<div class="inner_banner">
    <img src="assets/images/inner_banner.jpg" alt="" class="img-responsive" />
    <div class="innerbanner_text">Your information</div>
</div>
<div class="clearfix"></div>
<!-- End Inner Section -->
<!-- Inner Section -->
<div class="inner_content">
    <div class="container ">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="clearfix"></div>
                        <?php echo form_open("InquiryForm/addInquiry",array("class"=>"form-validate","id"=>"form-user")); ?>
                            <div class="ans_block">
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> First Name</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" id="first_name" maxlength="50" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Last Name</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="last_name" id="last_name" maxlength="50" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Email Address</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" id="email" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Contact Number</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contact" id="contact" maxlength="10" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Company Name</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company_name" id="company_name" maxlength="100"  />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Designation</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="designation" id="designation" maxlength="100"  />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5" style="text-align:right;"><span class="error_span">*</span> How many times attended ATP event previously?</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <div class="radio_box">
                                            <input type="radio" name="attend" value="Once" id="Once" />
                                            <label for="Once">Once</label> 
                                            <input type="radio" name="attend" value="Twice" id="Twice"/>
                                            <label for="Twice">Twice</label> 
                                            <input type="radio" name="attend" value="More" id="More"/>
                                            <label for="More">More</label>
                                            <input type="radio" name="attend" value="Never" id="Never" />
                                            <label for="Never">Never</label>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5">Comments</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comments" id="comments" maxlength="500"></textarea>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4" id="error" style="color: red"></div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-btn">
                                    <button type="submit" class="lgn_btn margin_top" id="btn"><span>Stay connected</span></button>
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
	$('#btn').prop('disabled', true);
	//$('#loader').show(); 
	$('.error_span').remove();
	var me=$(this);
	$.ajax({
		url:me.attr('action'),
		type:'post',
		data:me.serialize(),
		dataType:'json',
		success:function(response){
			if(response.success == true){
				$('#btn').prop('disabled', false);
				//$('#loader').hide(); 
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
				//$('#loader').hide(); 
				$('#error').html(response.message);
			}
			else{
				$('#btn').prop('disabled', false);
				//$('#loader').hide(); 
				$.each(response.messages,function(key,value){
					var element=$('#' + key);
					element.after(value);
				});
			}
		}
	});
});
</script>