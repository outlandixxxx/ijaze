{{-- <footer id="dk-footer" class="dk-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="dk-footer-box-info">

                    <p class="footer-info-text">
                        Reference site about Lorem Ipsum
                    </p>
                    <div class="footer-social-link">
                        <h3>Follow us</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Social link -->
                </div>
            </div>
            <!-- End Col -->
            <div class="col-md-12 col-lg-8">

                <div class="row">

                    <!-- End col -->
                    <div class="col-md-12 col-lg-6">
                        <div class="footer-widget">
                            <div class="section-heading">
                                <h3>Subscribe</h3>
                                <span class="animate-border border-black"></span>
                            </div>
                            <p><!-- Don’t miss to subscribe to our new feeds, kindly fill the form below. -->
                                Reference site about Lorem Ipsum, giving information on its origins, as well.</p>
                            <form action="#">
                                <div class="form-row">
                                    <div class="col dk-footer-form">
                                        <input type="email" class="form-control" placeholder="Email Address">
                                        <button type="submit">
                                            <i class="fab fa-send"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- End form -->
                        </div>
                        <!-- End footer widget -->
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-lg-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span>Copyright © {{ date('Y') }} IjazePlus. All Rights Reserved.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->


            </div>
            <!-- End Col -->
        </div>
        <!-- End Widget Row -->
    </div>
    <!-- End Contact Container -->
    <!-- Back to top -->
    <div id="back-to-top" class="back-to-top">
        <button class="btn btn-dark" title="Back to Top" style="display: block;">
            <i class="fa fa-angle-up"></i>
        </button>
    </div>
    <!-- End Back to top -->


</footer>
 --}}


 <footer id="dk-footer" class="dk-footer mt-8 mb-4" style="border-top: 5px, solide ;">
    <div class="container d-flex flex-wrap justify-content-between align-items-start gap-lg-4">
        <!-- Left Column: Info + Social -->
        <div class="dk-footer-box-info col-lg-4 col-md-12 mb-4 mb-lg-0">
            <p class="footer-info-text">
                قم بمتابعة كل الاخبار العاجلة من خلال مواقعنا على وسائل التواصل الاجتماعي
            </p>
            <div class="footer-social-link d-flex flex-column">
                <h3>تابعنا</h3>
                <ul class="d-flex gap-2 mt-2">
                    <li><a href="#"><i class="fab fa-facebook fa-xl"></i></a></li>
                    <li><a href="#"><i class="fab fa-square-instagram fa-xl"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in fa-xl"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube fa-xl"></i></a></li>
                </ul>
            </div>
        </div>

        <!-- Right Column: Subscribe + Copyright -->
        <div class="col-lg-7 col-md-12 d-flex flex-column justify-content-between">
            <div class="footer-widget mb-3">
                <div class="section-heading">
                    <h3>اشترك</h3>
                    <span class="animate-border border-black"></span>
                </div>
                <p>
توصل بابرز تحديثاتنا و عروصنا من خلال مشاركتم                </p>
                <form action="#" class="dk-footer-form d-flex">
                    <input type="email" class="form-control me-2" placeholder="Email Address">
                    <button type="submit"><i class="fa-solid fa-paper-plane fa-2xl" style="color: #0d392c;"></i></button>
                </form>
            </div>

            <div class="copyright mt-3 text-start text-lg-start">
                <span>Copyright © {{ date('Y') }} +جميع الحقوق محفوظة لشركة إجاز</span>
            </div>
        </div>
         <!-- Back to top button inside the container -->
         <div  id="back-to-top" class="back-to-top position-absolute top-0 end-0 py-4 px-4">
            <button class="btn btn-dark" title="Back to Top">
                <i class="fa fa-angle-up"></i>
            </button>
        </div>
    </div>


</footer>

