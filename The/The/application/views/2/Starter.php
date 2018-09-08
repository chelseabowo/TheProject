<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/starter/css/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/starter/css/style.css">
</head>

<body>
<form method="POST" action="<?php echo base_url('2/C_sekolah/tambah_sekolah'); ?>" name="sekolah">
<div class="container" style="margin-top: 50px;">
    <h1 align="center">Form Daftar Sekolah</h1>
    <div id="app">
        <!--
        <step-navigation :steps="steps" :currentstep="currentstep">
        </step-navigation>
        -->
        <div v-show="currentstep == 1">
            <h3>Step 1</h3>
            <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah</label>
                <input type="text" name="in_nama_sekolah" class="form-control" placeholder="Nama Sekolah" onFocus="findstart();" onBlur="findstop();" required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="id_sekolah">ID Sekolah</label>
                <input type="text" name="in_id_sekolah" class="form-control" placeholder="ID Sekolah" readonly>
            </div>
            <div class="form-group">
                <label for="no_telp">No. Telepon</label>
                <input type="text" name="in_no_telp" class="form-control" placeholder="No. Telepon" required>
            </div>
        </div>

        <div v-show="currentstep == 2">
            <h3>Step 2</h3>
            <div class="form-group">
                <label for="alamat_sekolah">Alamat Sekolah</label>
                <input type="text" name="in_alamat" class="form-control" placeholder="Alamat Sekolah">
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
                        <option id='kota' class="<?php echo $kt->m_provinsi_id ?>" value="<?php echo $kt->m_kota_id ?>"><?php echo $kt->kota_nama ?></option>
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
                        <option id='kecamatan' class="<?php echo $kc->m_kota_id ?>" value="<?php echo $kc->m_kecamatan_id ?>"><?php echo $kc->kecamatan_nama ?></option>
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
                    <option id='kelurahan' class="<?php echo $kl->m_kecamatan_id ?>" value="<?php echo $kl->m_kelurahan_id ?>"><?php echo $kl->kelurahan_nama ?></option>
                <?php
                }
                ?>
                </select>
            </div>
        </div>

        <div v-show="currentstep == 3">
            <div class="container">
                <div class="row justify-content-center">
                        <div class="card card-body" style="background-color:#FFA5A5;" align="center">
                        <b>Pastikan Data Yang Anda Inputkan Telah Terisi Dengan Benar!</b>
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

</body>
</html>