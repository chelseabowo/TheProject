<form action="<?php echo base_url('2/C_kelas/tambah_kelas'); ?>" method="POST" name="kelas">
          <div class="form-group has-feedback">
            <label for="">Nama Kelas</label>
            <input name="in_nama_kelas" type="text" class="form-control"  onFocus="findstart();" onBlur="findstop();">
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

<!-- Find ID Sekolah -->
<script> 
function findstart(){
interval = setInterval("find()",1);}
function find(){
var in_s = document.kelas.in_nama_kelas.value;
var hasil = in_s.split(" ").join("");

document.kelas.in_id_kelas.value = hasil.toUpperCase();
}
function findstop(){
clearInterval(interval);}
</script>
<!-- Find ID Sekolah -->
