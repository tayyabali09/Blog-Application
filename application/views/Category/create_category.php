<h2>Create Category</h2>
<div class="col-md-7">
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('Categories/Create_category'); ?>
  <div class="form-group">
    <label>Category Title</label>
    <input type="text" class="form-control" name="cat_name" placeholder="Add Title">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>