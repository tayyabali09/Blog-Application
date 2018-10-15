<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/user/dashboard.css')?>">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


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



<div class="container">
<div class="content-page">
    <div class="profile-banner" style="background-image: url(http://hubancreative.com/projects/templates/coco/corporate/images/stock/1epgUO0.jpg);">
        <div class="col-sm-3 avatar-container">
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
        </div>
        <!-- <div class="col-sm-12 profile-actions text-right">
            <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Friends</button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Send Message</button>
        </div> -->
    </div>
    <div class="content">

        <div class="row">
            <div class="col-sm-3">
                <!-- Begin user profile -->
                <div class="text-center user-profile-2" style="margin-top:120px">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <h3><b><?php echo $result[0]['username'] ?></b></h3>
                        <h5>Blogger</h5>
                      </li>
                      <li class="list-group-item">
                        <span class="badge">1,245</span>
                        Followers
                      </li>
                      <li class="list-group-item">
                        <span class="badge">245</span>
                        Following
                      </li>
                      <li class="list-group-item">
                        <span class="badge">1,245</span>
                        Blogs
                      </li>
                    </ul>
                        
                        <!-- User button -->
                    <div class="user-button">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-default btn-sm btn-block"><span class="glyphicon glyphicon-plus"></span> <a href="<?php echo base_url(); ?>User/create_post">Create Post</a></button>
                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-default btn-sm btn-block"><span class="glyphicon glyphicon-edit"></span> Edit Profile</button>
                            </div>
                        </div>
                    </div><!-- End div .user-button -->
                </div><!-- End div .box-info -->
                <!-- Begin user profile -->
            </div><!-- End div .col-sm-4 -->
            
            <div class="col-sm-9">
                <div class="widget widget-tabbed">
                    <!-- Nav tab -->
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#my-timeline" data-toggle="tab"><i class="fa fa-pencil"></i> Timeline</a></li>
                      <li><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> About</a></li>
                      
                    </ul>
                    <!-- End nav tab -->

                    <!-- Tab panes -->
                    <div class="tab-content">
                        
                        
                        <!-- Tab timeline -->
                        <div class="tab-pane animated active fadeInRight" id="my-timeline">
                            <div class="user-profile-content">
                                
                                <!-- Begin timeline -->
                                <div class="the-timeline">
                                <h2 style="text-align: center;"><b>My Blogs</b> </h2>
                                <hr>
                                    <!-- <form role="form" class="post-to-timeline">
                                        <textarea class="form-control" style="height: 70px;margin-bottom:10px;" placeholder="Whats on your mind..."></textarea>
                                        <div class="row">
                                        <div class="col-sm-6">
                                            <a class="btn btn-sm btn-default"><i class="fa fa-camera"></i></a>
                                            <a class="btn btn-sm btn-default"><i class="fa fa-video-camera"></i></a>
                                            <a class="btn btn-sm btn-default"><i class="fa fa-map-marker"></i></a>
                                        </div>
                                        <div class="col-sm-6 text-right"><button type="submit" class="btn btn-primary">Post</button></div>
                                        </div>
                                    </form> -->
                                    <br>
                                    <ul>
                                    
                                    <hr>


                                    <?php foreach($posts as $post): ?>
                                            
                                    <?php if($result[0]['u_id'] == $post['user_id']): ?>
                                        
                                    <button class="btn btn-danger pull-right"> <a style="color: white" href="<?php echo base_url('User/Delete_post/' .$post['id']) ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a> </button> 
                                    
                                    <button class="btn btn-primary pull-right"><a style="color: white" href="<?php echo base_url('User/edit_post/' .$post['id']) ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a></button>
                                        <li>
                                        <div class="col-md-3">
                                        <img width="100px" src="<?php echo $post['img'] ?>">
                                    </div>
                                            
                                            <h4><a href="<?php echo base_url('Pages/view_post/'.$post['id'])?>"><?php echo $post['title'] ?></a></h4>
                                        
                                            <div class="the-date">
                                                <span><?php echo $post['created_at'] ?></span>
                                                
                                            </div>
                                            <p><?php echo $post['body'] ?>. 
                                            </p>
                                        </li>
                                        <hr>
                                        <br>
                                    <?php endif ?>
                                        <?php endforeach ?>
                                        
                                    </ul>
                                </div><!-- End div .the-timeline -->
                                <!-- End timeline -->
                            </div><!-- End div .user-profile-content -->
                        </div><!-- End div .tab-pane -->
                        <!-- End Tab timeline -->
                        
                        <!-- Tab about -->
                        <div class="tab-pane animated fadeInRight" id="about">
                            <div class="user-profile-content">
                                <h5><strong>ABOUT</strong> ME</h5>
                                <p><?php echo $result[0]['u_info'] ?>. 
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5><strong>CONTACT</strong> ME</h5>
                                            <address>
                                                <strong>Country</strong><br>
                                                <p><?php echo $result[0]['u_country'] ?></p>
                                            </address>
                                            <address>
                                                <strong>Email</strong><br>
                                                <a href="mailto:#"><?php echo $result[0]['email'] ?></a>
                                            </address>
                                            <address>
                                                <strong>Website</strong><br>
                                                <a href="http://r209.com">http://r209.com</a>
                                            </address>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <h5><strong>MY</strong> SKILLS</h5>
                                        <p>UI Design</p>
                                        <p>Clean and Modern Web Design</p>
                                        <p>PHP and MySQL Programming</p>
                                        <p>Vector Design</p>
                                    </div> -->
                                </div><!-- End div .row -->
                            </div><!-- End div .user-profile-content -->
                        </div><!-- End div .tab-pane -->
                        <!-- End Tab about -->
                        
                        
                        <!-- End Tab user activities -->
                        
                        <!-- End div .tab-pane -->
                        <!-- End Tab user messages -->
                    </div><!-- End div .tab-content -->
                </div><!-- End div .box-info -->
            </div>
        </div>
    </div>  
</div>
