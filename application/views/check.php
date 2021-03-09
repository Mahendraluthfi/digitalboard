<div class="row">
    <div class="container">
        
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <legend>Cheklist Project</legend>
                        <div class="list-group"> 
                        <?php foreach ($get as $data) { ?>                           
                            <button type="button" class="list-group-item list-group-item-action" onclick="getloc('<?php echo $data->id ?>','<?php echo $data->projectname ?>','<?php echo $data->last_update ?>')"><?php echo $data->projectname ?></button>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5 class="date"></h5>
                        <h5 class="title"></h5>
                        <span class="update" style="font-size: 12px;"></span>
                        <p></p>
                            
                            <?php echo form_open('', array('id' => 'frm_check')); ?>                                                            
                            <div class="list-location"></div>
                            <button type="submit" class="btn btn-primary btn-save" style="display: none;"><i class="fa fa-save"></i> Submit</button>
                            </form>             
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
    function getloc(id,pname,last) {        
        $.ajax({
        url : "<?php echo site_url('index.php/check/get_checknew/')?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('.title').text(pname);
            $('.update').text('Last Update: '+last);
            $('.date').text('<?php echo date('l, d M Y') ?>');
            console.log(data);
            $('#frm_check').attr('action','<?php echo base_url('check/save/') ?>'+id);
            $('.btn-save').removeAttr('style');
            var html = '';
            var i;
            var no = 1;
            
            for(i=0; i<data.length; i++){
                if (data[i].cb == 0) {
                    var cb = '';
                }else{
                    var cb = 'checked';
                }

            html += '<div class="row">'+
                '<div class="col-4">'+
                    '<div class="form-group clearfix">'+
                    '<div class="icheck-primary d-inline">'+
                        '<input type="checkbox" value="1" name="cb['+data[i].idcheck+']" id="checkbox'+data[i].idcheck+'" '+cb+'>'+
                        '<label for="checkbox'+data[i].idcheck+'"> '+data[i].location+
                        '</label>'+
                    '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-8">'+
                    '<textarea class="form-control form-control-sm" rows="1" placeholder="Remarks" name="rm['+data[i].idcheck+']">'+data[i].reason+'</textarea>'+
                '</div>'+
            '</div>';
            }

            $('.list-location').html(html);    
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
            }
        });    
    }

</script>