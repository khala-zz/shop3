

<div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading">Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">
        <!-- ma giảm giá -->
        <div class="form-group <?php echo e($errors->has('coupon_code') ? 'has-error' : ''); ?>">
            <label for="coupon_code" class="control-label"><?php echo e('Mã giảm giá'); ?></label>
            <input class="form-control" name="coupon_code" type="text" id="coupon_code" value="<?php echo e(isset($coupon->coupon_code) ? $coupon->coupon_code : old('coupon_code')); ?>" >
            <?php echo $errors->first('coupon_code', '<p class="help-block">:message</p>'); ?>

        </div>

        <!-- Số lượng -->
        <div class="form-group <?php echo e($errors->has('amount') ? 'has-error' : ''); ?>">
            <label for="amount" class="control-label"><?php echo e('Số lượng'); ?></label>
            <input class="form-control" name="amount" type="number" id="amount" value="<?php echo e(isset($coupon->amount) ? $coupon->amount : old('amount')); ?>" >
            <?php echo $errors->first('amount', '<p class="help-block">:message</p>'); ?>

        </div>
        <!-- loại giam giá -->

        <div class="form-group <?php echo e($errors->has('amount_type') ? 'has-error' : ''); ?>">
            <label for="amount_type" class="control-label"><?php echo e('Loại mã giảm giá'); ?></label>
           

            <select id="amount_type" name="amount_type" class="form-control" >
                <option value="Phần trăm" <?php echo e($formMode == 'create'?"selected":($coupon->amount_type == "Phần trăm"?"selected":"")); ?> >Phần trăm</option>
                <option value="Cố định" <?php echo e($formMode == 'edit'?($coupon->amount_type == "Cố định"?"selected":""):""); ?>>Cố định</option>
            </select>

            <?php echo $errors->first('amount_type', '<p class="help-block">:message</p>'); ?>

        </div>
        <!-- ngày kết thúc giảm giá -->
        <!-- format lai dinh dạng đẻ hiển thị cho date picker không bị lỗi khi edit-->
        <?php if(isset($coupon->expiry_date)): ?>    
        <?php $convert_date_end = date("m/d/Y", strtotime($coupon->expiry_date)) ?>
        <?php endif; ?>
        <div class="form-group <?php echo e($errors->has('expiry_date') ? 'has-error' : ''); ?>">
            <label for="expiry_date" class="control-label"><?php echo e('Ngày kết thúc giảm giá'); ?></label>
            <input class="form-control" name="expiry_date" type="text" id="expiry_date" value="<?php echo e(isset($coupon->expiry_date) ? $convert_date_end : old('expiry_date')); ?>" >
            <?php echo $errors->first('expiry_date', '<p class="help-block">:message</p>'); ?>

        </div>
        <!-- is active -->
        <div class="form-group <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
            <label for="is_active" class="control-label"><?php echo e('Hiển thị'); ?></label>
            <select id="is_active" name="is_active" class="form-control" >
                <option value="0" <?php echo e($formMode == 'create'?"selected":($coupon->is_active == 0?"selected":"")); ?> >Không</option>
                <option value="1" <?php echo e($formMode == 'edit'?($coupon->is_active == 1?"selected":""):""); ?>>Có</option>
            </select>
            <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

        </div>
        <!-- button submit -->
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Cập nhật' : 'Lưu'); ?>">
        </div>
    </div>
</div>


<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(url('admins/js/coupon/form.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/coupon/form.blade.php ENDPATH**/ ?>