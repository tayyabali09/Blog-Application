<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="<?php echo site_url('assets/css/Style.css') ?>" rel="stylesheet" type="text/css">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



    <title>Blog Application!</title>
  </head>
  <body>


<div class="container-fluid">
 
  <!-- Second navbar for sign in -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" style="color: #6a9dea;"  href="<?php echo base_url(); ?>">Blog Application</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"  style="color: #6a9dea;" href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: #6a9dea;" href="<?php echo base_url(); ?>Pages/about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: #6a9dea;" href="<?php echo base_url(); ?>Pages/posts">Posts</a>
      </li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
          <?php if(!$this->session->userdata('logged_in')) : ?>
            <li><a href="<?php echo base_url(); ?>user/login">Login</a></li>
            <li><a href="<?php echo base_url(); ?>User/register">Register</a></li>
          <?php endif; ?>
         
          <?php if($this->session->userdata('logged_in')) : ?>
          
            <ul class="nav nav-pills">

                    <li class="dropdown">

                        <a href="#" style="top: 5px" style="color: #6a9dea;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account </a>

                        <ul class="dropdown-menu">

                            <li><a href="<?php echo base_url('User/dashboard'); ?>">My Profile</a></li>

                            <li role="separator" class="divider"></li>
  
<!--                            <li><a href="<?php echo base_url(); ?>Pages/create_post">Create Post</a></li> -->
                          <li><a href="<?php echo base_url(); ?>categories/create_category">Create Category</a></li>
                          <li><a href="<?php echo base_url(); ?>user/edit_profile">Edit Profile</a></li>

                          <li><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>

                        </ul>

                    </li>


                </ul>
                
          <?php endif; ?>
          </ul>
   
  </div>
  </div>
</nav>

</div><!-- /.container-fluid -->
<div class="container">