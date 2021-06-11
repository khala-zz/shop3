<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo e('Tên'); ?></label>
    <input class="form-control" name="name" type="text" id="name" value="<?php echo e(isset($role->name) ? $role->name : old('name')); ?>" required>
    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>

<div class="row">
    <div class="col-md-12">
        <h3>Phân quyền tới</h3>

        <div class="form-group">
            <label for="select_all" class="control-label">
                <input type="checkbox" id="select_all" value="1" class="minimal-red">
                <i class="btn bg-maroon">Chọn / Bỏ chọn tất cả</i>
            </label>
        </div>

        <div class="row">
            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="permission[<?php echo e($permission->id); ?>]" class="control-label">
                            <input type="checkbox" name="permissions[<?php echo e($permission->id); ?>]" value="1" <?php echo e($formMode=="edit" && in_array($permission->id, $selected_permissions)?"checked":""); ?> class="minimal-red permission">
                            <?php echo e(ucfirst(str_replace("_", " ", $permission->name))); ?>

                        </label>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Thêm mới'); ?>">
</div><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/roles/form.blade.php ENDPATH**/ ?>