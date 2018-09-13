  <h3><b>Profil Sekolah</b></h3>
  <div class="row" style="background-color:#EEE8FF;">
    <div col-md-8>
      <div class="form-group">
        <label class="control-label col-md-2">Sekolah</label>
        <div class="col-md-6">
          <b><?php echo $sekolah['sekolah_nama']; ?></b>
        </div>
      </div>
    </div></br>
    <div col-md-8>
      <div class="form-group">
        <label class="control-label col-md-2">ID Sekolah</label>
        <div class="col-md-8">
          <?php echo $sekolah['sekolah_id']; ?>
        </div>
      </div>
    </div></br>
    <div col-md-8>
      <div class="form-group">
        <label class="control-label col-md-2">Kepala Sekolah</label>
        <div class="col-md-8">
          <?php 
          if($sekolah['kepala_sekolah'] ==NULL){ ?>
            <a href="#" class="btn btn-success btn-xs" data-target="#modal_tambah_kepala_sekolah" data-toggle="modal">Tambah kepala Sekolah</a>          
          <?php
          }else{
            echo $sekolah['kepala_sekolah'];
          }
          ?>
        </div>
      </div>
    </div></br>
    <div col-md-8>
      <div class="form-group">
        <label class="control-label col-md-2">Admin Sekolah</label>
        <div class="col-md-8">
          <?php echo $sekolah['admin_sekolah']; ?>
        </div>
      </div>
    </div></br>
    <div col-md-8>
      <div class="form-group">
        <label class="control-label col-md-2">No Telp.</label>
        <div class="col-md-8">
          <?php echo $sekolah['sekolah_no_telp']; ?>
        </div>
      </div>
    </div></br>
    <div col-md-8>
      <div class="form-group">
        <label class="control-label col-md-2">Alamat</label>
        <div class="col-md-8">
          <?php 
          echo $sekolah['sekolah_alamat'].", ".$sekolah['kelurahan_nama'].", ".$sekolah['kecamatan_nama'].", ";
          print("<br>");
          echo $sekolah['kota_nama'].", ".$sekolah['provinsi_nama']; 
          ?>

        </div>
      </div>
    </div>
  </div>

<hr>
<h3><b>Daftar Kelas</b></h3>
<a href="#" class="btn btn-success btn-sm" data-target="#modal_tambah_data" data-toggle="modal">Tambah Data Kelas</a>
</br>
<div class='table-responsive' style="background-color:#E3FB71;">
  </br>
  <table id="myTable" class='table table-bordered' syle="color:#CDF76F">
    <thead>
      <tr style="background-color:#906CD7;">
        <th style="color:#CDF76F;" width="5%">NO.</th>
        <th style="color:#CDF76F;" width="25%">Kelas</th>
        <th style="color:#CDF76F;" width="25%">ID Kelas</th>
        <th style="color:#CDF76F;" width="30%">ID Sekolah</th>
        <th style="color:#CDF76F;" width="15%">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1;
        foreach ($list_kelas as $kls) {
      ?>
      <tr style="background-color:#F7FFE6;">
        <td><?php echo $no++ ?></td>
        <td><a href="<?php echo base_url('1/C_detail_kelas/index/'.$kls->d_kelas_id);?>"><?php echo $kls->kelas_nama; ?></a></td>
        <td><?php echo $kls->kelas_id;?></td>
        <td><?php echo $kls->sekolah_id; ?></td>
        <td>
          <!-- <?php echo anchor ('1/C_sekolah/edit_sekolah/'.$ls->d_sekolah_id,'EDIT') ;?> -->
          <a class="btn btn-success btn-xs" href="#edit_data_sekolah" data-toggle="modal" data-id="<?php echo $kls->d_sekolah_id;?>">Edit</a>
          &nbsp;
          <a class="btn btn-danger btn-xs" href="#" onclick="confirm_modal('<?php echo base_url('1/C_kelas/hapus_kelas/'); echo $kls->d_sekolah_id; ?>');">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </br>
</div>
<hr>

<div class="center-text">
  <a href="<?php echo base_url('1/C_sekolah/'); ?>" class="btn btn-info btn-md" style="text-align: center;"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sekolah</a>
</div>

<!-- Edit Data Sekolah -->
<div class="modal fade" id="edit_data_sekolah" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Sekolah</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data"></div>
            </div>
            
        </div>
  </div>
</div>
<!-- Edit Data Sekolah -->

<!-- Hapus Data Sekolah --> 
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
<!-- Hapus Data Sekolah -->

<!-- Tambah Data Kelas -->
<div id="modal_tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Login Admin</h4>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url('1/C_kelas/tambah_kelas/'); echo $d_sekolah_id;?>" method="POST" name="kelas">
          <div class="form-group has-feedback">
            <label for="">Nama Kelas</label>
            <input name="in_nama_kelas" type="text" class="form-control" placeholder="Nama Kelas" onFocus="findstartclass();" onBlur="findstopclass();">
          </div>
          <div class="form-group has-feedback">
            <label for="">ID Kelas</label>
            <input name="in_id_kelas" type="text" class="form-control" readonly>
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

<!-- Edit Data Sekolah -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_data_sekolah').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
      
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url('1/C_sekolah/edit_sekolah/');?>'+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>
<!-- Edit Data Sekolah -->

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

<!-- Tambah Data Kepala Sekolah -->
<div id="modal_tambah_kepala_sekolah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Wali Kelas</h4>
      </div>  

      <ul class="nav nav-pills nav-justified">
        <li class="active"><a data-toggle="pill" href="#signin">Sign In</a></li>
        <li><a data-toggle="pill" href="#signup">Sign Up</a></li>
      </ul>

      <div class="modal-body">
        <div class="tab-content">
          <div id="signin" class="tab-pane fade in active">
            
            <form action="<?php echo base_url('1/C_kelas/signin_kepala_sekolah'); ?>" method="POST">
              <input name="in_d_sekolah_id" type="hidden" class="form-control" value="<?php echo $d_sekolah_id; ?>">
              <div class="form-group has-feedback">
                <label>NIP</label>
                <input name="in_user_id" type="text" class="form-control" placeholder="NIP" required>
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
          
          <div id="signup" class="tab-pane fade">

            <form action="<?php echo base_url('1/C_kelas/signup_kepala_sekolah'); ?>" method="POST">
              <input name="in_d_sekolah_id" type="hidden" class="form-control" value="<?php echo $d_sekolah_id; ?>">
              <div class="form-group has-feedback">
                <label> Nama Lengkap</label>
                <input name="in_user_nama" type="text" class="form-control" placeholder="Nama Lengkap" required>
              </div>
              <div class="form-group has-feedback">
                <label>NIP</label>
                <input name="in_user_id" type="text" class="form-control" placeholder="NIP" required>
              </div>
              <div class="form-group has-feedback">
                <label>Email</label>
                <input name="in_user_email" type="email" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group has-feedback">
                <label>Password</label>
                <input name="in_user_password" type="text" class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group has-feedback">
                <label for="gender">Jenis Kelamin</label>
                <select name="in_m_gender_id" id="provinsi" class="form-control">
                  <option value="">Please Select</option>
                  <?php 
                    foreach ($gender as $g) {
                  ?>
                      <option value="<?php echo $g->m_gender_id;?>"><?php echo $g->gender_nama; ?></option>
                  <?php   
                    }
                  ?>
                </select>
              </div>
              <div class="form-group has-feedback">
                <label>Tempat Lahir</label>
                <input name="in_user_tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir">
              </div>
              <div class="form-group has-feedback">
                <label>Tanggal Lahir</label>
                <input name="in_user_tanggal_lahir" type="date" class="form-control" placeholder="Tanggal Lahir">
              </div>
              <div class="form-group has-feedback">
                <label>Alamat</label>
                <input name="in_user_alamat" type="text" class="form-control" placeholder="Alamat">
              </div>
              <div class="form-group has-feedback">
                <label>No HP</label>
                <input name="in_user_no_hp" type="text" class="form-control" placeholder="No. HP">
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
  </div>
</div>
<!-- Tambah Data Kepala Sekolah -->