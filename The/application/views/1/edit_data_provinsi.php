<form action="<?php echo base_url('1/C_daerah/update_provinsi'); ?>" method="POST">
	<input name="in_m_provinsi_id" type="hidden" class="form-control" value="<?php echo $edit['m_provinsi_id'] ?>" readonly>
	<div class="form-group has-feedback">	
  	<label for="">Provinsi</label>
  		<input name="in_provinsi_nama" type="text" class="form-control" placeholder="Nama Provinsi" value="<?php echo $edit['provinsi_nama'] ?>">
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