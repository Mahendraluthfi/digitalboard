<div class="table-responsive">	
	<caption>Location <?php echo $textline->location ?></caption>
	<table class="table table-condensed table-sm">
		<thead>
			<tr>
				<th>Project</th>
				<th>Remarks</th>
			</tr>
		</thead>
		<tbody>
			<?php echo form_open('check/savebylocation'); ?>
			<?php foreach ($db as $data) { ?>
			<tr>
				<td>
					<div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="1" name="cb[<?php echo $data->idcheck ?>]" id="checkbox<?php echo $data->idcheck?>" <?php echo ($data->cb == '1') ? 'checked' : ''; ?>>
                        <label for="checkbox<?php echo $data->idcheck?>"><?php echo $data->projectname ?></label>
                    </div>
                    </div>
				</td>
				<td>
					<textarea class="form-control form-control-sm" rows="1" placeholder="Remarks" name="rm[<?php echo $data->idcheck ?>]"><?php echo $data->reason ?></textarea>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<button type="submit" class="btn btn-primary">Submit</button>
	<?php echo form_close(); ?>
</div>