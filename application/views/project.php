<style>
    .badge{
        font-size: 14px;
        font-weight: lighter;  
    }
</style>
<div class="row">
  <div class="col-lg-12">
      <div class="card card-pink card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Project Board</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-tab" data-toggle="pill" href="#custom-tabs-one" role="tab" aria-controls="custom-tabs-one" aria-selected="true">Requested Project</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-tab" data-toggle="pill" href="#custom-tabs-two" role="tab" aria-controls="custom-tabs-two" aria-selected="false">Ongoing Project</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-tab" data-toggle="pill" href="#custom-tabs-three" role="tab" aria-controls="custom-tabs-three" aria-selected="false">Running Project</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-tab" data-toggle="pill" href="#custom-tabs-four" role="tab" aria-controls="custom-tabs-four" aria-selected="false">NPI Involvment</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-tab" data-toggle="pill" href="#custom-tabs-five" role="tab" aria-controls="custom-tabs-five" aria-selected="false">SMV Monitoring</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-one" role="tabpanel" aria-labelledby="custom-tabs-one-tab">
                      <table class="table table-bordered table-sm">
                        <thead class="thead-light text-center">
                          <tr>
                            <th>No of Priority</th>
                            <th>Project Name</th>
                            <th>Department</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Score</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        <tbody id="show_request">
                         
                        </tbody>
                        <form id="frm_request">
                        <tr class="bg-lightblue text-center">
                            <td></td>
                            <td><input type="" class="form-control form-control-sm" name="projectname" placeholder="Project Name"></td>
                            <td><input type="" class="form-control form-control-sm" name="department" placeholder="Department"></td>
                            <td width="15%">
                                <select name="category" class="form-control-sm form-control">
                                    <option value="Autonomation">Autonomation</option>
                                    <option value="Digitalization">Digitalization</option>
                                </select>
                            </td>
                            <td width="25%"><textarea class="textarea" name="remarks" placeholder="Description"></textarea></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-light add-request"><i class="fa fa-plus"></i> Add</button>
                            </td>
                        </tr>
                        </form>
                      </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two" role="tabpanel" aria-labelledby="custom-tabs-two-tab">
                      <table class="table table-bordered table-sm">
                        <thead class="thead-light text-center">
                          <tr>
                            <th width="1%">No</th>
                            <th>Project Name</th>
                            <th>Champion</th>
                            <th>Finish Date</th>
                            <th>Remarks</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        <tbody id="show_ongoing">
                         
                        </tbody>
                        <form id="frm_ongoing">
                        <tr class="bg-lightblue text-center">
                            <td></td>
                            <td><input type="text" class="form-control form-control-sm" name="projectname" placeholder="Project Name"></td>
                            <td><input type="text" class="form-control form-control-sm" name="champion" placeholder="Champion"></td>
                            <td width="15%">
                              <input type="date" class="form-control-sm form-control" name="finishdate">
                            </td>
                            <td width="25%"><textarea class="textarea txt-ongoing" name="remarks" placeholder="Remarks"></textarea></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-light add-ongoing"><i class="fa fa-plus"></i> Add</button>
                            </td>
                        </tr>
                        </form>
                      </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three" role="tabpanel" aria-labelledby="custom-tabs-three-tab">
                    <button type="button" class="btn btn-primary btn-sm data-lokasi"><i class="fa fa-map-marker-alt"></i> Locations</button><p></p>
                    <div class="table-responsive">                                    
                        <table class="table table-bordered table-sm">
                            <thead class="thead-light text-center">
                              <tr>
                                <th width="1%">No</th>
                                <th>Project Name</th>
                                <th>Units</th>
                                <th>Locations</th>
                                <th>Remakrs</th>
                                <th>#</th>
                              </tr>
                            </thead>
                            <tbody id="show_running">
                             
                            </tbody>
                            <form id="frm_running">
                            <tr class="bg-lightblue text-center">
                                <td></td>
                                <td><input type="text" class="form-control form-control-sm" name="projectname" placeholder="Project Name"></td>
                                <td>
                                  <!-- <input type="number" class="form-control form-control-sm" name="units" placeholder="Units"></td> -->
                                <td width="15%">
                                  <!-- <input type="text" class="form-control-sm form-control" name="locations" placeholder="Locations"> -->
                                </td>
                                <td width="25%"><textarea class="textarea txt-running" name="remarks" placeholder="Remarks"></textarea></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-light add-running"><i class="fa fa-plus"></i> Add</button>
                                </td>
                            </tr>
                            </form>
                        </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four" role="tabpanel" aria-labelledby="custom-tabs-four-tab">
                      <table class="table table-bordered table-sm">
                        <thead class="thead-light text-center">
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
                            <th>Remarks</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        <tbody id="show_npi">
                         
                        </tbody>
                        <form id="frm_npi">
                        <tr class="bg-lightblue text-center">
                            <td></td>
                            <td><input type="text" class="form-control-sm form-control" name="product" placeholder="Product"></td>
                            <td><input type="text" class="form-control-sm form-control" name="style" placeholder="Style No"></td>
                            <td><input type="text" class="form-control-sm form-control" name="pdra" placeholder="PDRA"></td>
                            <td><input type="text" class="form-control-sm form-control" name="provo" placeholder="PROVO"></td>
                            <td><input type="text" class="form-control-sm form-control" name="integration" placeholder="INTEGRATION"></td>
                            <td><input type="text" class="form-control-sm form-control" name="pp" placeholder="PP"></td>
                            <td><input type="text" class="form-control-sm form-control" name="pilot" placeholder="PILOT"></td>
                            <td><input type="date" class="form-control-sm form-control" name="psd" placeholder="PSD"></td>
                            <td><input type="text" class="form-control-sm form-control" name="remarks" placeholder="Remarks"></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-light add-npi"><i class="fa fa-plus"></i></button>
                            </td>
                        </tr>
                        </form>
                      </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-five" role="tabpanel" aria-labelledby="custom-tabs-five-tab">
                    <button type="button" class="btn btn-primary btn-sm add-smv"><i class="fa fa-plus"></i> Add</button><p></p>
                    <table class="table table-bordered table-sm">
                        <thead class="thead-light text-center">
                          <tr>
                            <th width="1%">No</th>
                            <th>Style No</th>
                            <th width="8%">Prev SMV</th>
                            <th width="8%">SMV Reduction</th>
                            <th width="8%">Final SMV</th>
                            <th width="8%">Percentage</th>
                            <th>Prod/Customer</th>                            
                            <th>PSD</th>                            
                            <th>Running</th>                            
                            <th>Improvement</th>                            
                            <th>#</th>
                          </tr>
                        </thead>
                        <tbody id="show_smv">
                         
                        </tbody>
                        
                      </table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
      </div>
  </div>
  <!-- /.col-md-6 -->         
  <!-- /.col-md-6 -->
</div>

<?php $this->load->view('modalproject'); ?>
  <!-- /.modal -->

<?php $this->load->view('filejs'); ?>

