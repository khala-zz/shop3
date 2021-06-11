
    <?php $title_cat = str_replace('-',' ', Request::segment(2)); ?>
	<?php $__env->startSection('title'); ?>
		<title><?php echo e($title_cat); ?></title>
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
	   <main class="main">
            <div class="page-header" style="background-image: url(<?php echo e(asset('images/page-header.jpg')); ?>)">
                <h1 class="page-title"><?php echo e($title_cat); ?></h1>
            </div>
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>"><i class="d-icon-home"></i></a></li>
                        <li><a href="#" class="active">Tags</a></li>
                        <li><?php echo e($title_cat); ?> </li>
                    </ul>
                </div>
            </nav>
            <div class="page-content mt-6">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="col-lg-9">
                            <div class="posts">
                                <?php $__currentLoopData = $news_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article class="post post-list mb-10 pb-4">
                                    <figure class="post-media">
                                        <a href="<?php echo e(route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])); ?>">
                                            <img src="<?php echo e(asset('uploads/news/'.$item -> image_name)); ?>" width="870" height="420" alt="<?php echo e($item -> title); ?>" title="<?php echo e($item -> title); ?>" />
                                        </a>
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                            <span class="post-author"><?php echo e($item -> user -> name); ?></span>
                                            |
                                            <span class="post-date"><?php echo e($item -> created_at); ?></span>
                                            
                                        </div>
                                        <h4 class="post-title"><a href="<?php echo e(route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])); ?>"><?php echo e($item -> title); ?></a>
                                        </h4>
                                        <div class="post-cats">
                                            <a href="<?php echo e(route('cat_news.news',['slug' => slugify($item -> cat_news -> title,'-'),'id' => $item -> cat_news -> id])); ?>"><?php echo e($item -> cat_news -> title); ?></a>
                                        </div>
                                        <p class="post-content"><?php echo e($item -> description); ?></p>
                                        <a href="<?php echo e(route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])); ?>"
                                            class="btn btn-link btn-underline btn-primary btn-reveal-right">Chi tiết<i
                                                class="d-icon-arrow-right"></i></a>
                                    </div>
                                </article>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </div>
                            <?php echo e($news_tag  -> links()); ?>

                            <br />
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
                                            <li class="active">
                                                <a href="<?php echo e(route('cat_news.news',['slug' => slugify($item -> title,'-'),'id' => $item -> id])); ?>" class="<?php echo e(count($item->children) ? 'show' :''); ?>" <?php echo e(Request::segment(3) == $item-> id ? 'style=color:#26b' : " "); ?>><?php echo e($item->title); ?></a>
                                                 <?php if(count($item->children)): ?>
                                    
                                                    <?php echo $__env->make('frontend.news.menusub',['childs' => $item -> children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('list.news.tags',['slug' => slugify($tag -> name,'-'),'id' => $tag -> id])); ?>" class="tag"><?php echo e($tag -> name); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/news/tag.blade.php ENDPATH**/ ?>