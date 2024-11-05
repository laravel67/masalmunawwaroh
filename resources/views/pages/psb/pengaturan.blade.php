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
                                <img src="{{ asset('storage/'.$taj->image) }}" class="img-fluid" width="200px">
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
                    <form wire:submit.prevent='{{ $isEditing ? 'update':'store' }}'>
                        <x-input title="Tahun ajaran" name="name" type="text"/>
                        <x-input title="Katua Panitia" name="chief" type="text"/>
                        <x-inputArea title="Deskiripsi" name="body"/>
                        <x-input title="Gambar Brosur" name="image" type="file"/>
                        @if ($image)
                        <img style="width: 200px; height: 200px" src="{{ $image->temporaryUrl() }}">
                        @elseif ($isEditing && $oldImage)
                        <img style="width: 200px; height: 200px" src="{{ asset('storage/'.$oldImage) }}">
                        @endif
                        <x-btn-form/>
                    </form>
                </div>
            </div>
          <div class="m-2">
            {!! $tajs->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>