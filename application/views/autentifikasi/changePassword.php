<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" Content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pustaka-booking | Login </title>


    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
<div class="container">

 	<!-- Outer Row -->
 	<div class="row justify-content-center">

 		<div class="col-lg-7">

 			<div class="card o-hidden border-0 shadow-lg my-5">
 				<div class="card-body p-0">
 				<!-- Nested Row within Card Body -->
 					<div class="row">
						<div class="col-lg">
							<div class="p-5">
 								<div class="text-center">
									<h1 class="h4 text-gray-900 "
									>Change your Password for</h1>
                                    <h5 class="mb-4"><?= $this->session->userdata('reset_email') ?></h5>
 										</div>
										<?= $this->session->flashdata('pesan'); ?>
 										<form class="user" method="post"
						action="<?= base_url('autentifikasi/changePassword'); ?>">
 											<div class="form-group">
 												<input type="password"
						class="form-control form-control-user" id="password1" placeholder="Enter new password" name="password1">
 												<?= form_error('password1',
						'<small class="text-danger pl-3">', '</small>'); ?>
 										</div>
                                         <div class="form-group">
 												<input type="password"
						class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
 												<?= form_error('password2',
						'<small class="text-danger pl-3">', '</small>'); ?>
 										</div>
											<button type="submit" class="btn
						btn-primary btn-user btn-block">
 										Change Password
 									</button>
								 </form>
 											</div>
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
			</div>