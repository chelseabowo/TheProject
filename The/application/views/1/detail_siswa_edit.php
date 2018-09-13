<?php 
$gen1 = '';
$gen2 = '';
$edit_gender = isset($murid['m_gender_id'])?$murid['m_gender_id'] : $this->input->post('in_m_gender_id');
if ($edit_gender=='1')      { $gen1 = " selected"; }
else if ($edit_gender=='2') { $gen2 = " selected"; }
else{$edit_gender = " selected";}
?>
    <form action="<?php echo base_url('1/C_detail_kelas/edit_detail_profil/'); ?>"   method="POST">
    <div class="form-group has-feedback">
      <label> Nama Lengkap</label>
      <input name="in_m_user_id" type="hidden" class="form-control" value="<?php echo $murid['m_user_id']; ?>">
      <input name="in_user_nama" type="text" class="form-control" value="<?php echo $murid['user_nama']; ?>">
    </div>
    <div class="form-group has-feedback">
      <label>UserID</label>
      <input name="in_user_id" type="text" class="form-control" value="<?php echo $murid['user_id'] ?>">
    </div>
    <div class="form-group has-feedback">
      <label>Password</label>
      <input name="in_user_password" type="text" class="form-control" value="<?php echo $murid['user_password'] ?>">
    </div>
    <div class="form-group has-feedback">
      <label>Jenis Kelamin </label>
      <select name="in_m_gender_id" class="form-control">
        <option value="1" <?php echo $gen1; ?>  >Perempuan</option>
        <option value="2" <?php echo $gen2; ?>  >Laki-Laki</option>
      </select>
    </div>
      <div class="form-group has-feedback">
      <label><table>Tempat Lahir</table></label>
      <input name="in_user_tempat_lahir" type="text" class="form-control" value="<?php echo $murid['user_tempat_lahir'] ?>">
    </div>
      <div class="form-group has-feedback">
      <label><table>Tanggal Lahir</table></label>
      <input name="in_user_tanggal_lahir" type="Date" class="form-control" value="<?php echo $murid['user_tanggal_lahir'] ?>">
    </div>
    <div class="form-group has-feedback">
      <label>Alamat</label>
      <input name="in_user_alamat" type="text" class="form-control" value="<?php echo $murid['user_alamat'] ?>">
    </div>
    <div class="form-group has-feedback">
      <label>Email</label>
      <input name="in_user_email" type="text" class="form-control" value="<?php echo $murid['user_email'] ?>">
    </div>
    <div class="form-group has-feedback">
      <label>No Hp</label>
      <input name="in_user_no_hp" type="text" class="form-control" value="<?php echo $murid['user_no_hp'] ?>">
    </div>  
  <div class="modal-footer">
    <button class="btn btn-success" type="submit">
      Submit
    </button>
    
    <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
      Close
    </button>
  </div>      
</form>
        
    