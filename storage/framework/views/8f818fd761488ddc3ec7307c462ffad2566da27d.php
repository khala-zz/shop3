<div class="panel panel-default">
	<div class="panel-heading"><strong class="panel-color-heading" >Nhập thông tin bên dưới</strong></div>
	<div class="panel-body">
		<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
			<label for="name" class="control-label"><?php echo e('Tên'); ?></label>
			<input class="form-control" name="name" type="text" id="name" value="<?php echo e(isset($permission->name) ? $permission->name : old('name')); ?>" required>
			<?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

		</div>


		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Thêm mới'); ?>">
		</div>
	</div>
</div><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/permission/form.blade.php ENDPATH**/ ?>