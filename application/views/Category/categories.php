<center>
<div class="panel-defualt">
<div class="panel-heading">
<h1>Categories</h1>
</div>
</div>
</center>
<div class="container">
	
	<?php foreach ($Categories as $cat): ?>
	<div class="row">
			
	<div class="col-md-9">
	<h3><?php echo $cat['cat_name'] ?>
	<a href="<?php echo base_url('Categories/delete_category/'.$cat['cat_id']) ?>">
          <span class="glyphicon glyphicon-trash"></span>
        </a>
	
	<small class="post-date">Posted on : <?php echo $cat['created_at'] ?> </small><hr><br>
	</div>
	</div>

<?php endforeach ?> 
</div>