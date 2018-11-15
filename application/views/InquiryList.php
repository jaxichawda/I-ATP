<?php include("header.php"); ?>
<div class="inner_content table-list">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page_content">
				<div id="page-wrapper">
					<!--  page header -->
					<!-- <h1 class="page-header pull-left">I-ATP 2018 attendees list</h1>-->
					<h1 class="text-center">I-ATP 2018 Attendees List</h1>
					<div class="separator text-center"><span class="dott"></span><span class="dott"></span><span class="dott"></span></div>
					<div class="btn-group pull-right add-right">
					</div>
					<div class="clearfix"></div>
					<!-- end  page header -->
					<!-- Advanced Tables -->
							<table class="table table-bordered" id="dataTables-example" style="width:100%">
							<thead>
							<tr>
							<!-- <th style="width:2%;">Sr. No.</th> -->
							<th>Sr No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact No.</th>
							<th>Company Name</th>
							<th>Designation</th>
							<th>Attended ATP</th>
							<th>Comments</th>
							</tr>
							</thead>
							<tbody>

							<?php 
							$i=0; 
							foreach ($h->result() as $row)  
							{  $i++;
							?>
							<tr>  
							<td><?php echo $i;?></td>
							<td><?php echo $row->FirstName." ".$row->LastName;?></td>  
							<td><?php echo $row->Email;?></td>  
							<td><?php echo $row->ContactNo;?></td>  
							<td><?php echo $row->CompanyName;?></td>  
							<td><?php echo $row->Designation;?></td>  
							<td><?php echo $row->AttendedATP;?></td>  
							<td><?php if($row->Comments != null){echo $row->Comments;}else{echo "No Comments";}?></td>  
							</tr>  
							<?php }  
							if($h->result()==null){
							?>  
							<tr>
							<td colspan="8" class="text-center">There is no record found</td>
							</tr>
							<?php
							}
							?>
							<!-- <td>
							<div class="inline_delbtn tooltip_inline" data-placement="bottom" title="Print HR Questionnaire Form">
							<button class="btn btn-suucess btn-rounded btn-sm edit-user-row-with-ajax-button" (click)="viewCandidate(candidate.CandidateId)"><i
							class="fa fa-print"></i></button>
							</div>
							</td> -->

							</tbody>
							</table>
						</div>
						<!--End Advanced Tables -->
						</div>
				</div>
				<!-- end page-wrapper -->
		</div>
	</div>
</div>

<?php include("footer.php"); ?>
<script type="text/javascript">
	$(document).ready(function() {
	$('#dataTables-example').dataTable({
	responsive: {
	details: {
	display: $.fn.dataTable.Responsive.display.childRowImmediate,
	type: ''
	}
	},
	scrollCollapse: true,   
	dom: 'Bfrtip',
	buttons: [
	{
	extend: 'excel',
	title: 'Inquiry List',
	exportOptions: {
	columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
	}
	},
	]
	} );
	$('.buttons-excel').attr('data-original-title', 'Export').tooltip();
	$('#dataTables-example_filter input').addClass('input-sm');
	} );
</script>