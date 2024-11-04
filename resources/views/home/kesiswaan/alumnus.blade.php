<x-content>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="accordion accordion-flush col-md-6" id="accordionFlushExample">
                @if(session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill"></use>
                        </svg>
                        <div>
                            {{ session('success') }}
                        </div>
                        </div>
                    @endif
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      {{ __('Klik disini Untuk memngirim pesan dan kesan anda sebagai alumni MAS AL-Munawwaroh') }}
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse active" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form class="row justify-content-center g-5" method="POST" action="{{ route('create.kesan') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                <h2 class="mb-4">{{ __('Buat Pesan & Kesan') }}</h2>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap">
                                            <label for="name">{{ __('Nama Lengkap') }}</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                                <option selected>{{ __('Status') }}</option>
                                                <option value="pendidikan">{{ __('Pendidikan') }}</option>
                                                <option value="kerja">{{ __('Kerja') }}</option>
                                            </select>
                                            <label for="status">{{ __('Status') }}</label>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" placeholder="Tempat Pendidikan/Kerja">
                                            <label for="tempat">{{ __('Tempat Pendidikan/Kerja') }}</label>
                                            @error('tempat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <select class="form-select @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan">
                                                <option selected>{{ __('Pilih Angkatan') }}</option>
                                                @for ($i = 1; $i <= 50; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <label for="angkatan">{{ __('Angkatan Ke-') }}</label>
                                            @error('angkatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Leave a message here" style="height: 130px"></textarea>
                                            <label for="message">{{ __('Pesan & Kesan') }}</label>
                                            @error('message')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="Gambar">
                                            <label for="image">{{ __('Gambar') }}</label>
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-success w-100 py-3" type="submit">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-content>