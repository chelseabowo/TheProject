<form action="<?php echo base_url('1/C_daerah/update_kota'); ?>" method="POST">
	<input name="in_m_kota_id" type="hidden" class="form-control" value="<?php echo $edit['m_kota_id'] ?>" readonly>
	<div class="form-group has-feedback">	
  	<label for="">kota</label>
  		<input name="in_kota_nama" type="text" class="form-control" placeholder="Nama kota" value="<?php echo $edit['kota_nama'] ?>">
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