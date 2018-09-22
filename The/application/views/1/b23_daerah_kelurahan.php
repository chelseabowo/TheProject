<h3><b>Daftar kelurahan</b></h3>
<a href="#" class="btn btn-success btn-sm" data-target="#modal_tambah_data" data-toggle="modal">Tambah kelurahan</a>
</br></br>
<div class='table-responsive' style="background-color:#E3FB71;">
  </br>
  <table id="myTable" class='table table-bordered' syle="color:#CDF76F">
    <thead>
      <tr style="background-color:#906CD7;">
        <th style="color:#CDF76F;" width="5%">NO.</th>
        <th style="color:#CDF76F;" width="60%">kelurahan</th>
        <th style="color:#CDF76F;" width="20%">Description</th>
        <th style="color:#CDF76F;" width="15%">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1;
        foreach ($kelurahan as $kl) {
      ?>
      <tr style="background-color:#F7FFE6;">
        <td><?php echo $no++ ?></td>
        <td><a href="<?php echo base_url('1/C_daerah/kelurahan/'.$kl->m_kelurahan_id);?>"><?php echo $kl->kelurahan_nama; ?></a></td>
        <td><a class="btn btn-info btn-xs" href="#detail_provinsi" data-toggle="modal" data-id="<?php echo $kl->m_kelurahan_id;?>">Detail</td>
        <td>
          <a class="btn btn-success btn-xs" href="#edit_data_kelurahan" data-toggle="modal" data-id="<?php echo $kl->m_kelurahan_id;?>">Edit</a>
          &nbsp;
          <a class="btn btn-danger btn-xs" href="#" onclick="delete_kelurahan('<?php echo base_url('1/C_daerah/hapus_kelurahan/'); echo $kl->m_kelurahan_id; ?>');">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </br>
</div>
<!-- Tambah Data kecamatan -->
<div id="modal_tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Tambah kelurahan</h4>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url('1/C_daerah/tambah_kelurahan/'); echo $kl->m_kelurahan_id; ?>" method="POST" name="kelas">
          <div class="form-group has-feedback">
            <label for="">kelurahan</label>
            <input name="in_kecamatan_id" type="hidden" class="form-control" value="<?php echo $kl->m_kecamatan_id;?>" placeholder="Nama kecamatan"> 
            <input name="in_kelurahan_nama" type="text" class="form-control" placeholder="Nama kelurahan">
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
<!-- Tambah Data kecamatan -->
<!-- Hapus Data kecamatan -->
<script type="text/javascript">
    function delete_kelurahan(delete_url)
    {
      $('#modal_hapus_data_kelurahan').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<!-- Hapus Data kecamatan -->
<div class="modal fade" id="modal_hapus_data_kelurahan">
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
<!-- Hapus Data kecamatan -->
<!-- Edit Data kecamatan -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_data_kelurahan').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
      
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url('1/C_daerah/edit_kelurahan/');?>'+ idx,
                success : function(data){
                $('.hasil-data1').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>
<!-- Edit Data kecamatan -->
<!-- Edit Data Sekolah -->
<div class="modal fade" id="edit_data_kelurahan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data kelurahan</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data1"></div>
            </div>
        </div>
  </div>
</div>
<!-- Edit Data Sekolah -->

<div class="center-text">
  <a href="<?php echo base_url('1/C_daerah/kecamatan/'); echo $kecamatan['m_kota_id']; ?>" class="btn btn-info btn-md" style="text-align: center;"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar kecamatan</a>
</div>