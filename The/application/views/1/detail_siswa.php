          
          <div class="form-group has-feedback">
            <label> Nama Lengkap</label>
            <input name="in_m_user_id" type="hidden" class="form-control" value="<?php echo $murid['m_user_id']; ?>">
            <input name="in_user_nama" type="text" class="form-control" value="<?php echo $murid['user_nama']; ?>" readonly>
          </div>
          <div class="form-group has-feedback">
            <label>UserID</label>
            <input name="in_user_id" type="text" class="form-control" value="<?php echo $murid['user_id'] ?>" readonly>
          </div>
          <div class="form-group has-feedback">
            <label>Jenis Kelamin </label>
            <input name="in_gender" type="text" class="form-control" value="<?php echo $murid['gender_nama'] ?>" readonly>
          </div>
           <div class="form-group has-feedback">
            <label><table>Tempat Lahir</table></label>
            <input name="in_user_tempat_lahir" type="text" class="form-control" value="<?php echo $murid['user_tempat_lahir'] ?>" readonly>
          </div>
           <div class="form-group has-feedback">
            <label><table>Tanggal Lahir</table></label>
            <input name="in_user_tanggal_lahir" type="Date" class="form-control" value="<?php echo $murid['user_tanggal_lahir'] ?>" readonly>
          </div>
          <div class="form-group has-feedback">
            <label>Alamat</label>
            <input name="in_user_alamat" type="text" class="form-control" value="<?php echo $murid['user_alamat'] ?>" readonly>
          </div>
          <div class="form-group has-feedback">
            <label>Email</label>
            <input name="in_user_email" type="text" class="form-control" value="<?php echo $murid['user_email'] ?>" readonly>
          </div>
          <div class="form-group has-feedback">
            <label>No Hp</label>
            <input name="in_user_no_hp" type="text" class="form-control" value="<?php echo $murid['user_no_hp'] ?>" readonly>
          </div>  
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
          Close
        </button>
      </div>
      
        </form>
        
    