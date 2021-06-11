
	<?php $__env->startSection('title'); ?>
		<title><?php echo e($news -> title); ?></title>
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
	 <main class="main">
            <div class="page-header" style="background-image: url(<?php echo e(asset('images/page-header.jpg')); ?>)">
                <h1 class="page-title"><?php echo e($news -> title); ?></h1>
            </div>
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>"><i class="d-icon-home"></i></a></li>
                        <li><a href="#" class="active">Tin tức</a></li>
                        <li><?php echo e($news -> title); ?></li>
                    </ul>
                </div>
            </nav>
            <div class="page-content mt-6">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="col-lg-9">
                            <article class="post-single">
                                <figure class="post-media">
                                    
                                        <img src="<?php echo e(asset('uploads/news/'.$news -> image_name)); ?>" width="870" height="420" alt="<?php echo e($news -> title); ?>" title="<?php echo e($news -> title); ?>"/>
                                    
                                </figure>
                                <div class="post-details">
                                    <div class="post-meta">
                                        Đăng bởi <span class="post-author"><?php echo e($news -> user -> name); ?></span>
                                        /
                                        <span class="post-date"><?php echo e($news -> created_at); ?></span>
                                        
                                    </div>
                                    <h4 class="post-title"><?php echo e($news -> title); ?></h4>
                                    <div class="post-cats">
                                        <a href="<?php echo e(route('cat_news.news',['slug' => slugify($news -> cat_news -> title,'-'),'id' => $news -> cat_news -> id])); ?>"><?php echo e($news -> cat_news -> title); ?></a>
                                    </div>
                                    <div class="post-body mb-7">
                                        
                                        <?php echo $news -> content; ?>


                                    </div>
                                    <!-- End Post Body -->
                                    <div class="post-footer d-flex justify-content-between align-items-center">
                                        <div class="tags mb-6">
                                            <label class="mr-2">Tags:</label>

                                            <?php $__empty_1 = true; $__currentLoopData = $news -> tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <a href="<?php echo e(route('list.news.tags',['slug' => slugify($tag -> name,'-'),'id' => $tag -> id ])); ?>" class="tag"><?php echo e($tag -> name); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <p>Không có tags</p>
                                            <?php endif; ?>

                                        </div>
                                        <div class="social-links inline-links mb-6">
                                            <label>Chia sẻ:</label>
                                            <a href="#" class="social-link social-facebook fab fa-facebook-f"
                                                style="color: #8f79ed"></a>
                                            <a href="#" class="social-link social-twitter fab fa-twitter"
                                                style="color: #79c8ed"></a>
                                            <a href="#" class="social-link fab fa-pinterest" style="color: #e66262"></a>
                                        </div>
                                    </div>
                                    <!-- End Post Footer -->
                                   
                                </div>
                            </article>
                            
                            <div class="related-posts mt-9 mb-9">
                                <h3 class="title title-simple text-left text-normal">Bài viết liên quan</h3>
                                <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2" data-owl-options="{
                                    'items': 1,
                                    'margin': 20,
                                    'loop': false,
                                    'responsive': {
                                        '576': {
                                            'items': 2
                                        },
                                        '992': {
                                            'items': 3
                                        }
                                    }
                                }">

                                    <?php $__empty_1 = true; $__currentLoopData = $news_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="post">
                                        <figure class="post-media">
                                            <a href="<?php echo e(route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])); ?>">
                                                <img src="<?php echo e(asset('uploads/news/'.$item -> image_name)); ?>" width="380" height="250"
                                                    alt="<?php echo e($item -> title); ?>" title="<?php echo e($item -> title); ?>"/>
                                            </a>
                                        </figure>
                                        <div class="post-details">
                                            <div class="post-meta">
                                                <span class="post-date"><?php echo e($item -> created_at); ?></span>
                                                
                                            </div>
                                            <h4 class="post-title"><a href="<?php echo e(route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])); ?>"><?php echo e($item -> title); ?></a></h4>
                                            
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="post">Không có bài viết liên quan </div>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                            
                          
                        </div>
                        <aside class="col-lg-3 right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
                            <div class="sidebar-overlay">
                                <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                            </div>
                            <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content">
                                <div class="sticky-sidebar" data-sticky-options="{'top': 89, 'bottom': 70}">
                                    
                                    <div class="widget widget-categories">
                                        <h3 class="widget-title">Danh mục tin tức</h3>
 
 										<!--- menu cat_news -->
                                        <ul class="widget-body filter-items search-ul">
                                        	<?php $__currentLoopData = $cat_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if( $item -> parent == null): ?>
                                            <li>
                                                <a href="<?php echo e(route('cat_news.news',['slug' => slugify($item -> title,'-'),'id' => $item -> id])); ?>" class="<?php echo e(count($item->children) ? 'show' :''); ?>"><?php echo e($item->title); ?></a>
                                                 <?php if(count($item->children)): ?>
								                    <?php echo $__env->make('frontend.news.menusub',['childs' => $item-> children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								                 <?php endif; ?>
                                                
                                            </li>
                                            <?php endif; ?>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <!--- end menu cat_news -->

                                        
                                    </div>
                                   
                                    

                                    <div class="widget widget-posts">
                                        <h3 class="widget-title">Tag Cloud</h3>
                                        <div class="widget-body">
                                            
                                        	<?php $__empty_1 = true; $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <a href="<?php echo e(route('list.news.tags',['slug' => slugify($tag -> name,'-'),'id' => $tag -> id ])); ?>" class="tag"><?php echo e($tag -> name); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <p>Không có tags</p>
                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </main>
	
	

	<?php $__env->stopSection(); ?>

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/news/detail.blade.php ENDPATH**/ ?>