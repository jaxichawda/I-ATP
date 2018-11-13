<?php include("header.php"); ?>

<div id="page-wrapper">
  <div class="container">
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
        <h1 class="page-header pull-left">List of Inquiries</h1>
        <div class="btn-group pull-right add-right">
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- end  page header -->
    </div>
    <div class="row">
      <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTables-example">
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
                    <td><?php echo $row->CompanyName;?></td>  
                    <td><?php echo $row->Designation;?></td>  
                    <td><?php echo $row->ContactNo;?></td>  
                    <td><?php echo $row->AttendedATP;?></td>  
                    <td><?php if($row->Comments != null){echo $row->Comments;}else{echo "No Comments";}?></td>  
                    </tr>  
                <?php }  
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
          </div>
        </div>
        <!--End Advanced Tables -->
      </div>
    </div>
  </div>
</div>
<!-- end page-wrapper -->

<?php include("footer.php"); ?>
<script type="text/javascript">
$(document).ready(function() {
        $('#dataTables-example').dataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excel', className: 'excelButton' }
        ]
    } );
        $('#dataTables-example_filter input').addClass('input-sm');

    } );
</script>