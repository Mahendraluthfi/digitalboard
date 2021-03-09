<style>
    .carousel-control-prev,
    .carousel-control-next{
          bottom: 90%;
    }

   
</style>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body bg-lightblue">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">                  
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                    <h3 class="text-center">Requested Project</h3 class="text-center">
                      <div class="table-responsive">                                            
                        <table class="table table-bordered table-striped">
                          <thead class="thead-dark">
                            <tr>
                              <th width="1%">No</th>
                              <th>Project Name</th>
                              <th>Department</th>
                              <th>Category</th>
                              <th>Description</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $no=1; foreach ($request as $data) { ?>
                              <tr class="bg-light">
                                  <td><?php echo $no++ ?></td>    
                                  <td><?php echo $data->projectname ?></td>    
                                  <td><?php echo $data->department ?></td>    
                                  <td><?php echo $data->category ?></td>    
                                  <td><?php echo $data->remarks ?></td>    
                              </tr>
                              <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="carousel-item">
                    <h3 class="text-center">Ongoing Project</h3 class="text-center">
                      <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th width="1%">No</th>
                            <th>Project Name</th>
                            <th>Champion</th>
                            <th>Finish Date</th>
                            <th>Remarks</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($ongoing as $data) { ?>
                            <tr class="bg-light">
                                <td><?php echo $no++ ?></td>    
                                <td><?php echo $data->projectname ?></td>    
                                <td><?php echo $data->champion ?></td>    
                                <td><?php echo $data->finishdate ?></td>    
                                <td><?php echo $data->remarks ?></td>    
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="carousel-item">
                    <h3 class="text-center">Running Project</h3 class="text-center">
                      <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th width="1%">No</th>
                            <th>Project Name</th>
                            <th>Units</th>
                            <th width="30%">Locations</th>
                            <th>Remakrs</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($running as $data) { ?>
                            <tr class="bg-light">
                                <td><?php echo $no++ ?></td>    
                                <td><?php echo $data->projectname ?></td>    
                                <td><?php echo $data->total_loc ?></td>    
                                <td>
                                  <?php foreach ($data->location as $locdata) {
                                    echo  "<span class='badge badge-success'>".$locdata->location."</span>&nbsp;";
                                  } ?>
                                </td>    
                                <td><?php echo $data->remarks ?></td>    
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="carousel-item">
                    <h3 class="text-center">NPI Involvment</h3 class="text-center">
                      <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th width="1%">No</th>
                            <th>Product</th>
                            <th>Style No</th>
                            <th>PDRA</th>
                            <th>PROVO</th>
                            <th>INTEGRATION</th>
                            <th>PP</th>
                            <th>PILOT</th>
                            <th>PSD</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($npi as $data) { ?>
                            <tr class="bg-light">
                                <td><?php echo $no++ ?></td>    
                                <td><?php echo $data->product ?></td>    
                                <td><?php echo $data->style ?></td>    
                                <td><?php echo $data->pdra ?></td>    
                                <td><?php echo $data->provo ?></td>    
                                <td><?php echo $data->integration ?></td>    
                                <td><?php echo $data->pp ?></td>    
                                <td><?php echo $data->pilot ?></td>    
                                <td><?php echo $data->psd ?></td>    
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->         
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      