 <?php foreach($d_sekolah as $u){ ?>
            <form action="<?php echo base_url(). '1/C_sekolah/update_sekolah'; ?>" method="post">
          
            <div class="form-group has-feedback">
              <label for="">Nama Sekolah</label>
              <input type="hidden" name="id" value="<?php echo $u->d_sekolah_id ?>">
              <input name="in_nama_sekolah" type="text" class="form-control" value="<?php echo $u->sekolah_nama ?>">
            </div>
            <div class="form-group has-feedback">
              <label for="">ID Sekolah</label>
              <input name="in_id_sekolah" type="text" class="form-control" value="<?php echo $u->sekolah_nama ?>">
            </div>
            <div class="form-group has-feedback">
              <label for="">Alamat Sekolah</label>
              <input name="in_alamat" type="text" class="form-control" value="<?php echo $u->sekolah_nama ?>">
            </div>
            <div class="form-group has-feedback">
              <label for="">No. Telpon</label>
              <input name="in_no_telp" type="text" class="form-control" value="<?php echo $u->sekolah_nama ?>">
            </div> 
          </div>
           <div class="form-group has-feedback">
            <label for="">Provinsi</label>
            <select name="in_provinsi" id="provinsi" class="form-control" required>
              <option value="">Please Select</option>
              <?php 
              foreach ($provinsi as $pro) {
              ?>
              <option value="<?php echo $pro->m_provinsi_id;?>"><?php echo $pro->provinsi_nama; ?></option>
              <?php 
              }
              ?>
            </select>
          </div>
          <div class="form-group has-feedback">
            <label for="">Kota/Kabupaten</label>
            <select name="in_kota" id="kota" class="form-control" requiered>
              <option value="">Please Select</option>
              <?php
              foreach ($kota as $kt) {
              ?>
              <option id='kota' class="<?php echo $kt->m_provinsi_id ?>" value="<?php echo $kt->m_kota_id ?>"><?php echo $kt->kota_nama ?>
              </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group has-feedback">
            <label for="">Kecamatan</label>
            <select name="in_kecamatan" id="kecamatan" class="form-control" requiered>
              <option value="">Please Select</option>
              <?php
              foreach ($kecamatan as $kc) {
              ?>
              <option id='kecamatan' class="<?php echo $kc->m_kota_id ?>" value="<?php echo $kc->m_kecamatan_id ?>"><?php echo $kc->kecamatan_nama ?>
              </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group has-feedback">
            <label for="">Kelurahan</label>
            <select name="in_kelurahan" id="kelurahan" class="form-control" requiered>
              <option value="">Please Select</option>
              <?php
              foreach ($kelurahan as $kl) {
              ?>
              <option id='kelurahan' class="<?php echo $kl->m_kecamatan_id ?>" value="<?php echo $kl->m_kelurahan_id ?>"><?php echo $kl->kelurahan_nama ?>
              </option>
              <?php
              }
              ?>
            </select>
                  <div class="modal-footer">
        <button class="btn btn-success" type="submit">
          Submit
        </button>
   
      </div>
      
        </form>
        <?php } ?>
<!-- Auto Dropdown Changed -->
<script src="<?php echo base_url(); ?>/admin/jquery.chained.min.js"></script>
<script>
    $("#kota").chained("#provinsi");
    $("#kecamatan").chained("#kota");
    $("#kelurahan").chained("#kecamatan");
</script>
<!-- Auto Dropdown Changed -->