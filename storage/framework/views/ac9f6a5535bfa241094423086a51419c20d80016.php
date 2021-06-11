<div class="row">
    <!-- thong tin co bản panel -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Thông tin cơ bản</div>
            <div class="panel-body">
                <!-- tên sản phẩm -->
                <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                    <label for="title" class="control-label"><?php echo e('Tên sản phẩm'); ?></label>
                    <input class="form-control" name="title" type="text" id="title" value="<?php echo e(isset($product->title) ? $product->title : old('title')); ?>" >
                    <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

                </div>
                <!-- Danh mục  -->
                <div class="form-group <?php echo e($errors->has('category_id') ? 'has-error' : ''); ?>">
                    <label for="category_id" class="control-label"><?php echo e('Danh mục sản phẩm'); ?></label>
                    <select class="form-control" name="category_id" id="changeCategory">
                        <option value="">Chọn danh mục</option>
                        <?php echo $htmlOption; ?>

                    </select>
                    <?php echo $errors->first('category_id', '<p class="help-block">:message</p>'); ?>

                </div>
                <!-- Mã sản phẩm -->
                <div class="form-group <?php echo e($errors->has('product_code') ? 'has-error' : ''); ?>">
                    <label for="product_code" class="control-label"><?php echo e('Mã sản phẩm'); ?></label>
                    <input class="form-control" name="product_code" type="text" id="product_code" value="<?php echo e(isset($product->product_code) ? $product->product_code : old('product_code')); ?>">
                    <?php echo $errors->first('product_code', '<p class="help-block">:message</p>'); ?>

                </div>
                <!-- san pham moi ? -->
                <div class="form-group <?php echo e($errors->has('new') ? 'has-error' : ''); ?>">
                    <label for="new" class="control-label"><?php echo e('Mới'); ?></label>
                    <select id="new" name="new" class="form-control" >
                        <option value="0" <?php echo e($formMode == 'create'?"selected":($product->new == 0?"selected":"")); ?> >Không</option>
                        <option value="1" <?php echo e($formMode == 'edit'?($product->new == 1?"selected":""):""); ?>>Có</option>
                    </select>
                    <?php echo $errors->first('new', '<p class="help-block">:message</p>'); ?>

                </div>
                <!-- san pham noi bat ? -->
                <div class="form-group <?php echo e($errors->has('noi_bat') ? 'has-error' : ''); ?>">
                    <label for="noi_bat" class="control-label"><?php echo e('Nổi bật'); ?></label>
                    <select id="noi_bat" name="noi_bat" class="form-control" >
                        <option value="0" <?php echo e($formMode == 'create'?"selected":($product->noi_bat == 0?"selected":"")); ?> >Không</option>
                        <option value="1" <?php echo e($formMode == 'edit'?($product->noi_bat == 1?"selected":""):""); ?>>Có</option>
                    </select>
                    <?php echo $errors->first('noi_bat', '<p class="help-block">:message</p>'); ?>

                </div>
                <!-- nhãn hiệu  -->
                <div class="form-group <?php echo e($errors->has('brand_id') ? 'has-error' : ''); ?>">
                    <label for="brand_id" class="control-label"><?php echo e('Nhãn hiệu'); ?></label>
                    <select class="form-control" name="brand_id">
                        <option value="0">Chọn nhãn hiệu</option>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option 
                        value="<?php echo e($brand -> id); ?>" 
                        <?php echo e(isset($product->brand_id) && $product->brand_id  == $brand -> id ?"selected":""); ?>>
                        <?php echo e($brand -> title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                    </select>
                    <?php echo $errors->first('brand_id', '<p class="help-block">:message</p>'); ?>

                </div>
                <!-- image -->
                <?php if(isset($product->image) && !empty($product->image)): ?>
                    <img src="<?php echo e(url('uploads/products-daidien/' . $product->image)); ?>" width="200" height="180"/>
                <?php endif; ?>

                <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                    <label for="image" class="control-label"><?php echo e('Hình ảnh'); ?></label>
                    <input class="form-control" name="image" type="file" id="image" >
                    <?php echo $errors->first('image', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- thông ting gia panel -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Thông tin giá</div>
            <div class="panel-body">
                <!-- giá -->
                <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                    <label for="price" class="control-label"><?php echo e('Giá'); ?></label>
                    <input class="form-control" name="price" type="text" id="price" value="<?php echo e(isset($product->price) ? $product->price : old('price')); ?>" >
                    <?php echo $errors->first('price', '<p class="help-block">:message</p>'); ?>

                </div>

                <!-- số lượng -->
                <div class="form-group <?php echo e($errors->has('amount') ? 'has-error' : ''); ?>">
                    <label for="amount" class="control-label"><?php echo e('Số lượng'); ?></label>
                    <input class="form-control" name="amount" type="number" id="amount" value="<?php echo e(isset($product->amount) ? $product->amount : old('amount')); ?>" >
                    <?php echo $errors->first('amount', '<p class="help-block">:message</p>'); ?>

                </div>
                <!-- giam giá -->

                <div class="form-group <?php echo e($errors->has('discount') ? 'has-error' : ''); ?>">
                    <label for="discount" class="control-label"><?php echo e('Giảm giá'); ?></label>
                    <input class="form-control" name="discount" type="number" id="discount" value="<?php echo e(isset($product->discount) ? $product->discount : old('discount')); ?>" >
                    <?php echo $errors->first('discount', '<p class="help-block">:message</p>'); ?>

                </div>
                <!-- ngày bắt đầu giảm giá -->
                <!-- format lai dinh dạng đẻ hiển thị cho date picker không bị lỗi khi edit-->
                <?php if(isset($product->discount_start_date)): ?>    
                <?php $convert_date_start = date("m/d/Y", strtotime($product->discount_start_date)) ?>
                <?php endif; ?>
                <div class="form-group <?php echo e($errors->has('discount_start_date') ? 'has-error' : ''); ?>">
                    <label for="discount_start_date" class="control-label"><?php echo e('Ngày bắt đầu giảm giá'); ?></label>
                    <input class="form-control" name="discount_start_date" type="text" id="discount_start_date" value="<?php echo e(isset($product->discount_start_date) ? $convert_date_start : old('discount_start_date')); ?>" >
                    <?php echo $errors->first('discount_start_date', '<p class="help-block">:message</p>'); ?>

                </div>

                <!-- ngày kết thúc giảm giá -->
                <!-- format lai dinh dạng đẻ hiển thị cho date picker không bị lỗi khi edit-->
                 <?php if(isset($product->discount_end_date)): ?>    
                <?php $convert_date_end = date("m/d/Y", strtotime($product->discount_end_date)) ?>
                <?php endif; ?>
                
                <div class="form-group <?php echo e($errors->has('discount_end_date') ? 'has-error' : ''); ?>">
                    <label for="discount_end_date" class="control-label"><?php echo e('Ngày kết thúc giảm giá'); ?></label>
                    <input class="form-control" name="discount_end_date" type="text" id="discount_end_date" value="<?php echo e(isset($product->discount_end_date) ? $convert_date_end : old('discount_end_date')); ?>" >
                    <?php echo $errors->first('discount_end_date', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- các đặc tính -->
<div class="panel panel-default">
    <div class="panel-heading">Các đặc tính(<i>Chỉ hiển thị khi chọn danh mục có đặc tính</i>)</div>
    <div class="panel-body">
        
        <?php if(isset($check_features) && !empty($check_features)): ?>
        
            <div class="form-group" id="frame-feature">
                 
            <?php $__currentLoopData = $check_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $features): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- lay lay du lieu tu bang catetory features -->
                <?php $__currentLoopData = $features -> features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <!-- lay du lieu tu bang product feature voi dieu kien field_id bang voi id cua bang category_feature-->
                <?php
               
                    $product_feature_value = $product -> features() -> where('field_id',$feature  -> id) ->get();
               
                ?>
               
                <?php if($feature -> field_type == 1): ?>

                    <label  class="control-label"><?php echo e($feature  -> field_title); ?></label>

                    <input type="text" value = "<?php echo e(isset($product_feature_value[0] -> field_value)?$product_feature_value[0] -> field_value:''); ?>" name="features[<?php echo e($feature  -> id); ?>]" class="form-control" >

                            
                            
                <?php elseif($feature  -> field_type == 2): ?>
                    <label  class="control-label"><?php echo e($feature ->  field_title); ?></label>
                    <input type="color" value = "<?php echo e(isset($product_feature_value[0] -> field_value)?$product_feature_value[0] -> field_value:'#FBFEFE'); ?>" name="features[<?php echo e($feature  -> id); ?>]" class="form-control">
                            
                <?php endif; ?>      
                        
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>   
            <div class="form-group" id="frame-feature">
            </div>
        <?php endif; ?>     
        
    </div>
</div>

<!-- multi upload -->
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Các hình ảnh</strong>
        <span style="font-size: 12px">(Chọn nhiều hình ảnh)</span>
    </div>
    <div class="panel-body">
       
      <div class="row" id="preview">
        <div class="gallery" >
        </div>
         
      </div>


      <input type="file" class="form-control" name="multi-image[]" multiple accept="image/*" id="gallery-photo-add"/>
      <!-- hien thi nhieu image -->
      <div class="row" >
      <?php if(isset($image_gallery) && !empty($image_gallery)): ?>
        <?php $__currentLoopData = $image_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 delete-ele-<?php echo e($gallery -> id); ?>">
                    <img src="<?php echo e(url('uploads/'.$product -> id.'/small/' . $gallery->image)); ?>" class="photo_preview" />
                    <a href="#" class="btn btn-danger remove-feature-product"  title="xóa" data-value="<?php echo e($gallery -> id); ?>"><i class="fa fa-remove"></i></a>
                </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
       <?php endif; ?>       
         </div>
     </div> 

</div>
      
                  

<!-- Mô tả -->
<div class="panel panel-default">
    <div class="panel-heading">Mô tả</div>
    <div class="panel-body">
        <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">

           <textarea id="description" name="description" class="form-control tinymce_editor_init" rows="20">
               <?php echo e(isset($product->description) ? $product->description : old('description')); ?>

           </textarea>
           <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

       </div>  
   </div>
</div>

<!-- Thông tin thêm -->
<div class="panel panel-default">
    <div class="panel-heading">Thông tin thêm</div>
    <div class="panel-body">
        <div class="form-group <?php echo e($errors->has('additional') ? 'has-error' : ''); ?>">

           <textarea id="additional" name="additional" class="form-control" rows="15">
               <?php echo e(isset($product->additional) ? $product->additional : old('additional')); ?>

           </textarea>
           <?php echo $errors->first('additional', '<p class="help-block">:message</p>'); ?>

       </div>  
   </div>
</div>
                
<!-- tuy chon hien thi panel -->
<div class="panel panel-default">
    <div class="panel-heading">Tùy chọn hiển thị</div>
    <div class="panel-body">
        <!-- is active -->
        <div class="form-group <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
            <label for="is_active" class="control-label"><?php echo e('Hiển thị'); ?></label>
            <select id="is_active" name="is_active" class="form-control" >
                <option value="0" <?php echo e($formMode == 'create'?"selected":($product->is_active == 0?"selected":"")); ?> >Không</option>
                <option value="1" <?php echo e($formMode == 'edit'?($product->is_active == 1?"selected":""):""); ?>>Có</option>
            </select>
            <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

        </div>
        <!-- is featured -->
        <div class="form-group <?php echo e($errors->has('featured') ? 'has-error' : ''); ?>">
            <label for="featured" class="control-label"><?php echo e('Hiển thị các đặc tính'); ?></label>
            <select id="featured" name="featured" class="form-control" >
                <option value="0" <?php echo e($formMode == 'create'?"selected":($product->featured == 0?"selected":"")); ?> >Không</option>
                <option value="1" <?php echo e($formMode == 'edit'?($product->featured == 1?"selected":""):""); ?>>Có</option>
            </select>
            <?php echo $errors->first('featured', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Lưu'); ?>">
</div>

<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(asset('admins/js/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(asset('admins/js/tinymce/init_tinymce.js')); ?>"></script>
<script src="<?php echo e(asset('admins/js/product/form.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/product/form.blade.php ENDPATH**/ ?>