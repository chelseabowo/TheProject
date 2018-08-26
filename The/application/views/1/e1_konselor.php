<h3><b>Daftar konselor</b></h3>
<a href="#" class="btn btn-success btn-sm" data-target="#modal_tambah_data" data-toggle="modal">Tambah konselor</a>
</br></br>

<div class='table-responsive' style="background-color:#E3FB71;">
	</br>
	<table id="myTable" class='table table-bordered' syle="color:#CDF76F">
		<thead>
			<tr style="background-color:#906CD7;">
				<th style="color:#CDF76F;" width="5%">NO.</th>
				<th style="color:#CDF76F;" width="15%">Nama Admin</th>
				<th style="color:#CDF76F;" width="10%">UserID</th>
				<th style="color:#CDF76F;" width="10%">Password</th>
				<th style="color:#CDF76F;" width="10%">Role</th>
				<th style="color:#CDF76F;" width="20%">Sekolah</th>
				<th style="color:#CDF76F;" width="10%">Status</th>
				<th style="color:#CDF76F;" width="20%">Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no=1;
				foreach ($a_s as $as) {
			?>
			<tr style="background-color:#F7FFE6;">
				<td><?php echo $no++ ?></td>
				<td><?php echo $as->user_nama; ?></td>
				<td><?php echo $as->user_id ?></td>
				<td><?php echo $as->user_password; ?></td>
				<td><?php echo $as->role_nama; ?></td>
				<td><?php echo $as->sekolah_nama; ?></td>
				<td><?php echo $as->status; ?></td>
				<td>
				<?php 
				if($as->status=='VERIFIED'){
				?>
					<a class="btn btn-success btn-xs" href="#edit_data_konselor" data-toggle="modal" data-id="<?php echo $as->m_user_id;?>">Edit</a>
					&nbsp;<!-- 
          <a class="btn btn-danger btn-xs" href="#" onclick="confirm_modal('<?php echo base_url('1/C_konselor/hapus_koselor/'); echo $ls->d_sekolah_id; ?>');">Hapus</a> -->
					<a class="btn btn-danger btn-xs" href="#" onclick="confirm_hapus_admin_sekolah('<?php echo base_url ('1/C_konselor/hapus_konselor/'); echo $as->m_user_id; ?>');">Hapus</a>
				<?php	
				}else{
				?>
					<a class="btn btn-info btn-xs" href="#" onclick="confirm_verifikasi_admin_sekolah('C_konselor/verifikasi_konselor/<?php echo $as->d_user_role_id; ?>');">Verifikasi</a>
					&nbsp;
					<a class="btn btn-success btn-xs" href="#edit_data_konselor" data-toggle="modal" data-id="<?php echo $as->m_user_id;?>">Edit</a>
					&nbsp;
					<a class="btn btn-danger btn-xs" href="#" onclick="confirm_hapus_admin_sekolah('<?php echo base_url ('1/C_konselor/hapus_konselor/'); echo $as->m_user_id; ?>');">Hapus</a>
				<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	</br>
</div>

<!-- Edit Data Sekolah -->
<div class="modal fade" id="edit_data_konselor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Sekolah</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data3"></div>
            </div>
            
        </div>
  </div>
</div>
<!-- Edit Data Sekolah -->
<!-- Verifikasi Data Admin Sekolah --> 
<div class="modal fade" id="modal_verifikasi_data_admin_sekolah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Apakah anda yakin akan memverifikasi data ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Ya</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!-- Verifikasi Admin Sekolah -->

<!-- Hapus Data Admin Sekolah --> 
<div class="modal fade" id="modal_hapus_data_admin_sekolah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Apakah anda yakin akan menghapus data ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link_hapus_admin">Ya</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!-- Hapus Data Admin Sekolah -->



<!-- Tambah Data Sekolah -->
<div id="modal_tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kepala Sekolah</h4>
      </div>

      <div class="modal-body">
         <form action="<?php echo base_url('1/C_konselor/tambah_baru_konselor'); ?>" method="POST">
          <div class="form-group has-feedback">
            <label> Nama Lengkap</label>
            <input name="in_nama" type="text" class="form-control" placeholder="Nama Lengkap">
          </div>
          
          <div class="form-group has-feedback">
            <label>NIP</label>
            <input name="in_userid" type="text" class="form-control" placeholder="NIP">
          </div>
          
          <div class="form-group has-feedback">
            <label>Email</label>
            <input name="in_email" type="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group has-feedback">
            <label>Password</label>
            <input name="in_password" type="password" id="reg_password" class="form-control" placeholder="Password">
            <input type='checkbox' id='toggle' value='0' onchange='togglePassword(this);'>
                &nbsp; <span id='toggleText'>Show</span>
          </div>
        
      <div class="modal-footer">
        <button class="btn btn-success" type="submit">
          Submit
        </button>
        <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
          Cancel
        </button>
      </div>
      
        </form>
      </div> 
    </div>
  </div>
</div>
<!-- Tambah Data Sekolah -->


<!-- JS Show/Hide Password -->
<script type="text/javascript">
 function togglePassword(el){
  // Checked State
  var checked = el.checked;

  if(checked){
   // Changing type attribute
   document.getElementById("reg_password").type = 'text';
   // Change the Text
   document.getElementById("toggleText").textContent= "Hide";
  }else{
   // Changing type attribute
   document.getElementById("reg_password").type = 'password';

   // Change the Text
   document.getElementById("toggleText").textContent= "Show";
  }
 }
</script>
<!-- JS Show/Hide Password -->


<!-- Hapus Data Sekolah -->
<script type="text/javascript">
    function confirm_hapus_admin_sekolah(delete_url)
    {
      $('#modal_hapus_data_admin_sekolah').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link_hapus_admin').setAttribute('href' , delete_url);
    }
</script>
<!-- Hapus Data Sekolah -->
<!-- Edit Data Sekolah -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_data_konselor').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
      
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url('1/C_konselor/edit_konselor/');?>'+ idx,
                success : function(data){
                $('.hasil-data3').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>

