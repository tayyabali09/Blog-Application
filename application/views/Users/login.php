<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/user/login.css') ?>">
<body id="LoginForm">
<div class="container">
<!-- <h1 class="form-heading">login Form</h1> -->
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Login</h2>
   <p>Please enter your email and password</p>
    

                   <!-- Success Flash Message -->   
        <?php
              if($this->session->flashdata('success_msg')){

                  ?>
                  <center>
                  <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success_msg'); ?>
                  </div>
                  </center>
                <?php  
                }
               ?>

               <!-- Error Flash Message -->
               <?php

              if($this->session->flashdata('error_msg')){
                  ?>
                  <center>
                  <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error_msg'); ?>
                  </div>
                  </center>
                <?php  
                }
               ?>
   </div>
          <?php echo validation_errors(); ?>

         <?php echo form_open_multipart('user/authcheck'); ?>

        <div class="form-group">


            <input type="email" class="form-control" name="email" placeholder="email">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" name="password" placeholder="Password">

        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
    </div>

</div></div></div>


</body>