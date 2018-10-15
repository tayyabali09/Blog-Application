<center>
<div class="panel-defualt">
<div class="panel-heading">
<h1>Posts</h1>
<hr>
</div>
</div>
</center>
<div class="container">
	
	<?php foreach ($posts as $post): ?>
	<div class="row">
	<div class="col-md-3">
		<img  class="post-thumb" width="300px" src="<?php echo $post['img'] ?>">
	</div>		
	<div class="col-md-9">
	<h3><?php echo $post['title'] ?></h3>
	Posted by : <b><?php echo $post['username'] ?></b>
	
	<small class="post-date">Posted on : <?php echo $post['created_at'] ?> </small> Category: <strong><?php echo $post['cat_name'] ?></strong>

	 <br>
	<p><?php echo $post['body'] ?></p>
		<h4><a class="btn btn-primary" href="<?php echo base_url('Pages/view_post/' .$post['id']); ?>">Readmore</a></h4><br>
	</div>
	</div>
<?php endforeach ?> <br>

<div class="pagination-links">
		<?php echo $this->pagination->create_links(); ?>
</div>
</div>