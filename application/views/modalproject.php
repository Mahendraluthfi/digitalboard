<div class="modal fade" id="modal-request">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Requested Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
            <form id="frm_request_edit">                 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Project Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="projectname_request" placeholder="Project Name">
                    <input type="hidden" name="id_request">
                    </div>
                </div>                  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Department</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="department_request" placeholder="Department">
                    </div>
                </div>                  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                         <select name="category_request" class="form-control-sm form-control">
                            <option value="Autonomation">Autonomation</option>
                            <option value="Digitalization">Digitalization</option>
                        </select>
                    </div>
                </div>                  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea name="remarks_request" class="textarea"></textarea>
                    </div>
                </div>
                </form>                  
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit-request-save">Edit</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-score">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Scoring Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
            <?php echo form_open('project/save_score'); ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Project Name</label>
                    <div class="col-sm-9">
                        <input type="text" readonly="" class="form-control" name="projectname_score" placeholder="Project Name">
                        <input type="hidden" name="id_score">
                    </div>
                </div>                                  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Safety</label>
                    <div class="col-sm-9">
                        <select name="safety" class="form-control">
                            <option value="">-Choose-</option>
                            <option value="50">Improves Safety</option>                            
                            <option value="0">No Impact</option>                            
                            <option value="-20">Risk</option>                            
                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Quality</label>
                    <div class="col-sm-9">
                        <select name="quality" class="form-control">
                            <option value="">-Choose-</option>
                            <option value="50">Improves Quality</option>                            
                            <option value="0">No Impact</option>                            
                            <option value="-20">Risk</option>                            
                        </select>
                    </div>
                </div>       
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Delivery</label>
                    <div class="col-sm-9">
                        <select name="delivery" class="form-control">
                            <option value="">-Choose-</option>
                            <option value="50">Improves Delivery Time</option>                            
                            <option value="0">No Impact</option>                            
                            <option value="-10">Delay in Delivery</option>                            
                        </select>
                    </div>
                </div>                            
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cost</label>
                    <div class="col-sm-9">
                        <select name="cost" class="form-control">
                            <option value="">-Choose-</option>
                            <option value="50">Cost Saving</option>                            
                            <option value="10">No Impact</option>                            
                            <option value="0">Complicated</option>                            
                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Morale</label>
                    <div class="col-sm-9">
                        <select name="morale" class="form-control">
                            <option value="">-Choose-</option>
                            <option value="20">Improve Morale</option>                            
                            <option value="0">No Impact</option>                            
                            <option value="-10">Complicated</option>                            
                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">ROI</label>
                    <div class="col-sm-9">
                        <select name="roi" class="form-control">
                            <option value="">-Choose-</option>
                            <option value="50">High ROI ( < 4W)</option>                            
                            <option value="0">Low ROI ( > 4W)</option>                            
                            <option value="-20">No Impact</option>                            
                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Delivery Time</label>
                    <div class="col-sm-9">
                        <select name="delivery_time" class="form-control">
                            <option value="">-Choose-</option>
                            <option value="50">2 Days Before Required Date</option>                            
                            <option value="30">On Required Date</option>                            
                            <option value="0">2 Days After Required Date</option>                            
                            <option value="-20">More than 2 Days After Required Date</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Urgency</label>
                    <div class="col-sm-9">
                        <select name="urgency" class="form-control">
                            <option value="">-Choose-</option>
                            <option value="50">Within 1 Week</option>                            
                            <option value="40">Within 2 Weeks</option>                            
                            <option value="30">Within 3 Weeks</option>                            
                            <option value="10">More than 4 Weeks</option>                                                        
                        </select>
                    </div>
                </div> 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>                  
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
<div class="modal fade" id="modal-ongoing">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ongoing Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
            <form id="frm_ongoing_edit">                 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Project Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="projectname_ongoing" placeholder="Project Name">
                    <input type="hidden" name="id_ongoing">
                    </div>
                </div>                  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Champion</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="champion_ongoing" placeholder="Champion">
                    </div>
                </div>                  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Finish Date</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control-sm form-control" name="finishdate_ongoing" placeholder="Finish Date">
                    </div>
                </div>                  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Remarks</label>
                    <div class="col-sm-9">
                        <textarea name="remarks_ongoing" class="textarea"></textarea>
                    </div>
                </div>  
                </form>                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit-ongoing-save">Edit</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-running">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Running Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
            <form id="frm_running_edit">                 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Project Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="projectname_running" placeholder="Project Name">
                    <input type="hidden" name="id_running">
                    </div>
                </div>                  
               <!--  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Units</label>
                    <div class="col-sm-9">
                    <input type="number" min="0" class="form-control" name="units_running" placeholder="Champion">
                    </div>
                </div>           -->        
                <!-- <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Locations</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control-sm form-control" name="locations_running" placeholder="Finish Date">
                    </div>
                </div>  -->                 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Remarks</label>
                    <div class="col-sm-9">
                        <textarea name="remarks_running" class="textarea"></textarea>
                    </div>
                </div>  
                </form>                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit-running-save">Edit</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-npi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">NPI Involvment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
            <form id="frm_npi_edit">                 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Product</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="product_npi" placeholder="Product">
                    <input type="hidden" name="id_npi">
                    </div>
                </div>                 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Style No</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="style_npi" placeholder="Style No">
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">PDRA</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="pdra_npi" placeholder="PDRA">
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">PROVO</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="provo_npi" placeholder="PROVO">
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">INTEGRATION</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="integration_npi" placeholder="INTEGRATION">
                    </div>
                </div>    
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">PP</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="pp_npi" placeholder="PP">
                    </div>
                </div>    
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">PILOT</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="pilot_npi" placeholder="PILOT">
                    </div>
                </div>    
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">PSD</label>
                    <div class="col-sm-9">
                    <input type="date" class="form-control" name="psd_npi" placeholder="PSD">
                    </div>
                </div>  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Remarks</label>
                    <div class="col-sm-9">
                    <textarea name="remarks_npi" class="form-control" placeholder="Remarks"></textarea>
                    </div>
                </div>                  
               
            </form>                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit-npi-save">Edit</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-running-location">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title prname"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <form id="frm-location">
                            <div class="form-group row">                            
                                <div class="col-9">
                                    <select name="id_loc" class="form-control select2 sel-location">                                    
                                    </select>
                                    <input type="hidden" name="id_running">
                                </div>
                                <div class="col-3 text-right">
                                    <button type="button" class="btn btn-primary add-location"><i class="fa fa-plus"></i> Add</button>
                                </div>
                            </div>
                        </form>
                        Location
                        <table class="table table-condensed table-sm">                            
                            <tbody id="list-location"></tbody>
                        </table>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-running-check">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title prname"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-search">
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="date">
                    <input type="hidden" name="id_search">
                    <div class="input-group-append">
                        <button class="btn btn-secondary btn-search-check" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                </form>
                    <table class="table table-bordered table-sm">                        
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody id="list-search-check"></tbody>
                    </table>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-info">
    <div class="modal-dialog">
      <div class="modal-content bg-info">
        <!-- <div class="modal-header"></div> -->
        <div class="modal-body">
          <form id="frm-location-edit">
            <div class="form-group row">                            
                <div class="col-9">
                  <input type="text" name="location_edit" class="form-control" placeholder="Location Area / Line">
                  <input type="hidden" name="id_loc_edit">
                  <input type="hidden" name="id_running_edit">
                </div>
                <div class="col-3 text-right edit-location">
                    <button type="button" class="btn btn-default edit-location"><i class="fa fa-edit"></i> Edit</button>
                </div>
            </div>
          </form>
        </div>
        <!-- <div class="modal-footer justify-content-between"></div> -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-data-location">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header"><h4>Locations List</h4></div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <h5 class="titlelokasi">Add Location</h5><hr>
                    <form id="tambahlokasi">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Location Name">
                      </div>                     
                      <button type="button" class="btn btn-primary btn-sm savelokasi">Save</button>
                    </form>

                    <form id="editlokasi" style="display: none;">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" name="lokasiedit" class="form-control" placeholder="Location Name">
                        <input type="hidden" name="idlokasi">
                      </div>                     
                      <button type="button" class="btn btn-primary btn-sm editlokasi">Edit</button>
                      <button type="button" class="btn btn-danger btn-sm bataledit">Cancel</button>
                    </form>
                </div>
                <div class="col-md-8 col-lg-8">
                    <table class="table table-bordered table-sm" id="tb">
                        <thead>
                            <tr class="bg-light">
                                <th>No</th>
                                <th>Location</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody id="table-location"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- <div class="modal-footer justify-content-between"></div> -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-smv">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title-smv"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
            <form id="frm_smvreduction">                 
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Style Number</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="styleno" placeholder="Style Number">                    
                    </div>
                </div>                  
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Previous SMV</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="smv_prev" placeholder="Previous Number">                    
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">SMV Reduction</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="smv_reduc" placeholder="SMV Reduction">                    
                    </div>
                </div>                                    
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Prod/Customer</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="customer" placeholder="Prod/Customer">                    
                    </div>
                </div>     
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">PSD</label>
                    <div class="col-sm-8">
                    <input type="date" class="form-control" name="psd" placeholder="SMV Reduction">                    
                    </div>
                </div>                                    
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Running</label>
                    <div class="col-sm-8">
                    <input type="month" class="form-control" name="running" placeholder="SMV Reduction">                    
                    </div>
                </div>     
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Improvement</label>
                    <div class="col-sm-8">
                        <textarea name="improvement" class="form-control" placeholder="Improvement"></textarea>
                    </div>
                </div>     
                
                </form>                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary smv-save">Save</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
