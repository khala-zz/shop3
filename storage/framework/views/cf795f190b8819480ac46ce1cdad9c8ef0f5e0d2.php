<!-- tên tag -->
<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo e('Tên tag'); ?></label>
    <input class="form-control" name="name" type="text" id="name" value="<?php echo e(isset($tag->name) ? $tag->name : old('name')); ?>" >
    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>


</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Lưu'); ?>">
</div>

<?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/tag/form.blade.php ENDPATH**/ ?>