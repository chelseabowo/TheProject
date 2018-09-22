<form action="<?php echo base_url('1/C_daerah/update_kecamatan'); ?>" method="POST">
	<input name="in_m_kecamatan_id" type="hidden" class="form-control" value="<?php echo $edit['m_kecamatan_id'] ?>" readonly>
	<div class="form-group has-feedback">	
  	<label for="">kecamatan</label>
  		<input name="in_kecamatan_nama" type="text" class="form-control" placeholder="Nama kecamatan" value="<?php echo $edit['kecamatan_nama'] ?>">
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