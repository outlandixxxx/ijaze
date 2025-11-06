<footer id="dk-footer" class="dk-footer mt-8 mb-4 border-top border-5 border-dark">
    <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-start gap-4">
        
        @if(app()->getLocale() == 'ar')
            <!-- Arabic (RTL): Subscribe → Links → Social -->
            
            <!-- Subscribe Column -->
            <div class="col-lg-5 col-md-12 mb-4 mb-lg-0 order-1 order-lg-1">
                <div class="footer-widget">
                    <div class="section-heading mb-2">
                        <h3>{{ __('Subscribe') }}</h3>
                        <span class="animate-border border-black"></span>
                    </div>
                    <p>{{ __('Receive our latest updates and offers by subscribing') }}</p>
                    <form id="subscribe-form" 
                          class="dk-footer-form d-flex flex-column flex-sm-row gap-2"
                          data-submit-route="{{ route('subscribe') }}"
                          data-success-message="{{ __('Successfully subscribed!') }}"
                          data-error-message="{{ __('An error occurred. Please try again.') }}">
                        @csrf
                        <input type="email" name="email" class="form-control" placeholder="{{ __('Email Address') }}" required>
                        <button type="submit" class="btn" style="background-color:#fbc550; color:#000;">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                    <div id="subscribe-message" class="mt-2"></div>
                </div>
            </div>

            <!-- Links Column -->
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 order-2 order-lg-2">
                <ul class="d-flex flex-column text-white">
                    <li><a href="{{ route('staffer') }}" class="text-white text-decoration-none">{{ __('Editorial Board') }}</a></li> 
                    <li><a href="{{ route('policy') }}" class="text-white text-decoration-none">{{ __('Privacy Policy') }}</a></li>
                    <li><a href="#" class="text-white text-decoration-none" data-bs-toggle="modal" data-bs-target="#contactModal">{{ __('Contact Us') }}</a></li>
                </ul>
            </div>

            <!-- Social Media Column -->
            <div class="dk-footer-box-info col-lg-3 col-md-12 mb-4 mb-lg-0 order-3 order-lg-3">
                <p class="mb-2">{{ __('Follow all breaking news through our social media platforms') }}</p>
                <ul class="d-flex gap-2">
                    <li><a href="#" aria-label="Facebook"><i class="fab fa-facebook fa-xl"></i></a></li>
                    <li><a href="#" aria-label="Instagram"><i class="fab fa-square-instagram fa-xl"></i></a></li>
                    <li><a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in fa-xl"></i></a></li>
                    <li><a href="#" aria-label="YouTube"><i class="fab fa-youtube fa-xl"></i></a></li>
                </ul>
            </div>

        @else
            <!-- English/French (LTR): Social → Links → Subscribe -->
            
            <!-- Social Media Column -->
            <div class="dk-footer-box-info col-lg-3 col-md-12 mb-4 mb-lg-0 order-1 order-lg-1">
                <p class="mb-2">{{ __('Follow all breaking news through our social media platforms') }}</p>
                <ul class="d-flex gap-2">
                    <li><a href="#" aria-label="Facebook"><i class="fab fa-facebook fa-xl"></i></a></li>
                    <li><a href="#" aria-label="Instagram"><i class="fab fa-square-instagram fa-xl"></i></a></li>
                    <li><a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in fa-xl"></i></a></li>
                    <li><a href="#" aria-label="YouTube"><i class="fab fa-youtube fa-xl"></i></a></li>
                </ul>
            </div>

            <!-- Links Column -->
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 order-2 order-lg-2">
                <ul class="d-flex flex-column text-white">
                    <li><a href="{{ route('staffer') }}" class="text-white text-decoration-none">{{ __('Editorial Board') }}</a></li> 
                    <li><a href="{{ route('policy') }}" class="text-white text-decoration-none">{{ __('Privacy Policy') }}</a></li>
                    <li><a href="#" class="text-white text-decoration-none" data-bs-toggle="modal" data-bs-target="#contactModal">{{ __('Contact Us') }}</a></li>
                </ul>
            </div>

            <!-- Subscribe Column -->
            <div class="col-lg-5 col-md-12 mb-4 mb-lg-0 order-3 order-lg-3">
                <div class="footer-widget">
                    <div class="section-heading mb-2">
                        <h3>{{ __('Subscribe') }}</h3>
                        <span class="animate-border border-black"></span>
                    </div>
                    <p>{{ __('Receive our latest updates and offers by subscribing') }}</p>
                    <form id="subscribe-form" 
                          class="dk-footer-form d-flex flex-column flex-sm-row gap-2"
                          data-submit-route="{{ route('subscribe') }}"
                          data-success-message="{{ __('Successfully subscribed!') }}"
                          data-error-message="{{ __('An error occurred. Please try again.') }}">
                        @csrf
                        <input type="email" name="email" class="form-control" placeholder="{{ __('Email Address') }}" required>
                        <button type="submit" class="btn" style="background-color:#fbc550; color:#000;">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                    <div id="subscribe-message" class="mt-2"></div>
                </div>
            </div>
        @endif

    </div>

    <!-- Copyright -->
    <div class="copyright mt-3 text-center text-white w-100">
        <span>{{ __('Copyright') }} © {{ date('Y') }} {{ __('All rights reserved to Ijaze Company') }}</span>
    </div>

    <!-- Back to top button -->
    <div id="back-to-top" class="position-fixed bottom-0 end-0 m-3">
        <button class="btn" title="{{ __('Back to Top') }}" style="background-color:#fbc550; color:#000;">
            <i class="fa fa-angle-up"></i>
        </button>
    </div>
</footer>

