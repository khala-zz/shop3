 
 <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
 <ul style="display: block">
     <li>
        <a href="<?php echo e(url('cua-hang?category_id='.$child -> id)); ?>" 
        	class="<?php echo e(count($child->children) ? 'show' :''); ?> <?php echo e(Request::get('category_id') == $child -> id ? 'active-filters' :''); ?>"><?php echo e($child->title); ?></a>
        <?php if(count($child->children)): ?>
        	
            <?php echo $__env->make('frontend.news.menusub',['childs' => $child -> children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
        <?php endif; ?>

    </li>
</ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/product/menusub.blade.php ENDPATH**/ ?>