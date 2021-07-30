<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Validasi Form di CodeIgniter</h2><br>
    <?php if (validation_errors())
    {?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
        <?php
    } ?>
    <form action="<?php echo base_url()?>form_validation/aksi" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" />
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" />
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" class="form-control" placeholder="Masukan Email" />
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="text" name="password" class="form-control" placeholder="Masukan Password" />
        </div>
        <div class="form-group">
            <label>Konfirmasi Password:</label>
            <input type="text" name="konfirmasi_password" class="form-control" placeholder="Masukan Konfirmasi Password" />
        </div>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
</body>
</html>