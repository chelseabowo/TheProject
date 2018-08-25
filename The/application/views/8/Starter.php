<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Konselor</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/starter/css/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/starter/css/style.css">
</head>

<body>
<form method="POST" action="<?php echo base_url('7/C_starter/update_registrasi'); ?>" name="sekolah">
<div class="container" style="margin-top: 50px;">
    <h1 align="center">Form Data Pribadi</h1>
    <div id="app">
        <!--
        <step-navigation :steps="steps" :currentstep="currentstep">
        </step-navigation>
        -->
        <div v-show="currentstep == 1">
            <h3>Step 1 : Data Sekolah</h3>
            <div class="form-group">
                <label for="sekolah">ID Sekolah</label>
                <input type="text" name="in_sekolah" class="form-control" placeholder="ID Sekolah" onFocus="findstart_sekolah();" onBlur="findstop_sekolah();" required>
                <input type="hidden" name="in_id_sekolah" class="form-control" placeholder="ID Sekolah" readonly>
                <label for="sekolah">ID Kelas</label>
                <input type="text" name="in_kelas" class="form-control" placeholder="ID Kelas" onFocus="findstart_kelas();" onBlur="findstop_kelas();" required>
                <input type="hidden" name="in_id_kelas" class="form-control" placeholder="ID Kelas" readonly>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
        </div>

        <div v-show="currentstep == 2">
            <h3>Step 2 : Data Pribadi</h3>
            <div class="form-group">
                <label for="tampat_lahir">Tempat Lahir</label>
                <input type="text" name="in_tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="in_tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group has-feedback">
                <label for="gender">Jenis Kelamin</label>
                <select name="in_gender" id="provinsi" class="form-control" required>
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
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="in_alamat" class="form-control" placeholder="(Sesuai Dengan KTP/SIM)" required>
            </div>
            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" name="in_no_hp" class="form-control" placeholder="08xxxx" required>
            </div>
        </div>

        <div v-show="currentstep == 3">
            <div class="container">
                <div class="row justify-content-center">
                        <div class="card card-body" style="background-color:#FFA5A5;" align="center">
                        <b>Pastikan Semua Field Sudah Anda Isi,</b>
                        <b>Dan Pastikan Data Yang Anda Inputkan Telah Terisi Dengan Benar!</b>
                        </div>
                </div>
            </div>
        </div>

        <step v-for="step in steps" :currentstep="currentstep" :key="step.id" :step="step" :stepcount="steps.length" @step-change="stepChanged">
        </step>

<!-- Progress Bar -->
<script type="x-template" id="step-navigation-template">
    <ol class="step-indicator">
        <li v-for="step in steps" is="step-navigation-step" :key="step.id" :step="step" :currentstep="currentstep">
        </li>
    </ol>
</script>
<script type="x-template" id="step-navigation-step-template">
    <li :class="indicatorclass">
        <div class="step"><i :class="step.icon_class"></i></div>
        <div class="caption hidden-xs hidden-sm">Step <span v-text="step.id"></span>: <span v-text="step.title"></span></div>
    </li>
</script>
<script type="x-template" id="step-template">
    <div class="step-wrapper" :class="stepWrapperClass">
        <button type="button" class="btn btn-primary" @click="lastStep" :disabled="firststep">
            Back
        </button>
        <button type="button" class="btn btn-primary" @click="nextStep" :disabled="laststep">
            Next
        </button>
        <button type="submit" class="btn btn-primary" v-if="laststep">
            Submit
        </button>
    </div>
</script>
<!-- Progress Bar -->

    </div>
</div>
</form>

<!-- Default Template -->
<script src='<?php echo base_url(); ?>assets/starter/js/vue.js'></script>
<script  src="<?php echo base_url(); ?>assets/starter/js/index.js"></script>
<!-- Default Template -->

<!-- Auto Dropdown Changed -->
<script src="<?php echo base_url()?>assets/admin/js/jquery2.0.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/jquery.chained.min.js"></script>
<script>
    $("#kota").chained("#provinsi");
    $("#kecamatan").chained("#kota");
    $("#kelurahan").chained("#kecamatan");
</script>
<!-- Auto Dropdown Changed -->

<!-- Find ID Sekolah -->
<script> 
function findstart_sekolah(){
interval = setInterval("find_s()",1);}
function find_s(){
var in_s = document.sekolah.in_sekolah.value;
var hasil_s = in_s.split(" ").join("");

document.sekolah.in_id_sekolah.value = hasil_s.toUpperCase();
}
function findstop(){
clearInterval(interval);}
</script>
<!-- Find ID Sekolah -->

<!-- Find ID Sekolah -->
<script> 
function findstart_kelas(){
interval = setInterval("find_k()",1);}
function find_k(){
var in_k = document.sekolah.in_kelas.value;
var hasil_k = in_k.split(" ").join("");

document.sekolah.in_id_kelas.value = hasil_k.toUpperCase();
}
function findstop_kelas(){
clearInterval(interval);}
</script>
<!-- Find ID Sekolah -->

</body>
</html>