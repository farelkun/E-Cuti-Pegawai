<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="img/png" sizes="16x16" href="<?php echo base_url() ?>assets/production/images/sumenep.png">
  <title>E - Cuti</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url(); ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <?php echo form_open_multipart('Login'); ?>
          <h1>Login</h1>
          <?php echo $this->session->flashdata('message'); ?>
          <div>
            <input type="text" class="form-control form-control-user" name="username" placeholder="Username" value="<?= set_value('username'); ?>" />
            <small><span class="text-danger"><i><?php echo form_error('username'); ?></i></span></small>
          </div>
          <div>
            <input type="password" class="form-control" name="password" placeholder="Password" />
            <small><span class="text-danger"><i><?php echo form_error('password'); ?></i></span></small>
          </div>
          <div>
            <button type="submit" name="submit" class="btn btn-default submit">Log in</button>
          </div>

          <div class="clearfix"></div>

          <div class="separator">


            <div class="clearfix"></div>
            <br />

            <div>
              <h1><img src="<?php echo base_url() ?>assets/production/images/sumenep.png" alt="" width="50px" height="50px"> E - Cuti</h1>
              <p>Copyright © 2019 vsiuuv. All rights reserved.</p>
            </div>
          </div>
          <?php echo form_close(); ?>
        </section>
      </div>
    </div>
  </div>
</body>

</html>