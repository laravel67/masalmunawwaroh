<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header d-flex justify-content-between align-items-center">
            @if($students->isNotEmpty())
            <div class="d-none d-md-block">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button wire:click="export" type="button" class="btn btn-sm btn-danger rounded-0">{{ __('Export excel') }} <i class="fas fa-file-download"></i></button>
                </div>
            </div>
            @endif
            <div>
                <div class="d-flex align-items-center">
                    <div class="px-1">{{ __('Show') }}</div>
                    <select wire:model="perPage" wire:change="show($event.target.value)"
                        class="form-control text-center form-control-sm">
                        @for ($i = 5; $i <= 100; $i +=5) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                    <div class="px-1">{{ __('Enteries') }}</div>
                </div>
            </div>
            <div class="d-flex align-items-center col-1">
                <div class="px-1">TA</div>
                <select wire:model="ta" wire:change="show($event.target.value)"
                    class="form-control form-control-sm">
                    <option value="">--</option>
                    @forelse ($tajs as $taj)
                    <option value="{{ $taj->id }}">{{ $taj->name }}</option>    
                    @empty
                        
                    @endforelse
                </select>
            </div>
          <div class="card-tools">
            <x-search/>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>{{ __('No.') }}</th>
                <th>{{ __('No NIK') }}</th>
                <th>{{ __('Nama Lengkap') }}</th>
                <th>{{ __('Tempat, Tanggal Lahir') }}</th>
                <th>{{ __('Jenis Kelamin') }}</th>
                <th>{{ __('Umur') }}</th>
                <th>{{ __('Tahun Ajaran') }}</th>
                <th>{{ __('Kontak') }}</th>
                <th>{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($students as $i=> $student)
                <tr>
                    <td>{{ $students->firstItem() + $i }}</td>
                    <td>{{ $student->nik }}</td>
                    <td>{{ $student->nama }}</td>
                  <td>
                    {{ $student->tempat_lahir }}, {{
                        \Carbon\Carbon::parse($student->tanggal_lahir)->locale('id')->translatedFormat('d F
                        Y')}}
                  </td>
                  <td>{{ $student->jenis_kelamin }}</td>
                    <td>{{ $student->umur }} Tahun</td>
                    <td>
                        @if ($student->ta_id)
                        {{ $student->ta->name }}
                        @else
                        <strong>-</strong>
                        @endif
                    </td>
                    <td>
                        @if ($student->kontak)
                        {{ $student->kontak }}
                        @else
                        <strong>-</strong>
                        @endif
                    </td>
                  <td>
                    <x-btnAct>
                        <x-act title="Detail" href="{{ route('appdb.show', $student->id) }}" icon="book-open" />
                        <x-act title="Ubah" href="{{ route('appdb.edit', $student->id) }}" icon="edit" />
                        <x-act title="Hapus" model="deleting('{{ $student->id }}')" icon="trash" />
                    </x-btnAct>
                  </td>
                </tr>
                @empty
                    <td>{{ __('Belum ada siswa yang mendaftar tahun ajaran sekarang.') }}</td>
                @endforelse
            </tbody>
          </table>
          <div class="m-2">
            {!! $students->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>