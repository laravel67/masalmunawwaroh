{{-- <div>
    <div class="table-responsive">

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Brosur</th>
                    <th scope="col">Tahun Ajaran</th>
                    <th scope="col">Ketua Penitia</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tajs as $i=>$taj )
                <tr>
                    <th>
                        <img src="{{ asset('storage/brosurs/'.$taj->image) }}" class="img-fluid" width="200px">
                    </th>
                    <td>{{ $taj->name }}</td>
                    <td>{{ $taj->chief }}</td>
                    <td>
                        @if ($taj->status==1)
                        <span class="badge badge-success">Dibuka</span>
                        @else
                        <span class="badge badge-secondary">Ditutup</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn btn-group">
                            @if ($taj->status=='0')
                            <x-btn-action model="active('{{ $taj->id }}')" color="secondary">
                                {{ __('toggle-off') }}
                            </x-btn-action>
                            @else
                            <x-btn-action model="unactive('{{ $taj->id }}')" color="success">
                                {{ __('toggle-on') }}
                            </x-btn-action>
                            @endif
                            <x-btn-action model="edit('{{ $taj->id }}')" color="warning">
                                {{ __('edit') }}
                            </x-btn-action>
                            <x-btn-action model="deleting('{{ $taj->id }}')" color="danger">
                                {{ __('trash') }}
                            </x-btn-action>
                        </div>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
        {!! $tajs->links() !!}
    </div>
</div> --}}


<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <div class="card-tools">
            <x-search/>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
            <div class="row d-flex justify-content-between px-md-2">
                <div class="col-md-6">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                            <th scope="col">{{ __('Brosur') }}</th>
                            <th scope="col">{{ __('Tahun Ajaran') }}</th>
                            <th scope="col">{{ __('Ketua Panitia') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('Opsi') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($tajs as $i=>$taj )
                        <tr>
                            <th>
                                <img src="{{ asset('storage/brosurs/'.$taj->image) }}" class="img-fluid" width="200px">
                            </th>
                            <td>{{ $taj->name }}</td>
                            <td>{{ $taj->chief }}</td>
                            <td>
                                @if ($taj->status==1)
                                <span class="badge badge-success">{{ __('Dibuka') }}</span>
                                @else
                                <span class="badge badge-secondary">{{ __('Ditutup') }}</span>
                                @endif
                            </td>
                            <td>
                                <x-btnAct>
                                    @if ($taj->status=='0')
                                     <x-act title="Aktifkan" model="active('{{ $taj->id }}')" icon="toggle-off"  />
                                    @else
                                     <x-act title="Matikan" model="unactive('{{ $taj->id }}')" icon="toggle-on"  />
                                    @endif
                                    <x-act title="Ubah" model="edit('{{ $taj->id }}')" icon="edit" />
                                    <x-act title="Hapus" model="deleting('{{ $taj->id }}')" icon="trash" />
                                </x-btnAct>
                            </td>
                        </tr>
                        @empty
                        <th>{{ __('Data tidak ditemukan! ') }}</th>
                        @endforelse
                      </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <livewire:setting.create>  
                </div>
            </div>
          <div class="m-2">
            {!! $tajs->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>