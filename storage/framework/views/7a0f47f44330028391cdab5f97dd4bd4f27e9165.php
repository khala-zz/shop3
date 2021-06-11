
	<?php $__env->startSection('title'); ?>
		<title>Liên hệ</title>
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
	   <main class="main">
            <div class="page-header" style="background-image: url(<?php echo e(asset('images/page-header.jpg')); ?>)">
                <h1 class="page-title">Liên hệ chúng tôi</h1>
            </div>
            <div class="page-content mt-10 pt-4">
                <section class="contact-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-xs-5 ls-m pt-3">

                                <h2 class="font-weight-bold text-uppercase ls-m mb-2">Liên hệ</h2>
                                <p>Bạn cận sự giúp đỡ? Điền thông tin và gửi cho chúng tôi.</p>

                                <h4 class="mb-1 text-uppercase">Địa chỉ</h4>
                                <p>346/13/5 Mã Lò<br>Bình Trị Đông A, Bình Tân</p>

                                <h4 class="mb-1 text-uppercase">Điện thoại</h4>
                                <p><a href="tel:#">0906077097</a></p>

                                <h4 class="mb-1 text-uppercase">Hỗ trợ</h4>
                                <p>
                                    <a href="#">dokhaclam@gmail.com</a><br>
                                    
                                </p>
                            </div>
                            <div class="col-lg-9 col-md-8 col-xs-7">
                                <!-- hien thi thong bao -->
                                <?php if(Session::has('flash_message_success')): ?>
                                    <div class="alert alert-success alert-dark alert-round alert-inline">
                                        <h4 class="alert-title">Thành công :</h4>
                                        <?php echo session('flash_message_success'); ?>

                                        <button type="button" class="btn btn-link btn-close">
                                            <i class="d-icon-times"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <!-- end hien thi thong bao -->
                                <form class="ml-lg-2 pt-8 pb-10 pl-4 pr-4 pl-lg-6 pr-lg-6 grey-section" action="<?php echo e(route('contact.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <h3 class="ls-m mb-1">Liên hệ tới chúng tôi</h3>
                                    <p class="text-grey">Thông tin của bạn không bị công khai. Thông tin bắt buộc nhập *</p>
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <input class="form-control <?php echo e($errors->has('name') ? 'error' : ''); ?>" name="name" type="text" placeholder="Tên *" required>
                                             <!-- Error -->
                                            <?php if($errors->has('name')): ?>
                                                <div class="error">
                                                    <?php echo e($errors->first('name')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input class="form-control <?php echo e($errors->has('mobile') ? 'error' : ''); ?>" name="mobile" type="text" placeholder="Điện thoại *" required>
                                             <!-- Error -->
                                            <?php if($errors->has('mobile')): ?>
                                                <div class="error">
                                                    <?php echo e($errors->first('mobile')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input class="form-control <?php echo e($errors->has('email') ? 'error' : ''); ?>" type="email" placeholder="Email *" name = "email" required>
                                            <!-- error -->
                                            <?php if($errors->has('email')): ?>
                                                <div class="error">
                                                    <?php echo e($errors->first('email')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <textarea class="form-control <?php echo e($errors->has('message') ? 'error' : ''); ?>" required
                                                placeholder="Nội dung *" name="message"></textarea>
                                                <!-- error -->
                                                <?php if($errors->has('message')): ?>
                                                    <div class="error">
                                                        <?php echo e($errors->first('message')); ?>

                                                    </div>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                    <button type = "submit" class="btn btn-md btn-primary mb-2" >Gửi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End About Section-->

                <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
                <div class="grey-section google-map" id="googlemaps" style="height: 386px"></div>
                <!-- End Map Section -->
            </div>
        </main>
	
	

	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('js/jquery-gmap/jquery.gmap.min.js')); ?>"></script>
    <!-- nhap key khi dua len host -->
    <script src="https://maps.googleapis.com/maps/api/js?key="></script>
    <script>

        /*
        Map Settings

            Find the Latitude and Longitude of your address:
                - https://www.latlong.net/
                - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

        */

        // Map Markers
        var mapMarkers = [{
            address: "346 Mã Lò Phường Bình Trị Đông A,Quận Bình Tân,TPHCM",
            html: "<strong>Văn phòng chính</strong><br>346 Mã Lò Bình Trị Đông A,Bình Tân,TPHCM",
            popup: true
        }];

        // Map Initial Location
        var initLatitude = 10.775430;
        var initLongitude = 106.601280;

        // Map Extended Settings
        var mapSettings = {
            controls: {
                draggable: !window.Donald.isMobile,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: mapMarkers,
            latitude: initLatitude,
            longitude: initLongitude,
            zoom: 11
        };

        var map = $('#googlemaps').gMap(mapSettings);

        // Map text-center At
        var mapCenterAt = function (options, e) {
            e.preventDefault();
            $('#googlemaps').gMap("centerAt", options);
        }

    </script>
    <?php $__env->stopSection(); ?>


	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/contact.blade.php ENDPATH**/ ?>