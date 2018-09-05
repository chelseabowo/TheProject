<?php 
$gen1 = '';
$gen2 = '';
$edit_gender = isset($profil['m_gender_id'])?$profil['m_gender_id'] : $this->input->post('in_gender');
if ($edit_gender=='1')      { $gen1 = " selected"; }
else if ($edit_gender=='2') { $gen2 = " selected"; }
else{$edit_gender = " selected";}
?>
<h2>Personal info</h2>
<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          <input class="form-control" type="file">
        </div>
        <div style="margin-top:5px;">
          <a href="#" class="form-control btn btn-md btn-success" data-target="#modal_edit_password" data-toggle="modal">Edit Password</a>
        </div>
      </div>
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
      <form action="<?php echo base_url('2/C_profil/edit_profil/'); ?>" class="form-horizontal" method="POST">
			<div class="form-group">
            <label class="control-label col-md-3 ">Username:</label>
            <div class="col-md-8">
              <input name="in_user_nama" class="form-control" value="<?php echo $profil['user_nama']; ?>" type="text">
            </div>
			</div>
			<div class="form-group">
            <label class="col-lg-3 control-label">Sekolah:</label>
            <div class="col-lg-6">
              <input class="form-control" value="<?php echo $profil['sekolah_nama']; ?>" type="text" readonly>
            </div>
            <div class="col-md-2">
              <a href="#" class="btn btn-primary form-control" data-target="#modal_edit_sekolah" data-toggle="modal">Lihat</a>
            </div>
			</div>
      <div class="form-group">
            <label class="col-lg-3 control-label">TTL:</label>
            <div class="col-lg-5">
              <input name="in_tempat_lahir" class="form-control" value="<?php echo $profil['user_tempat_lahir'] ; ?>" type="text">
            </div>
            <div class="col-lg-3">
              <input name="in_tanggal lahir" class="form-control" value="<?php echo $profil['user_tanggal_lahir']; ?>" type="date">
            </div>
      </div>
      <div class="form-group">
            <label class="col-lg-3 control-label">Jenis Kelamin :</label>
            <div class="col-lg-8">
              <select name="in_gender" class="form-control">
              <option value="1" <?php echo $gen1; ?>  >Perempuan</option>        
              <option value="2" <?php echo $gen2; ?>  >Laki-Laki</option>
              </select>
            </div>
      </div>
      <div class="form-group">
            <label class="col-lg-3 control-label">Alamat:</label>
            <div class="col-lg-8">
              <input name="in_alamat" class="form-control" value="<?php echo $profil['user_alamat']; ?>" type="text">
            </div>
      </div>
			<div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input name="in_email" class="form-control" value="<?php echo $profil['user_email']; ?>" type="email">
            </div>
			</div>
      <div class="form-group">
            <label class="col-lg-3 control-label">No HP:</label>
            <div class="col-lg-8">
              <input name="in_no_hp" class="form-control" value="<?php echo $profil['user_no_hp']; ?>" type="text">
            </div>
      </div>

			<div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-2">
              <button class="form-control btn btn-success" type="submit">
                Edit
              </button>
			      </div>
			</div>
        </form>
      </div>
  </div>
<hr>

<!-- Edit Password-->
<div id="modal_edit_sekolah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Edit Sekolah</h4>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url('2/C_profil/edit_sekolah/'); ?>" method="POST" name="sekolah">
          <div class="form-group has-feedback">
            <label>ID Sekolah</label>
            <input name="in_nama_sekolah" type="text" class="form-control" onFocus="findstart();" onBlur="findstop();">
            <input name="in_id_sekolah" type="hidden" class="form-control">
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
<!-- Edit Password -->

<!-- Edit Password-->
<div id="modal_edit_password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Edit Password</h4>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url('2/C_profil/edit_password/'); ?>" method="POST" name="kelas">
          <div class="form-group has-feedback">
            <label>Password Lama</label>
            <input name="in_old_password" type="password" id="password1" class="form-control">
          </div>
          <div class="form-group has-feedback">
            <label>Password Baru</label>
            <input name="in_new_password" type="password" id="password2" class="form-control">
          </div>
          <div class="form-group has-feedback">
            <label>Konfirmasi Password</label>
            <input name="in_confirm_password" type="password" id="password3" class="form-control">
          </div>
          <div class="form-group has-feedback">
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
<!-- Edit Password -->

<!-- JS Show/Hide Password -->
<script type="text/javascript">
 function togglePassword(el){
  // Checked State
  var checked = el.checked;

  if(checked){
   // Changing type attribute
   document.getElementById("password1").type = 'text';
   document.getElementById("password2").type = 'text';
   document.getElementById("password3").type = 'text';   
   // Change the Text
   document.getElementById("toggleText").textContent= "Hide";
  }else{
   // Changing type attribute
   document.getElementById("password1").type = 'password';
   document.getElementById("password2").type = 'password';
   document.getElementById("password3").type = 'password';
   // Change the Text
   document.getElementById("toggleText").textContent= "Show";
  }
 }
</script>
<!-- JS Show/Hide Password -->

<!-- Find ID Sekolah -->
<script> 
function findstart(){
interval = setInterval("find()",1);}
function find(){
var in_s = document.sekolah.in_nama_sekolah.value;
var hasil = in_s.split(" ").join("");

document.sekolah.in_id_sekolah.value = hasil.toUpperCase();
}
function findstop(){
clearInterval(interval);}
</script>
<!-- Find ID Sekolah -->