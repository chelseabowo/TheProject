<form action="<?php echo base_url('1/C_daerah/update_kelurahan'); ?>" method="POST">
	<input name="in_m_kelurahan_id" type="hidden" class="form-control" value="<?php echo $edit['m_kelurahan_id'] ?>" readonly>
	<div class="form-group has-feedback">	
  	<label for="">kelurahan</label>
  		<input name="in_kelurahan_nama" type="text" class="form-control" placeholder="Nama kelurahan" value="<?php echo $edit['kelurahan_nama'] ?>">
	</div>
<div class="modal-footer">
	<button class="btn btn-success" type="submit">
        Submit
	</button>
  	<button type="button" class="btn btn-danger" data-dismiss="modal">
    	Cancel
  	</button>
</div>
</form>