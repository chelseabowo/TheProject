<h3><b>Daftar Kota/ Kabupaten</b></h3>
<a href="#" class="btn btn-success btn-sm" data-target="#modal_tambah_data" data-toggle="modal">Tambah Kota</a>
</br></br>
<div class='table-responsive' style="background-color:#E3FB71;">
  </br>
  <table id="myTable" class='table table-bordered' syle="color:#CDF76F">
    <thead>
      <tr style="background-color:#906CD7;">
        <th style="color:#CDF76F;" width="5%">NO.</th>
        <th style="color:#CDF76F;" width="60%">Kota/ Kabupaten</th>
        <th style="color:#CDF76F;" width="20%">Description</th>
        <th style="color:#CDF76F;" width="15%">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1;
        foreach ($kota as $ko) {
      ?>
      <tr style="background-color:#F7FFE6;">
        <td><?php echo $no++ ?></td>
        <td><a href="<?php echo base_url('1/C_daerah/kecamatan/'.$ko->m_kota_id);?>"><?php echo $ko->kota_nama; ?></a></td>
        <td><a class="btn btn-info btn-xs" href="#detail_kota" data-toggle="modal" data-id="<?php echo $ko->m_kota_id;?>">Detail</td>
        <td>
          <a class="btn btn-success btn-xs" href="#edit_data_kota" data-toggle="modal" data-id="<?php echo $ko->m_kota_id;?>">Edit</a>
          &nbsp;
          <a class="btn btn-danger btn-xs" href="#" onclick="delete_kota('<?php Echo base_url('1/C_daerah/hapus_kota/') echo "$ko->m_kota_id./"; echo "$ko->m_provinsi_id"; ?>');">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </br>
</div>

<div class="center-text">
  <a href="<?php echo base_url('1/C_daerah/'); ?>" class="btn btn-info btn-md" style="text-align: center;"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Provinsi</a>
</div>

<!-- Tambah Data kota -->
<div id="modal_tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Tambah kota</h4>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url('1/C_daerah/tambah_kota/'); echo $ko->m_provinsi_id; ?>" method="POST" name="kelas">
          <div class="form-group has-feedback">
            <label for="">kota</label>
            <input name="in_provinsi_id" type="hidden" class="form-control" value="<?php echo $ko->m_provinsi_id;?>" placeholder="Nama kota"> 
            <input name="in_kota_nama" type="text" class="form-control" placeholder="Nama kota">
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
<!-- Tambah Data kota -->

<!-- Hapus Data kota -->
<script type="text/javascript">
    function delete_kota(delete_url)
    {
      $('#modal_hapus_data_kota').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<!-- Hapus Data kota -->

<!-- Hapus Data kota -->
<div class="modal fade" id="modal_hapus_data_kota">
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
<!-- Hapus Data kota -->
<!-- Edit Data Sekolah -->
<div class="modal fade" id="edit_data_kota" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data kota</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data"></div>
            </div>
        </div>
  </div>
</div>
<!-- Edit Data Sekolah -->
<!-- Edit Data kota -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_data_kota').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
      
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url('1/C_daerah/edit_kota/');?>'+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>
<!-- Edit Data kota -->

