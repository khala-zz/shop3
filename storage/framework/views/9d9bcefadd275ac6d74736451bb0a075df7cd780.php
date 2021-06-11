<div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading">Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">
<!-- tên slider -->
<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo e('Tên Slider'); ?></label>
    <input class="form-control" name="name" type="text" id="name" value="<?php echo e(isset($slider->name) ? $slider->name : old('name')); ?>" required>
    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>
<!-- tên 2 slider -->
<div class="form-group <?php echo e($errors->has('nametwo') ? 'has-error' : ''); ?>">
    <label for="nametwo" class="control-label"><?php echo e('Tên Slider 2'); ?></label>
    <input class="form-control" name="nametwo" type="text" id="nametwo" value="<?php echo e(isset($slider->nametwo) ? $slider->nametwo : old('nametwo')); ?>" >
    <?php echo $errors->first('nametwo', '<p class="help-block">:message</p>'); ?>

</div>
<!-- tên 3 slider -->
<div class="form-group <?php echo e($errors->has('namethree') ? 'has-error' : ''); ?>">
    <label for="namethree" class="control-label"><?php echo e('Tên Slider 3'); ?></label>
    <input class="form-control" name="namethree" type="text" id="namethree" value="<?php echo e(isset($slider->namethree) ? $slider->namethree : old('namethree')); ?>" >
    <?php echo $errors->first('namethree', '<p class="help-block">:message</p>'); ?>

</div>

<!-- tên 4 slider -->
<div class="form-group <?php echo e($errors->has('namefour') ? 'has-error' : ''); ?>">
    <label for="namefour" class="control-label"><?php echo e('Tên Slider 4'); ?></label>
    <input class="form-control" name="namefour" type="text" id="namefour" value="<?php echo e(isset($slider->namethree) ? $slider->namefour : old('namefour')); ?>" >
    <?php echo $errors->first('namefour', '<p class="help-block">:message</p>'); ?>

</div>

<!-- Mô tả -->

    <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
        <label for="description" class="control-label"><?php echo e('Mô tả'); ?></label>
       <textarea id="description" name="description" class="form-control" >
           <?php echo e(isset($slider->description) ? $slider->description : old('description')); ?>

       </textarea>
        <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

    </div>
<!-- content -->

<div class="form-group" <?php echo e($errors->has('content') ? 'has-error' : ''); ?>>

    <label for="content" class="control-label"><?php echo e('Nội dung'); ?></label>
    <textarea 

    class="form-control tinymce_editor_init <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
    rows="20"
    name="content">
    <?php echo e(isset($slider->content) ? $slider->content : old('content')); ?>


</textarea>

</div>

<!-- image -->
<?php if(isset($slider->image_name) && !empty($slider->image_name)): ?>
    <img src="<?php echo e(url('uploads/sliders/' . $slider->image_name)); ?>" width="200" height="180"/>
<?php endif; ?>

<div class="form-group <?php echo e($errors->has('image_name') ? 'has-error' : ''); ?>">
    <label for="image_name" class="control-label"><?php echo e('Hình ảnh'); ?></label>
    <input class="form-control" name="image_name" type="file" id="image_name" >
    <?php echo $errors->first('image_name', '<p class="help-block">:message</p>'); ?>

</div>
                      

<!-- is active -->
<div class="form-group <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
    <label for="is_active" class="control-label"><?php echo e('Hiển thị'); ?></label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="0" <?php echo e($formMode == 'create'?"selected":($slider->is_active == 0?"selected":"")); ?> >Không</option>
                        <option value="1" <?php echo e($formMode == 'edit'?($slider->is_active == 1?"selected":""):""); ?>>Có</option>
                      </select>
    <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Lưu'); ?>">
</div>

</div>
</div>

<?php $__env->startSection('scripts'); ?>


<script src="<?php echo e(url('admins')); ?>/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo e(url('admins')); ?>/js/tinymce/init_tinymce.js"></script>

<?php $__env->stopSection(); ?>


<?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/slider/form.blade.php ENDPATH**/ ?>