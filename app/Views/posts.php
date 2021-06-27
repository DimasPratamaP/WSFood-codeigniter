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
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="<?= base_url('users/profile/'.$users['id']) ?>" class="list-group-item list-group-item-action">Profile</a>
              <a href="<?= base_url('users/account-security/'.$users['id']) ?>" class="list-group-item list-group-item-action">Account security</a>
              <a href="<?= base_url('users/posting/'.$users['id']) ?>" class="list-group-item list-group-item-action active">Posting</a>              
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Posting</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-image">
                                        <thead>
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $no => $d) : ?>
                                            <tr>
                                                <?php if ($no === 0) ?>
                                                <th scope="row"><?= $no+1 ?></th>
                                                <td class="w-25">
                                                    <img src="<?= base_url('img/'.$d->image) ?> " class="img-fluid img-thumbnail" alt="Sheep">
                                                </td>
                                                <td><?= $d->judul ?></td>
                                                <td><?= $d->deskripsi ?></td>
                                                <td><a><button name="button" type="button" class="btn btn-success">Edit</button></a>
                                                    <a><button name="button" type="button" class="btn btn-danger">Delete</button></a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        </table>   
                                    </div>
                                    <div class="offset-4 col-8 mt-4">
                                        <a href="<?= base_url('users/home') ?>"><button name="button" type="button" class="btn btn-warning">Home</button></a>
                                    </div>
                                </div>
                            </div>
		                </div>
		            </div>    
		        </div>
		    </div>
		</div>
	</div>
</div>
</body>

</html>