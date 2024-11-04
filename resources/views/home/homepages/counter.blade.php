<div class="container-fluid py-5 ">
    <div class="container shadow-md">
        <div class="row g-0 feature-row">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item border h-100 p-5 text-center">
                    <i class="fas fa-users text-success" style="font-size: 50px;"></i>
                    <h5 class="mb-2">{{ __('Siswa') }}</h5>
                    <h3 data-toggle="counter-up">99</h3>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item border h-100 p-5 text-center">
                    <i class="fas fa-user-graduate text-success" style="font-size: 50px;"></i>
                    <h5 class="mb-2">{{ __('Alumnus') }}</h5>
                    <h3 data-toggle="counter-up">{{ isset($totalAlumnus) ? $totalAlumnus : 0 }}</h3>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item border h-100 p-5 text-center">
                    <i class="fas fa-user-tie text-success" style="font-size: 50px;"></i>
                    <h5 class="mb-2">{{ __('Guru') }}</h5>
                    <h3 data-toggle="counter-up">{{ isset($totalGuru) ? $totalGuru : 0 }}</h3>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item border h-100 p-5 text-center">
                    <i class="fas fa-trophy text-success" style="font-size: 50px;"></i>
                    <h5 class="mb-2">{{ _('Prestasi') }}</h5>
                    <h3 data-toggle="counter-up">{{ isset($totalPrestasi) ? $totalPrestasi : 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>