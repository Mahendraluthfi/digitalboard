<div class="row">
    <div class="container">
        
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5>Downtime Record</h5>
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Project</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($get as $data) { ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->projectname ?></td>
                            <td><?php echo $data->st ?></td>
                            <td><?php echo $data->et ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>