<!-- Contact Us Modal -->
<div class="modal fade " id="contactModal" tabindex="-1">
    <div class="modal-dialog modal-l">
        <div class="modal-content border-0 contactmodal bg-dark">
            <div class="modal-body p-0">
                <section class="contact-page-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-info">
                                    <div class="contact-info-item">
                                        <div class="contact-info-icon"> <i class="fas fa-map-marked"></i> </div>
                                        <div class="contact-info-text">
                                            <h2>{{ __('Address') }}</h2> 
                                            <span>17 Place Charles Nicole, Res. Pasteur Build. Etage 7, N°2</span> 
                                            <span>CASABLANCA</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-info">
                                    <div class="contact-info-item">
                                        <div class="contact-info-icon"> <i class="fas fa-envelope"></i> </div>
                                        <div class="contact-info-text gp-3">
                                            <h2>{{ __('Email') }}</h2> 
                                            <span>contact@ijazplus.com</span>
                                            <span>ijazplusmedia@gmail.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-page-form" method="post">
                                    <h2>{{ __('Stay in Touch') }}</h2>
                                    
                                    <!-- Contact Alert -->
                                    <div id="contactAlert" class="alert d-none text-center" role="alert"></div>

                                    <!-- Contact Form -->
                                    <form id="contactForm" 
                                          method="post"
                                          data-recaptcha-key="{{ config('services.recaptcha.key') }}"
                                          data-submit-route="{{ route('contact.submit') }}"
                                          data-error-message="{{ __('An error occurred while sending the message.') }}"
                                          data-connection-error="{{ __('A connection error occurred with the server.') }}">
                                        <div class="row justify-content-end">
                                            
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="single-input-field">
                                                    <input type="email" placeholder="{{ __('Email Address') }}"
                                                        name="email" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="single-input-field">
                                                    <input type="text" placeholder="{{ __('Full Name') }}" name="name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="single-input-field">
                                                    <input type="text" placeholder="{{ __('Subject') }}" name="subject" />
                                                </div>
                                            </div>
                                            <div class="col-md-12 message-input">
                                                <div class="single-input-field">
                                                    <textarea placeholder="{{ __('Message') }}" name="message"></textarea>
                                                </div>
                                            </div>
                                            
                                            <!-- Hidden reCAPTCHA token field -->
                                            <input type="hidden" name="recaptcha_token" id="contact_recaptcha_token">
                                            
                                            <div class="single-input-fieldsbtn text-center">
                                                <input type="submit" value="{{ __('Send') }}" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom alerts for dark modal */
    #contactAlert.alert-success {
        background-color: #28a745;
        color: #fff;
    }

    #contactAlert.alert-danger {
        background-color: #dc3545;
        color: #fff;
    }
</style>

{{-- Load Google reCAPTCHA v3 --}}
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.key') }}"></script>

