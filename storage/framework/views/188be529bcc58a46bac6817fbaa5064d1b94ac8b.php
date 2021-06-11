<!-- tên danh mục -->
<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="control-label"><?php echo e('Tên Danh mục'); ?></label>
    <input class="form-control" name="title" type="text" id="title" value="<?php echo e(isset($cat_news->title) ? $cat_news->title : old('title')); ?>" >
    <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

</div>


                                   
<!-- Danh mục cha -->
<div class="form-group <?php echo e($errors->has('parent_id') ? 'has-error' : ''); ?>">
    <label for="parent_id" class="control-label"><?php echo e('Danh mục tin tức cha'); ?></label>
    <select class="form-control" name="parent_id">
        <option value="">Chọn danh mục cha</option>
        <?php echo $htmlOption; ?>

    </select>
    <?php echo $errors->first('parent_id', '<p class="help-block">:message</p>'); ?>

</div>
<!-- image -->
<?php if(isset($cat_news->image) && !empty($cat_news->image)): ?>
    <img src="<?php echo e(url('uploads/cat_news/' . $cat_news->image)); ?>" width="200" height="180"/>
<?php endif; ?>

<div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
    <label for="image" class="control-label"><?php echo e('Hình ảnh'); ?></label>
    <input class="form-control" name="image" type="file" id="image" >
    <?php echo $errors->first('image', '<p class="help-block">:message</p>'); ?>

</div>
<!-- Mô tả -->

    <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
        <label for="description" class="control-label"><?php echo e('Mô tả'); ?></label>
       <textarea id="description" name="description" class="form-control" >
           <?php echo e(isset($cat_news->description) ? $cat_news->description : old('description')); ?>

       </textarea>
        <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

    </div>


                      

<!-- is active -->


<div class="form-group <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
    <label for="is_active" class="control-label"><?php echo e('Hiển thị'); ?></label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="1" <?php echo e($formMode == 'create'?"selected":($cat_news->is_active == 1?"selected":"")); ?> >Có</option>
                        <option value="0" <?php echo e($formMode == 'edit'?($cat_news->is_active == 0?"selected":""):""); ?>>Không</option>
                      </select>
    <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

</div>










   





<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Lưu'); ?>">
</div>

<?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/cat_news/form.blade.php ENDPATH**/ ?>