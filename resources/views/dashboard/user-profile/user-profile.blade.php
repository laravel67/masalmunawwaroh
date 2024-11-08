<x-main>
    <div class="my-3 p-3 bg-white rounded shadow-sm rounded-0 row">
        <div class="col-md-6">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h6 class="border-gray pb-2 mb-0"><i class="fa-solid fa-user-tie"></i> Profile</h6>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                @if ($user->image)
                <img class="img-thumbnail" src="{{ asset('storage/'.$user->image) }}" width="200" height="200">
                @else
                <img class="img-thumbnail" src="{{ asset('frontend/img/user.svg') }}" width="200" height="200">
                @endif
            </div>
            <h5 class="text-center">{{ $user->name }}</h5>
            <div class="row">
                <div class="col-md">
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-user-tie bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Username</span>
                            </div>
                            <strong class="d-block text-dark">{{ $user->username }}</strong>
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-envelope bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Email</span>
                            </div>
                            <strong class="d-block text-dark">{{ $user->email }}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-circle-info bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Role</span>
                            </div>
                            <strong class="d-block text-dark">
                                {{ $user->role }}
                            </strong>
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-phone bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Kontak</span>
                            </div>
                            <strong class="d-block text-dark">{{ $user->phone }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                @include('dashboard.user-profile.user-update')
                @include('dashboard.user-profile.reset-password')
            </div>
        </div>
    </div>
</x-main>