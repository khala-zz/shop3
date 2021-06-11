 
 <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
 
     <li>
        <a href="<?php echo e(Request::segment(1) == 'cat_news'?route('cat_news.news',['slug' => slugify($child -> title,'-'),'id' => $child -> id]): route('category.product',['slug' => slugify($child -> title,'-'),'id' => $child -> id])); ?>" 
            class="<?php echo e(count($child->children) ? 'show' :''); ?>" <?php echo e(Request::segment(3) == $child -> id ? 'style=color:#26b' : " "); ?>><?php echo e($child->title); ?></a>
        <?php if(count($child->children)): ?>
            <ul><li><a href="">
            <?php echo $__env->make('frontend.sub_category',['childs' => $child -> children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           </a></li></ul>
        <?php endif; ?>

    </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/sub_category.blade.php ENDPATH**/ ?>