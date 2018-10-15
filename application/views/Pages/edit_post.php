<div class="row">
  <div class="col-md-9">
<h2>Edit Post</h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart(''); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post['title'] ?>" >
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body"><?php echo $post['body'] ?></textarea>
  </div>
  <div class="form-group">
	  <label>Category</label>
	  <select name="category_id" class="form-control">
		  <?php foreach($categories as $category): ?>
		  	<option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
		  <?php endforeach; ?>
	  </select>
  </div>
  <div class="form-group">
	  <label>Upload Image</label>
	  <input type="file" value="<?php echo $post['img'] ?>" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-lg btn-default">Submit</button>
</form>
</div>
</div>