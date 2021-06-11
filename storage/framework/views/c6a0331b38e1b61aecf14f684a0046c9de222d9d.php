<?php $__env->startSection('styles'); ?>

 <!-- dung tagsinput -->
 <link href=" <?php echo e(asset('admins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />

 <?php $__env->stopSection(); ?>
<div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading">Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">
<!-- tên slider -->
<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="control-label"><?php echo e('Tiêu đề'); ?></label>
    <input class="form-control" name="title" type="text" id="title" value="<?php echo e(isset($news-> title) ? $news-> title : old('title')); ?>" required>
    <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

</div>

 <!-- Danh mục  -->
<div class="form-group <?php echo e($errors->has('cat_news_id') ? 'has-error' : ''); ?>">
    <label for="cat_news_id" class="control-label"><?php echo e('Danh mục tin tức'); ?></label>
    <select class="form-control" name="cat_news_id" >
        <option value="">Chọn danh mục</option>
        <?php echo $htmlOption; ?>

    </select>
    <?php echo $errors->first('cat_news_id', '<p class="help-block">:message</p>'); ?>

</div>


<!-- Mô tả -->

    <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
        <label for="description" class="control-label"><?php echo e('Mô tả'); ?></label>
       <textarea id="description" name="description" class="form-control" >
           <?php echo e(isset($news->description) ? $news->description : old('description')); ?>

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
    <?php echo e(isset($news->content) ? $news->content : old('content')); ?>


</textarea>

</div>

<!-- image -->
<?php if(isset($news->image_name) && !empty($news->image_name)): ?>
    <img src="<?php echo e(url('uploads/news/' . $news->image_name)); ?>" width="200" height="180"/>
<?php endif; ?>

<div class="form-group <?php echo e($errors->has('image_name') ? 'has-error' : ''); ?>">
    <label for="image_name" class="control-label"><?php echo e('Hình ảnh'); ?></label>
    <input class="form-control" name="image_name" type="file" id="image_name" >
    <?php echo $errors->first('image_name', '<p class="help-block">:message</p>'); ?>

</div>
<!-- tag -->
<div class="form-group">
  <h5 >Nhập tags cho tin tức</h5>
  <select name = "tags[]"  class="form-control" multiple data-role="tagsinput">
    <?php if(isset($news -> tags) && !empty($news -> tags)): ?>
        <?php $__currentLoopData = $news -> tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsTagItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($newsTagItem -> name); ?>" selected ><?php echo e($newsTagItem -> name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>    
        <option value=""></option>
    <?php endif; ?>    
  </select>

</div>  



                      

<!-- is active -->
<div class="form-group <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
    <label for="is_active" class="control-label"><?php echo e('Hiển thị'); ?></label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="1" <?php echo e($formMode == 'create'?"selected":($news->is_active == 1?"selected":"")); ?> >Có</option>
                        <option value="0" <?php echo e($formMode == 'edit'?($news->is_active == 0?"selected":""):""); ?>>Không</option>
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
<!--tags input -->
    <script src="<?php echo e(url('admins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/news/form.blade.php ENDPATH**/ ?>