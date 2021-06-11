<!-- tên danh mục -->
<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title" class="control-label"><?php echo e('Tên Danh mục'); ?></label>
    <input class="form-control" name="title" type="text" id="title" value="<?php echo e(isset($category->title) ? $category->title : old('title')); ?>" >
    <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

</div>


                                   
<!-- Danh mục cha -->
<div class="form-group <?php echo e($errors->has('parent_id') ? 'has-error' : ''); ?>">
    <label for="parent_id" class="control-label"><?php echo e('Danh mục sản phẩm cha'); ?></label>
    <select class="form-control" name="parent_id">
        <option value="">Chọn danh mục cha</option>
        <?php echo $htmlOption; ?>

    </select>
    <?php echo $errors->first('parent_id', '<p class="help-block">:message</p>'); ?>

</div>
<!-- image -->
<?php if(isset($category->image) && !empty($category->image)): ?>
    <img src="<?php echo e(url('uploads/categories/' . $category->image)); ?>" width="200" height="180"/>
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
           <?php echo e(isset($category->description) ? $category->description : old('description')); ?>

       </textarea>
        <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

    </div>


                      

<!-- is active -->


<div class="form-group <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
    <label for="is_active" class="control-label"><?php echo e('Hiển thị'); ?></label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="0" <?php echo e($formMode == 'create'?"selected":($category->is_active == 0?"selected":"")); ?> >Không</option>
                        <option value="1" <?php echo e($formMode == 'edit'?($category->is_active == 1?"selected":""):""); ?>>Có</option>
                      </select>
    <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

</div>
<!-- feature -->


<div class="form-group <?php echo e($errors->has('featured') ? 'has-error' : ''); ?>">
    <label for="featured" class="control-label"><?php echo e('Đặc tính'); ?></label>
    <select id="featured" name="featured" class="form-control" v-model="featured">
                        <option value="1" <?php echo e($formMode == 'create'?"selected":($category->featured == 1?"selected":"")); ?> >Có</option>
                        <option value="0" <?php echo e($formMode == 'edit'?($category->featured == 0?"selected":""):""); ?>>Không</option>
                      </select>
    <?php echo $errors->first('featured', '<p class="help-block">:message</p>'); ?>

</div>




<strong>Features</strong>
                 

<div>
  <div class="row" style="margin-bottom: 5px;">
    <div class="col-lg-12">
      <button type="button" class="btn btn-success btn-sm pull-right" id="btn-add-feature" style="margin-top:5px"><i class="fa fa-plus-square"></i> Add new Feature</button>
  </div>
</div>



<div id="frame-feature">
  <?php if(isset($features)){?>

    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="row container-feature-<?php echo e($item->id); ?>" style="margin-bottom: 5px;">
            <div class="col-lg-4">
                <input type="text" name="field_title[]" class="form-control" placeholder="Feature title" value="<?php echo e($item->field_title); ?>" />
            </div>
            <div class="col-lg-4">
                <select name="field_type[]" class="form-control" >
                    <option value="1" <?php echo e($item->field_type==1?"selected":""); ?>>Text</option>
                    <option value="2" <?php echo e($item->field_type==2?"selected":""); ?>>Màu sắc</option>
                </select>
            </div>
            <div class="col-lg-4"><a href="#" class="btn btn-sm btn-danger remove-feature" data-value=<?php echo e($item->id); ?>><i class="fa fa-remove"></i></a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php }?>
</div>
</div>
   





<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Lưu'); ?>">
</div>

<?php $__env->startSection('scripts'); ?>


<script src="<?php echo e(url('admins')); ?>/views/category/form.js"></script>

<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/category/form.blade.php ENDPATH**/ ?>