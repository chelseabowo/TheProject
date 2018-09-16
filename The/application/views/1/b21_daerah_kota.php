<h3><b>Daftar Kota/ Kabupaten</b></h3>
<a href="#" class="btn btn-success btn-sm" data-target="#modal_tambah_data" data-toggle="modal">Tambah Provinsi</a>
</br>
<div class='table-responsive' style="background-color:#E3FB71;">
  </br>
  <table id="myTable" class='table table-bordered' syle="color:#CDF76F">
    <thead>
      <tr style="background-color:#906CD7;">
        <th style="color:#CDF76F;" width="5%">NO.</th>
        <th style="color:#CDF76F;" width="60%">Kota/ Kabupaten</th>
        <th style="color:#CDF76F;" width="20%">Description</th>
        <th style="color:#CDF76F;" width="15%">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1;
        foreach ($kota as $ko) {
      ?>
      <tr style="background-color:#F7FFE6;">
        <td><?php echo $no++ ?></td>
        <td><a href="<?php echo base_url('1/C_daerah/kecamatan/'.$ko->m_kota_id);?>"><?php echo $ko->kota_nama; ?></a></td>
        <td><a class="btn btn-info btn-xs" href="#detail_provinsi" data-toggle="modal" data-id="<?php echo $ko->m_kota_id;?>">Detail</td>
        <td>
          <a class="btn btn-success btn-xs" href="#edit_data_provinsi" data-toggle="modal" data-id="<?php echo $ko->m_kota_id;?>">Edit</a>
          &nbsp;
          <a class="btn btn-danger btn-xs" href="#" onclick="delete_provinsi('<?php echo base_url('1/C_daerah/hapus_provinsi/'); echo $ko->m_kota_id; ?>');">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </br>
</div>

<div class="center-text">
  <a href="<?php echo base_url('1/C_daerah/'); ?>" class="btn btn-info btn-md" style="text-align: center;"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Provinsi</a>
</div>