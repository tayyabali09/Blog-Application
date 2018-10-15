<center>
<div class="well">
<h1>Posts</h1>
</div>
</center>
<div class="container">
	
	
	<div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
    		<img  width="300px" src="<?php echo $post['img'] ?>">
  		</a>
  		<div class="media-body">
    		<h4 class="media-heading"><?php echo $post['title'] ?></h4>
        Category: <strong><?php echo $post['cat_name'] ?></strong>
          <p class="text-right">Posted by : <b><?php echo $post['username'] ?></b></p>
          <p><?php echo $post['body'] ?>.</p>
          <ul class="list-inline list-unstyled">
  			<li><span><i class="glyphicon glyphicon-calendar"></i> Posted on : <?php echo $post['created_at'] ?> </span></li>
            <li>|</li>
            
            <span><i class="glyphicon glyphicon-comment"></i> 
            <?php foreach($total_cmnts as $rr): ?> 
        
              <?php echo $rr->total; ?>
        
            <?php endforeach; ?> 
            
            </span>
            
            <li><span>
            <i class="glyphicon glyphicon-thumbs-up"></i> 
            <?php foreach($likes as $rl): ?> 
          
              <?php echo $rl->total; ?>
            <?php endforeach; ?> </span></li>

            <li>|</li>
            
            
            <li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <!-- <?php if(isset($follow_btn)) : ?>

  <?php endif ?>-->

  <?php if( $this->session->userdata('logged_in') == TRUE){ ?>


                <div class="follow">
                <form action="<?php echo Base_url('User/create_like') ?>" method="post">
                    
                    <input type="hidden" name="post_id" value="<?php echo $post['id'] ?>" >
                    <input type="hidden" name="user_id" value="<?php echo $result[0]['u_id'] ?>" >
                    <button class="btn" type="submit" ><span><i class="glyphicon glyphicon-thumbs-up""></i></button>
                </form>
              
              </div>
                  <?php 
    }elseif($this->session->userdata('logged_in') == FALSE){ ?>
    
      <!-- <div class="col-md-8">
      <h2> For Comment Please Login </h2>
      </div> -->
    
  <?php } ?>

 
            </li>
			</ul>
       </div>
    </div>
  </div>

	<!-- <div class="row" style="border-style: solid; border-radius: 15px; border-width: 1px">
	<div class="col-md-3 col-md-offset-1">
		<img  class="post-thumb" src="<?php echo $post['img'] ?>">
	</div>		
	<div class="col-md-7" >
	<h3><?php echo $post['title'] ?></h3>
	<small class="post-date">Posted on : <?php echo $post['created_at'] ?> </small><br>
	<p><?php echo $post['body'] ?></p><br>

<!-- <?php if($this->session->userdata($u_id) == $post['user_id']): ?>
		<h4><a class="btn btn-primary pull-left" href="<?php echo base_url('Pages/Edit_post/' .$post['id']) ?>">Edit</a></h4>
		<h4><a class="btn btn-danger" href="<?php echo base_url('Pages/Delete_post/' .$post['id']) ?>">Delete</a></h4>
<?php endif ?>
 -->
	<hr><br>


<div class="row">
	
	<div class="col-md-9 col-md-offset-1" >
	<?php foreach($comments as $com): ?>

			
	<div class="panel panel-default">
      <div class="panel-heading"><b>Name :</b><?php echo $com['user_name'] ?></div>
      <div class="panel-body"><b>Comment:</b><?php echo $com['comment'] ?></div>
    </div>
	

	<?php endforeach ?>
	</div>
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-1">

         <?php if( $this->session->userdata('logged_in') == TRUE){ ?>

         <form method="post" action="<?php echo base_url().'User/create_comment'; ?>"" class="form" enctype="multipart/form-data">
	
		       <div class="form-group col-md-8">
				<input type="hidden" name="user_name" value="<?php echo $result[0]['username'] ?> ">
	              <input type="hidden" name="p_id" value="<?php echo $post['id'] ?>">
	              <label><h3>Comment</h3></label>
					
                     <textarea cols="40" id="ckeditor1" name="comment" rows="10" class="form-control" placeholder="Enter Comment"></textarea>

                     <?php echo form_error('comment','<p class="help-block text-danger">','</p>'); ?>
                    <br>
                    <button class="btn btn-md btn-primary" type="submit">Submit</button>
                  </div>

		</form>

		<?php 
		}elseif($this->session->userdata('logged_in') == FALSE){ ?>
		
			<div class="col-md-8">
			<h2> For Comment Please Login </h2>
			</div>
		
	<?php } ?>
	</div>
</div>










</div>