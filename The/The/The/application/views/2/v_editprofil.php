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
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="control-label col-md-3 ">Username:</label>
            <div class="col-md-8">
              <input class="form-control" value="<?php
                  echo $itsme['user_nama']; 
                ?>" type="text" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Sekolah:</label>
            <div class="col-lg-8">
              <input class="form-control" value="" type="text" >
            </div>
          </div>
          <!-- menampilkan data sekolah dari user -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control"  value="<?php
                  echo $itsme['user_email']; 
                ?>" type="text" >
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
             <input class="btn btn-primary" value="Save Change" type="button">
              <span></span>
              <input class="btn btn-default" value="Cancel" type="reset">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>