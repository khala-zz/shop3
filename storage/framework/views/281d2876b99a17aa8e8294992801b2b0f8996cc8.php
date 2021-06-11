<footer class="footer appear-animate">
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="<?php echo e(route('home')); ?>" class="logo-footer">
                                <img src="<?php echo e(asset('images/logo-footer.png')); ?>" alt="logo-footer" width="163" height="39" />
                            </a>
                            <!-- End of FooterLogo -->
                        </div>
                        <div class="col-lg-9">
                            <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                                <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                                    <h4 class="widget-title">Đăng kí email</h4>
                                    <p>Nhập thông tin email để nhận tin mới nhất,mã giảm giá...</p>
                                </div>
                                <form action="<?php echo e(route('newsletter.store')); ?>" method="post" class="input-wrapper input-wrapper-inline">
                                    <?php echo csrf_field(); ?>
                                    <input type="email" class="form-control" name="email" id="newsletter-email1"
                                        placeholder="Địa chỉ email..." required />
                                    <button class="btn btn-primary btn-md ml-2" type="submit">Đăng kí<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                            <!-- End of Newsletter -->
                        </div>
                    </div>
                </div>
                <!-- End of FooterTop -->
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="widget">
                                <h4 class="widget-title">Thông tin liên hệ</h4>
                                <ul class="widget-body">
                                    <li>
                                        <label>Di động:</label>
                                        <a href="#">0906077097</a>
                                    </li>
                                    <li>
                                        <label>Email:</label>
                                        <a href="#">dokhaclam@gmail.com</a>
                                    </li>
                                    <li>
                                        <label>Địa chỉ:</label>
                                        <a href="#">346 Mã Lò P.Bình Trị Đông A,Q.Bình Tân</a>
                                    </li>
                                    <li>
                                        <label>Thời gian làm việc</label>
                                    </li>
                                    <li>
                                        <a href="#">Hai - Sáu / 9:00 sáng - 8:00 tối</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End of Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="widget ml-lg-4">
                                <h4 class="widget-title">Thành viên</h4>
                                <ul class="widget-body">
                                   
                                    <!-- link login,logou account -->
                                    <?php if(empty(Auth::check())): ?>
                                        <li>
                                            <a  href="<?php echo e(url('/front-login')); ?>">
                                                Đăng nhập
                                            </a>
                                        </li>
                                        <li>
                                            <a  href="<?php echo e(url('/front-register')); ?>">
                                                <span>Đăng kí</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a  href="<?php echo e(url('/cart')); ?>">
                                                <span>Giỏ hàng</span>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a href="<?php echo e(url('/my-account')); ?>">
                                                Tài khoản
                                            </a>
                                        </li>
                                       
                                        <li>
                                            <a  href="<?php echo e(url('/cart')); ?>">
                                                <span>Giỏ hàng</span>
                                            </a>
                                        </li>
                                         <li>
                                            <a href="<?php echo e(url('/front-logout')); ?>">
                                                Đăng xuất
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <!-- End of link login,logou account -->
                                </ul>
                            </div>
                            <!-- End of Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="widget ml-lg-4">
                                <h4 class="widget-title">Thông tin khác</h4>
                                <ul class="widget-body">
                                    <li><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
                                    <li><a href="<?php echo e(url('cua-hang')); ?>">Cửa hàng</a></li>
                                    <li><a href="<?php echo e(url('tin-tuc')); ?>">Tin tức</a></li>
                                    <li><a href="<?php echo e(url('tin-tuc/about/6')); ?>">Giới thiệu</a></li>
                                    <li><a href="<?php echo e(url('lien-he')); ?>">Liên hệ</a></li>
                                </ul>
                            </div>
                            <!-- End of Widget -->
                        </div>
                        
                    </div>
                </div>
                <!-- End of FooterMiddle -->
                <div class="footer-bottom">
                    <div class="footer-left">
                        <figure class="payment">
                            <img src="<?php echo e(asset('images/payment.png')); ?>" alt="payment" width="159" height="29" />
                        </figure>
                    </div>
                    <div class="footer-center">
                        <p class="copyright">KHALA &copy; 2021. All Rights Reserved</p>
                    </div>
                    <div class="footer-right">
                        <div class="social-links">
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                        </div>
                    </div>
                </div>
                <!-- End of FooterBottom -->
            </div>
        </footer><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/components/footer.blade.php ENDPATH**/ ?>