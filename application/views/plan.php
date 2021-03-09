<div class="row">
    <div class="container">
        
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4>Style Plan</h4>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="open_embed()"><i class="fa fa-file-excel"></i> Edit Embed</button>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-12">                   
                        <?php echo $get->embed ?>     
                        <!-- <iframe width="100%" height="600" frameborder="0" scrolling="no" src="https://massl-my.sharepoint.com/personal/prionakal_masholdings_com/_layouts/15/Doc.aspx?sourcedoc={8a5e2062-d201-4db0-bd37-6ae05c31fb9b}&action=embedview&wdAllowInteractivity=False&wdHideGridlines=True&wdDownloadButton=True&wdInConfigurator=True"></iframe> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Embed Saving</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('plan/save'); ?>
                <textarea name="embed" class="form-control" placeholder="Embed Saving"><?php echo $get->embed ?></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    function open_embed() {
        $('#modal-default').modal('show');
    }
</script>