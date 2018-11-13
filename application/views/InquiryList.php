<?php include("header.php"); ?>

<div id="page-wrapper">
  <div class="container">
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
        <h1 class="page-header pull-left">List of Candidates</h1>
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
                    <th style="width:2%;">#</th>
                    <th style="width:8%;">Candidate Name</th>
                    <th style="width:9%;">Candidate Email</th>
                    <th style="width:7%;">Contact Number</th>
                    <th style="width:9%;">Applied for</th>
                    <th style="width:9%;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>{{candidate.CandidateName}}</td>
                    <td>{{candidate.CandidateEmail}}</td>
                    <td>{{candidate.PhoneNumber}}</td>
                    <td>{{candidate.JobPositionName}}</td>
                    <td>
                      <div class="inline_delbtn tooltip_inline" data-placement="bottom" title="Print HR Questionnaire Form">
                        <button class="btn btn-suucess btn-rounded btn-sm edit-user-row-with-ajax-button" (click)="viewCandidate(candidate.CandidateId)"><i
                            class="fa fa-print"></i></button>
                      </div>
                    </td>
                  </tr>
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