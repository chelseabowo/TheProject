<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input class="form-control" type="file">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          </div>
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="control-label col-md-3 ">Username:</label>
            <div class="col-md-8">
              <input class="form-control" id="disabledInput" value="<?php
                  echo $itsme['user_nama']; 
                ?>" type="text" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Sekolah:</label>
            <div class="col-lg-8">
              <input class="form-control" id="disabledInput" value="" type="text" disabled>
            </div>
          </div>
          <!-- menampilkan data sekolah dari user -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" id="disabledInput" value="<?php
                  echo $itsme['user_email']; 
                ?>" type="text" disabled>
            </div>
          </div>
<!--           <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" value="<?php
                  echo $itsme['user_password']; 
                ?>" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" value="11111122333" type="password">
            </div>
          </div> -->
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <a href="<?php echo base_url('2/C_editprofil/index/'); ?>"><input class="btn btn-primary" value="Edit" type="button">
              <span></span>
              <input class="btn btn-default" value="Cancel" type="reset">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>