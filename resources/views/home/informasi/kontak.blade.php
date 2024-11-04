<x-content>
    <div class="container my-5">
        <div class="row contact-info position-relative g-0 mb-5">
            <div class="col-lg-6">
                <div class="d-flex justify-content-lg-start bg-success p-4">
                    
                    <div class="text-white">
                        <i class="fas fa-phone fa-lg display-5"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-white">{{ __('Telpon') }}</h6>
                        <h4 class="text-white mb-0">{{ __('082190516703') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-lg-center bg-success p-4">
                    <div class="text-white">
                        <i class="fas fa-envelope fa-lg display-5"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-white">{{ __('Alamat Email') }}</h6>
                        <h4 class="text-white mb-0">{{ __('masalmunawwaroh2004@gmail.com') }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Nama Lengkap">
                                <label for="name">{{ __('Nama Lengkap') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Alamat Email">
                                <label for="email">{{ __('Alamat Email') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" placeholder="Subjek">
                                <label for="subject">{{ __('Subjek') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Tulis pesan..." id="message" style="height: 200px"></textarea>
                                <label for="message">{{ __('Pesan') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success py-3 px-5" type="submit">{{ __('Kirim') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5015.179326296556!2d102.29282087590344!3d-2.066587097914879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e6d89350eebd1%3A0x8f77cc9623bde597!2spondok%20pesantren%20al-munawwaroh!5e1!3m2!1sid!2sid!4v1730398929877!5m2!1sid!2sid" frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</x-content>