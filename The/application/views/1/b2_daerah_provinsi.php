<h3><b>Daftar Provinsi</b></h3>
<a href="#" class="btn btn-success btn-sm" data-target="#modal_tambah_data" data-toggle="modal">Tambah Provinsi</a>
</br></br>
<div class='table-responsive' style="background-color:#E3FB71;">
  </br>
  <table id="myTable" class='table table-bordered' syle="color:#CDF76F">
    <thead>
      <tr style="background-color:#906CD7;">
        <th style="color:#CDF76F;" width="5%">NO.</th>
        <th style="color:#CDF76F;" width="60%">Provinsi</th>
        <th style="color:#CDF76F;" width="20%">Description</th>
        <th style="color:#CDF76F;" width="15%">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1;
        foreach ($provinsi as $pro) {
      ?>
      <tr style="background-color:#F7FFE6;">
        <td><?php echo $no++ ?></td>
        <td><a href="<?php echo base_url('1/C_daerah/kota/'.$pro->m_provinsi_id);?>"><?php echo $pro->provinsi_nama; ?></a></td>
        <td><a class="btn btn-info btn-xs" href="#detail_provinsi" data-toggle="modal" data-id="<?php echo $pro->m_provinsi_id;?>">Detail</td>
        <td>
          <a class="btn btn-success btn-xs" href="#edit_data_provinsi" data-toggle="modal" data-id="<?php echo $pro->m_provinsi_id;?>">Edit</a>
          &nbsp;
          <a class="btn btn-danger btn-xs" href="#" onclick="delete_provinsi('<?php echo base_url('1/C_daerah/hapus_provinsi/'); echo $pro->m_provinsi_id; ?>');">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </br>
</div>

<!-- Tambah Data Provinsi -->
<div id="modal_tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Provinsi</h4>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url('1/C_daerah/tambah_provinsi/');?>" method="POST" name="kelas">
          <div class="form-group has-feedback">
            <label for="">Provinsi</label>
            <input name="in_provinsi_nama" type="text" class="form-control" placeholder="Nama Provinsi">
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
<!-- Tambah Data Provinsi -->

<!-- Hapus Data Provinsi -->
<script type="text/javascript">
    function delete_provinsi(delete_url)
    {
      $('#modal_hapus_data_provinsi').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<!-- Hapus Data Provinsi -->

<!-- Hapus Data Provinsi -->
<div class="modal fade" id="modal_hapus_data_provinsi">
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
<!-- Hapus Data Provinsi -->

<!-- Edit Data Provinsi -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_data_provinsi').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
      
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url('1/C_daerah/edit_provinsi/');?>'+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>
<!-- Edit Data Provinsi -->

<!-- Edit Data Sekolah -->
<div class="modal fade" id="edit_data_provinsi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Provinsi</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data"></div>
            </div>
        </div>
  </div>
</div>
<!-- Edit Data Sekolah -->