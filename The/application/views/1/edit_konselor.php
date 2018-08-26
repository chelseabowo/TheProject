
         <?php foreach($m_user as $u){ ?>
        
          <form action="<?php echo base_url(). '1/C_konselor/update_konselor'; ?>" method="post">
          
          <div class="form-group has-feedback">
            <label> Nama Lengkap</label>
            <input name="in_m_user_id" type="hidden" class="form-control" value="<?php echo $u->m_user_id ?>">
    
            <input name="in_user_nama" type="text" class="form-control" value="<?php echo $u->user_nama ?>">
          </div>
          <div class="form-group has-feedback">
            <label>UserID</label>
            <input name="in_user_id" type="text" class="form-control" value="<?php echo $u->user_id ?>">
          </div>
          <div class="form-group has-feedback">
            <label>Password</label>
            <input name="in_user_password" type="password" id="reg_password" class="form-control" value="<?php echo $u->user_password ?>">
            <input type='checkbox' id='toggle' value='0' onchange='togglePassword(this);'>
                &nbsp; <span id='toggleText'>Show</span>
          </div>
          <div class="form-group has-feedback">
            <label>Jenis Kelamin </label>
            <input name="in_m_gender_id" type="radio" value="1" >Perempuan
            <input name="in_m_gender_id" type="radio" value="2" >Laki-laki
          </div>
           <div class="form-group has-feedback">
            <label><table>Tempat Lahir</table></label>
            <input name="in_user_tempat_lahir" type="text" class="form-control" value="<?php echo $u->user_tempat_lahir ?>">
          </div>
           <div class="form-group has-feedback">
            <label><table>Tanggal Lahir</table></label>
            <input name="in_user_tanggal_lahir" type="Date" class="form-control" value="<?php echo $u->user_tanggal_lahir ?>">
          </div>
          <div class="form-group has-feedback">
            <label>Alamat</label>
            <input name="in_user_alamat" type="text" class="form-control" value="<?php echo $u->user_alamat ?>">
          </div>
          <div class="form-group has-feedback">
            <label>Email</label>
            <input name="in_user_email" type="text" class="form-control" value="<?php echo $u->user_email ?>">
          </div>
          <div class="form-group has-feedback">
            <label>No Hp</label>
            <input name="in_user_no_hp" type="text" class="form-control" value="<?php echo $u->user_no_hp ?>">
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
        <?php } ?>
    