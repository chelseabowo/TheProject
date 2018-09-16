<h3><b>Profil Kelas</b></h3>
  <div class="row" style="background-color:#EEE8FF;">
    <div col-md-8>
      <div class="form-group">
        <label class="control-label col-md-2">Kelas</label>
        <div class="col-md-6">
          <b><?php echo $wk['kelas_nama']; ?></b>
        </div>
      </div>
    </div></br>
    <div col-md-8>
      <div class="form-group">
        <label class="control-label col-md-2">ID Kelas</label>
        <div class="col-md-8">
          <?php echo $wk['kelas_id']; ?>
        </div>
      </div>
    </div></br>
    <div col-md-8>
      <div class="form-group">
        <label class="control-label col-md-2">Wali Kelas</label>
        <div class="col-md-8">
          <?php 
          if($wk['wali_kelas'] ==NULL){ ?>
            <a href="#" class="btn btn-success btn-xs" data-target="#modal_tambah_wali_kelas" data-toggle="modal">Tambah Wali Kelas</a>          
          <?php
          }else{
            echo $wk['wali_kelas'];
          }
          ?>
        </div>
      </div></br>
    </div>
    </br>
  </div>
<hr>

<h3><b>Daftar Siswa/Siswi</b></h3>
<a href="#" class="btn btn-success btn-sm" data-target="#modal_tambah_data" data-toggle="modal">Tambah Data Siswa/Siswi</a>
</br>
<div class='table-responsive' style="background-color:#E3FB71;">
  </br>
  <table id="myTable" class='table table-bordered' syle="color:#CDF76F">
    <thead>
      <tr style="background-color:#906CD7;">
        <th style="color:#CDF76F;" width="5%">NO.</th>
        <th style="color:#CDF76F;" width="40%">Nama Siswa</th>
        <th style="color:#CDF76F;" width="25%">UserID/NIP/NIS</th>
        <th style="color:#CDF76F;" width="15%">Description</th>
        <th style="color:#CDF76F;" width="15%">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1;
        foreach ($list_siswa as $ssw) {
      ?>
      <tr style="background-color:#F7FFE6;">
        <td><?php echo $no++ ?></td>
        <td><?php echo $ssw->user_nama; ?></td>
        <td><?php echo $ssw->user_id;?></td>
        <td align="center"><a class="btn btn-info btn-xs" href="#detail_siswa" data-toggle="modal" data-id="<?php echo $ssw->m_user_id;?>">Detail</a></td>
       <td>
          <a class="btn btn-success btn-xs" href="#edit_detail_siswa" data-toggle="modal" data-id="<?php echo $ssw->m_user_id;?>">Edit</a>
          &nbsp;
          <a class="btn btn-danger btn-xs" href="#" onclick="confirm_delete_siswa('<?php echo base_url('1/C_detail_kelas/hapus_siswa/'); echo $ssw->m_user_id; ?>');">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </br>
</div>
<hr>

<div class="center-text">
  <a href="<?php echo base_url('1/C_kelas/index/'); echo $wk['d_sekolah_id']; ?>" class="btn btn-info btn-md" style="text-align: center;"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Profil Sekolah</a>
</div>

<!-- Detail Data Siswa -->
<div class="modal fade" id="detail_siswa" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Siswa/Siswi</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data-detail"></div>
            </div>
            
        </div>
  </div>
</div>
<!-- Detail Data Siswa -->

<!-- Edit Data Siswa -->
<div class="modal fade" id="edit_detail_siswa" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Siswa</h4>
            </div>
            <div class="modal-body">
                <div class="data-to-edit"></div>
            </div>
            
        </div>
  </div>
</div>
<!-- Edit Data Siswa -->

<!-- Hapus Data Siswa --> 
<div class="modal fade" id="modal_hapus_data_siswa">
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
<!-- Hapus Data Siswa -->

<!-- Hapus Data Sekolah -->
<script type="text/javascript">
    function confirm_delete_siswa(delete_url)
    {
      $('#modal_hapus_data_siswa').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<!-- Hapus Data Sekolah -->

<!-- Detail Siswa/Siswi -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#detail_siswa').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
      
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url('1/C_detail_kelas/tampil_detail_siswa/');?>'+ idx,
                success : function(data){
                $('.hasil-data-detail').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>
<!-- Detail Siswa/Siswi -->

<!-- Edit Data Siswa -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_detail_siswa').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
      
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url('1/C_detail_kelas/edit_detail_siswa/');?>'+ idx,
                success : function(data){
                $('.data-to-edit').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>
<!-- Edit Data Siswa -->

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

<!-- Tambah Data Murid -->
<div id="modal_tambah_data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Murid</h4>
      </div>

      <ul class="nav nav-pills nav-justified">
        <li class="active"><a data-toggle="pill" href="#signin">Sign In</a></li>
        <li><a data-toggle="pill" href="#signup">Sign Up</a></li>
      </ul>

      <div class="modal-body">
        <div class="tab-content">
          <div id="signin" class="tab-pane fade in active">
          <form action="<?php echo base_url('1/C_detail_kelas/signin_murid'); ?>" method="POST">
              <input name="in_d_kelas_id" type="hidden" class="form-control" value="<?php echo $d_kelas_id; ?>">
              <div class="form-group has-feedback">
                <label>NIS</label>
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

          <form action="<?php echo base_url('1/C_detail_kelas/signup_murid'); ?>" method="POST">
          <input name="in_d_kelas_id" type="hidden" class="form-control" value="<?php echo $d_kelas_id; ?>">
          <div class="form-group has-feedback">
            <label> Nama Lengkap</label>
            <input name="in_user_nama" type="text" class="form-control" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group has-feedback">
            <label>NIS</label>
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
<!-- Tambah Data Murid -->

<!-- Tambah Data Wali Kelas -->
<div id="modal_tambah_wali_kelas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            
            <form action="<?php echo base_url('1/C_detail_kelas/signin_wali_kelas'); ?>" method="POST">
              <input name="in_d_kelas_id" type="hidden" class="form-control" value="<?php echo $d_kelas_id; ?>">
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

            <form action="<?php echo base_url('1/C_detail_kelas/tambah_baru_wali_kelas'); ?>" method="POST">
              <input name="in_d_kelas_id" type="hidden" class="form-control" value="<?php echo $d_kelas_id; ?>">
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
<!-- Tambah Data Wali Kelas -->