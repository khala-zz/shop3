<!-- tên nhãn hiệu -->
<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="control-label"><?php echo e('Tên nhãn hiệu'); ?></label>
    <input class="form-control" name="title" type="text" id="title" value="<?php echo e(isset($brand->title) ? $brand->title : old('title')); ?>" >
    <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

</div>

<!-- is active -->
<div class="form-group <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
    <label for="is_active" class="control-label"><?php echo e('Hiển thị'); ?></label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="0" <?php echo e($formMode == 'create'?"selected":($brand->is_active == 0?"selected":"")); ?> >Không</option>
                        <option value="1" <?php echo e($formMode == 'edit'?($brand->is_active == 1?"selected":""):""); ?>>Có</option>
                      </select>
    <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

</div>
   

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Lưu'); ?>">
</div>

<?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/brand/form.blade.php ENDPATH**/ ?>