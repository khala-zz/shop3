<section class="intro-section">
    <div class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 gutter-no"
    data-owl-options="{
    'nav': false,
    'dots': true,
    'loop': true,
    'items': 1,
    'autoplay': true,
    'autoplayTimeout': 8000
}">

<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="banner banner-fixed intro-slide2" style="background-color: #dddee0;">
    <figure>
        <img src="<?php echo e(asset('uploads/sliders/'. $slider -> image_name)); ?> " alt="<?php echo e($slider -> image_name); ?>" title="<?php echo e($slider -> image_name); ?>" width="1903"
        height="630" />
    </figure>
    <div class="container">
        <div class="banner-content y-50 ml-auto text-right">
            <h4 class="banner-subtitle ls-s mb-1 slide-animate"
            data-animation-options="{'name': 'fadeInUp', 'duration': '.7s'}"><span
            class="d-block text-uppercase mb-2"><?php echo e($slider -> name); ?></span><strong
            class="font-weight-semi-bold ls-m"><?php echo e($slider -> nametwo); ?></strong></h4>
            <h2 class="banner-title mb-2 d-inline-block font-weight-bold text-primary slide-animate"
            data-animation-options="{'name': 'fadeInRight', 'duration': '1.2s', 'delay': '.5s'}">
            <?php echo e($slider -> namethree); ?></h2>
            <p class="slide-animate font-primary ls-s text-dark mb-4"
            data-animation-options="{'name': 'fadeInUp', 'duration': '1s', 'delay': '1.2s'}">
            <?php echo e($slider -> namefour); ?></p>
            <a href="#" class="btn btn-dark slide-animate"
            data-animation-options="{'name': 'fadeInUp', 'duration': '1s', 'delay': '1.4s'}">Shop
        Now</a>
    </div>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




</div>

<div class="service-list container appear-animate">
    <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
                                'items': 3,
                                'nav': false,
                                'dots': false,
                                'margin': 20,
                                'autoplay': true,
                                'autoplayTimeout': 5000,
                                'responsive': {
                                    '0': {
                                        'items': 1
                                    },
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3,
                                        'loop': false
                                    }
                                }
                            }">

<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="icon-box icon-box-side icon-box<?php echo e($index + 1); ?> appear-animate" data-animation-options="{
'name': 'fadeInRightShorter',
'delay': '.<?php echo e($index + 2); ?>s'
}">
<i class="icon-box-icon <?php echo e($value -> setting_key == 'Bảo mật'?'d-icon-secure':($value -> setting_key == 'Vận chuyển'?'d-icon-truck':'d-icon-service')); ?>">
</i>
<div class="icon-box-content">
 <?php echo $value -> setting_value; ?>

</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
</div>
</section><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/home/components/slider.blade.php ENDPATH**/ ?>