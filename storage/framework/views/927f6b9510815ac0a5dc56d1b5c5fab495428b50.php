<div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading">Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">
<!-- tên setting -->
<div class="form-group <?php echo e($errors->has('setting_key') ? 'has-error' : ''); ?>">
    <label for="setting_key" class="control-label"><?php echo e('Tên setting'); ?></label>
    <input class="form-control" name="setting_key" type="text" id="setting_key" value="<?php echo e(isset($setting->setting_key) ? $setting->setting_key : old('setting_key')); ?>" <?php echo e(isset($setting->setting_key) ? "readonly" : ""); ?> required>
    <?php echo $errors->first('setting_key', '<p class="help-block">:message</p>'); ?>

</div>

<!-- noi dung setting -->
<div class="form-group <?php echo e($errors->has('setting_value') ? 'has-error' : ''); ?>">
    <label for="setting_value" class="control-label"><?php echo e('Nội dung setting'); ?></label>


    <?php if(request() -> type === 'Textarea' || (isset($setting->setting_value) && $setting->type === "Textarea") ): ?>
    <textarea 

    class="form-control"
    rows="10"
    name="setting_value" required>
    <?php echo e(isset($setting->setting_value) ? $setting->setting_value : old('setting_value')); ?>

</textarea>
<?php elseif(request() -> type === 'Text' || (isset($setting->setting_value) && $setting->type === "Text")): ?>
<input class="form-control" name="setting_value" type="text" id="setting_value" value="<?php echo e(isset($setting->setting_value) ? $setting->setting_value : old('setting_value')); ?>" required>
<?php endif; ?>
    
    <?php echo $errors->first('setting_value', '<p class="help-block">:message</p>'); ?>

</div>

<!-- is active -->
<div class="form-group <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
    <label for="is_active" class="control-label"><?php echo e('Hiển thị'); ?></label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="0" <?php echo e($formMode == 'create'?"selected":($setting->is_active == 0?"selected":"")); ?> >Không</option>
                        <option value="1" <?php echo e($formMode == 'edit'?($setting->is_active == 1?"selected":""):""); ?>>Có</option>
                      </select>
    <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

</div>
   

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Lưu'); ?>">
</div>
</div>
</div>

<?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/setting/form.blade.php ENDPATH**/ ?>