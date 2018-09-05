<h3><b>Daftar Guru BK</b></h3>
</br></br>

<div class='table-responsive' style="background-color:#E3FB71;">
	</br>
	<table id="myTable" class='table table-bordered' syle="color:#CDF76F">
		<thead>
			<tr style="background-color:#906CD7;">
				<th style="color:#CDF76F;" width="5%">NO.</th>
				<th style="color:#CDF76F;" width="15%">Nama Guru BK</th>
				<th style="color:#CDF76F;" width="20%">Alamat</th>
				<th style="color:#CDF76F;" width="10%">No Telp</th>
				<th style="color:#CDF76F;" width="10%">Status</th>
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
				<td><?php echo $as->user_alamat; ?></td>
				<td><?php echo $as->user_no_hp; ?></td>
				<td><?php echo $as->status; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	</br>
</div>

<!-- Edit Data Sekolah -->
<div class="modal fade" id="edit_data_gurubk" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Guru BK</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data4"></div>
            </div>
            
        </div>
  </div>
</div>
<!-- Edit Data Sekolah -->
<!-- Verifikasi Data Admin Sekolah --> 
<div class="modal fade" id="modal_verifikasi_data_guru_bk">
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
<div class="modal fade" id="modal_hapus_data_guru_bk">
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
        <h4 class="modal-title" id="myModalLabel">Tambah Guru BK</h4>
      </div>

      <div class="modal-body">
         <form action="<?php echo base_url('3/C_gurubk/tambah_baru_gurubk'); ?>" method="POST">
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
    function confirm_hapus_data_gurubk(delete_url)
    {
      $('#modal_hapus_data_guru_bk').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link_hapus_admin').setAttribute('href' , delete_url);
    }
</script>
<!-- Hapus Data Sekolah -->
<!-- Edit Data Sekolah -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_data_gurubk').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
      
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url('3/C_gurubk/edit_gurubk/');?>'+ idx,
                success : function(data){
                $('.hasil-data4').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>


<!-- verifikasi Data  -->
<script type="text/javascript">
    function confirm_verifikasi_data_gurubk(delete_url)
    {
      $('#modal_verifikasi_data_guru_bk').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<!-- verifikasi Data  -->
