<div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading">Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">


<h3 class="box-title m-b-0">Khách hàng <?php echo e($order -> name); ?></h3>
<p class="text-muted m-b-30 font-13"> Đơn hàng <?php echo e($order -> ma_order); ?> </p>
<!-- show thong tin -->

<!-- end show thong tin -->  

<div class="table-responsive">
    <table  class="table" >

        <tbody>
            <?php $__currentLoopData = $order -> orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td  width="60%">
                    

                        <?php echo $pro -> product_name .'(Ma san pham: <strong>'.$pro -> product_code.'</strong>)<p><small>'.$pro -> product_size .' | '. $pro -> product_color.'</small></p>'; ?>    
                        
                    </td>
                    <td width="15%">
                        <?php echo e($pro  -> product_price); ?> đ
                    </td>
                    <td width="5%">
                        x
                    </td>
                    <td width="15%">
                       <?php echo e($pro -> product_qty); ?> cai
                   </td>
                   <td width="5%"><?php echo e($pro -> product_price * $pro -> product_qty); ?></td>


               </tr>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           </tbody>
           <tfoot>
            <tr>
                <td colspan="3">

                </td>
                <td><p>Tổng tiền</td>
                    <td >
                        <?php echo e($order -> total_price); ?>

                        <div class="text-right">

                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">

                    </td>
                    <td><p>Giảm giá</td>
                        <td >
                            <?php if($order -> coupon_amount !=''): ?>
                            <?php echo e($order -> coupon_amount); ?>

                            <?php else: ?>
                            <span>0</span>
                            <?php endif; ?>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">

                        </td>
                        <td><p>Thanh toán</td>
                            <td >
                                <?php echo e($order -> total_price - ($order -> coupon_amount != ''?$order -> coupon_amount:0)); ?>

                                <div class="text-right">

                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div> 

            <!-- chú thích -->
<div class="form-group <?php echo e($errors->has('status_message') ? 'has-error' : ''); ?>">
    <label for="status_message" class="control-label"><?php echo e('Chú thích'); ?></label>

    <textarea 

    class="form-control"
    rows="10"
    name="status_message" required>
    <?php echo e(isset($order->status_message) ? $order->status_message : old('status_message')); ?>

</textarea>

    
    <?php echo $errors->first('status_message', '<p class="help-block">:message</p>'); ?>

</div>

<!-- is active -->
<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo e('Tình trạng đơn hàng'); ?></label>
    <select id="status" name="status" class="form-control" >
                        <option value="Đang xử lý" <?php echo e($order->status == 'Đang xử lý'?"selected":""); ?> >Đang xử lý</option>
                        <option value="Hoàn thành" <?php echo e($order->status == 'Hoàn thành'?"selected":""); ?>>Hoàn thành</option>
                      </select>
    <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

</div>
   

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Cập nhật">
</div>
</div>
</div>

<?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/order/form.blade.php ENDPATH**/ ?>