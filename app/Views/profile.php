<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>WSFood</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

	<!-- Styles -->
	<!-- my css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">
	<!-- Bootstrap CSS -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<div class="container mt-5">
  <?php if(session()->getFlashdata('message')):?>
		<div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
	<?php endif;?>
  <?php if(session()->getFlashdata('error')):?>
		<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
	<?php endif;?>
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="<?= base_url('users/profile/'.$users['id']) ?>" class="list-group-item list-group-item-action active">Profile</a>
              <a href="<?= base_url('users/account-security/'.$users['id']) ?>" class="list-group-item list-group-item-action">Account security</a>
              <a href="<?= base_url('users/posting/'.$users['id']) ?>" class="list-group-item list-group-item-action">Posting</a>             
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Your Profile</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form method="post" action="<?= base_url('users/profile/edit/' . $users['id']) ?>">
                              <div class="form-group row">
                                <label for="nama" class="col-4 col-form-label">Nama</label> 
                                <div class="col-8">
                                  <input id="nama" name="nama" placeholder="nama" class="form-control here" required="required" type="text" value="<?= $users['nama'] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="email" class="form-control here" type="email" value="<?= $users['email'] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="nohp" class="col-4 col-form-label">Nomor Telepon</label> 
                                <div class="col-8">
                                  <input id="nohp" name="nohp" placeholder="nohp" class="form-control here" type="number" value="<?= $users['nohp'] ?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="alamat" class="col-4 col-form-label">Alamat</label> 
                                <div class="col-8">
                                  <textarea id="alamat" name="alamat" cols="40" rows="4" class="form-control"><?= $users['alamat'] ?></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                  <a href="<?= base_url('users/home') ?>"><button name="button" type="button" class="btn btn-warning">Home</button></a>
                                </div>
                              </div>
                        </form>
		                </div>
		            </div>    
		        </div>
		    </div>
		</div>
	</div>
</div>
</body>

</html>