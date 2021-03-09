<div class="row">
    <div class="container">
        
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <h5>Select Location</h5>
                        <div class="input-group input-group-sm">
                          <select name="id_loc" class="form-control select2">
                            <?php foreach ($location as $data) { ?>
                                <option value="<?php echo $data->id ?>"><?php echo $data->location ?></option>
                            <?php } ?>
                          </select>
                          <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat btn-submit">Submit</button>
                          </span>
                        </div>                        
                    </div>
                </div><br>
                <div class="row">
                    <?php if (!empty($this->uri->segment(3))) {
                        $this->load->view('list');
                    } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
    $('.btn-submit').on('click',function(){
        var id = $('[name="id_loc"]').val();
        window.location.href= "<?php echo base_url('check/linewise/') ?>"+id;   
    })
</script>