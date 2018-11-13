<?php include("header.php"); ?>

<!-- Inner Section -->
<div class="inner_banner">
    <img src="assets/images/inner_banner.jpg" alt="" class="img-responsive" />
    <div class="innerbanner_text">I-ATP</div>
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
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Your First Name</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" id="first_name" maxlength="50" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Your Last Name</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="last_name" id="last_name" maxlength="50" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Your Email Address</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" id="email" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Your Contact Number</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contact" id="contact" maxlength="10" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Your Company Name</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="company_name" id="company_name" maxlength="100"  />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5"><span class="error_span">*</span> Your Designation</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="designation" id="designation" maxlength="100"  />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5">Comments</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comments" id="comments" maxlength="500"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label class="pull-right mt-5">How many times attended ATP event previously?</label>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <!-- <div class="form-group"> -->
                                        <!-- <div class="radio_box"> -->
                                            <input type="radio" name="attend" value="One" id="attend"/>
                                            <label for="One">One</label> <br>
                                            <input type="radio" name="attend" value="Two" id="attend"/>
                                            <label for="Two">Two</label> <br>
                                            <input type="radio" name="attend" value="More" id="attend"/>
                                            <label for="More">More</label> <br>
                                        <!-- </div> -->
                                    <!-- </div> -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4" id="error" style="color: red"></div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-btn">
                                    <button type="submit" class="lgn_btn margin_top" id="btn"><span>Submit</span></button>
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
	$('.text-danger').remove();
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
				alert("Inquiry added successfully.Check your mail.");
				location.href = '<?php echo $this->config->base_url(); ?>'+'/ThankYou';
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