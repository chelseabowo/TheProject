<form action="<?php echo base_url('2/C_kelas/update_kelas'); ?>" method="POST" name="kelas_edit">
          <div class="form-group has-feedback">
            <input name="in_kelas_id" type="hidden" class="form-control" value="<?php echo $edit['d_kelas_id'] ?>">
            <label for="">Nama Kelas</label>
            <input name="in_nama_kelas_edit" type="text" class="form-control"  onFocus="findstart_edit();" onBlur="findstop_edit();" value="<?php echo $edit['kelas_nama'] ?>">
          </div>
          <div class="form-group has-feedback">
            <label for="">ID Kelas</label>
            <input name="in_id_kelas_edit" type="text" class="form-control" value="<?php echo $edit['kelas_id'] ?>" readonly>
          </div>
          <div class="form-group has-feedback">
            <label for="">Wali Kelas</label>
            <input name="in_wali_kelas_edit" type="text" class="form-control" >
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

<!-- Find ID Sekolah -->
<script> 
function findstart_edit(){
interval = setInterval("find_edit()",1);}
function find_edit(){
var in_s_edit = document.kelas_edit.in_nama_kelas_edit.value;
var hasil_edit = in_s_edit.split(" ").join("");

document.kelas_edit.in_id_kelas_edit.value = hasil_edit.toUpperCase();
}
function findstop_edit(){
clearInterval(interval);}
</script>
<!-- Find ID Sekolah -->
