<h2>Create Post</h2>

<?php echo validation_errors(); ?>
<div class="row">
  <div class="col-md-8">
<?php echo form_open_multipart('Pages/Create_post'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
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
	  <input type="file" name="img" size="20">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>