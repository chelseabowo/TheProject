<h3><b>Daftar Kelas</b></h3>
<a href="#" class="btn btn-success btn-sm" data-target="#modal_tambah_data" data-toggle="modal">Tambah Data Kelas</a>
</br></br>

<div class='table-responsive' style="background-color:#E3FB71;">
	</br>
	<table id="myTable" class='table table-bordered' syle="color:#CDF76F">
		<thead>
			<tr style="background-color:#906CD7;">
				<th style="color:#CDF76F;" width="5%">NO.</th>
				<th style="color:#CDF76F;" width="40%">Kelas</th>
				<th style="color:#CDF76F;" width="20%">KelasID</th>
				<th style="color:#CDF76F;" width="20%">Wali Kelas</th>
				<th style="color:#CDF76F;" width="15%">Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no=1;
				foreach ($kelas as $kl) {
			?>
			<tr style="background-color:#F7FFE6;">
				<td><?php echo $no++ ?></td>
				<td><?php echo $kl->kelas_nama; ?></td>
				<td><?php echo $kl->kelas_id; ?></td>
				<td></td>
				<td>
					 <!-- <?php echo anchor ('1/C_sekolah/edit_sekolah/'.$ls->d_sekolah_id,'EDIT') ;?> -->
          <a class="btn btn-success btn-xs" href="#edit_data_kelas" data-toggle="modal" data-id="<?php echo $kl->d_kelas_id;?>">Edit</a>
          &nbsp;
          <a class="btn btn-danger btn-xs" href="#" onclick="confirm_modal('<?php echo base_url('2/C_kelas/hapus_kelas/'); echo $kl->d_kelas_id; ?>');">Hapus</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	</br>
</div>
<!-- Edit Data Sekolah -->
<div class="modal fade" id="edit_data_kelas" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data kelas</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data"></div>
            </div>
            
        </div>
  </div>
</div>
<!-- Edit Data Sekolah -->


<!-- Hapus Data Kelas -->
<script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_hapus_data_kelas').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<!-- Hapus Data Kelas -->

<!-- Hapus Data Kelas --> 
<div class="modal fade" id="modal_hapus_data_sekolah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Apakah anda yakin akan menghapus data ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Ya</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!-- Hapus Data Kelas -->

<!-- Tambah Data Kelas	 -->
<div id="modal_tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kelas</h4>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url('2/C_kelas/tambah_kelas'); ?>" method="POST" name="kelas">
          <div class="form-group has-feedback">
          	<label for="">Nama Kelas</label>
            <input name="in_nama_kelas" type="text" class="form-control" placeholder="Nama Kelas" onFocus="findstartclass();" onBlur="findstopclass();">
          </div>
          <div class="form-group has-feedback">
          	<label for="">ID Kelas</label>
            <input name="in_id_kelas" type="text" class="form-control" readonly>
          </div>
          <div class="form-group has-feedback">
            <label for="">Wali Kelas</label>
            <input name="in_wali_kelas" type="text" class="form-control" placeholder="NIP" >
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
<!-- Tambah Data Kelas -->

<!-- Find ID Kelas -->
<script> 
function findstartclass(){
interval = setInterval("findclass()",1);}
function findclass(){
var in_s = document.kelas.in_nama_kelas.value;
var hasil = in_s.split(" ").join("");

document.kelas.in_id_kelas.value = hasil.toUpperCase();
}
function findstopclass(){
clearInterval(interval);}
</script>
<!-- Find ID Kelas -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_data_kelas').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
      
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url('2/C_kelas/edit_kelas/');?>'+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>