<div class="row">
    <div class="col-md-7">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ __('Data Album') }}</h3>

          <div class="card-tools">
           <x-search/>
          </div>
        </div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">{{ __('Nama Album') }}</th>
                    <th scope="col">{{ __('Kategori') }}</th>
                    <th scope="col">{{ __('Aksi') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($galeries as $galery)
                    <tr>
                      <td>{{ $galery->title }}</td>
                      <td>
                        @if ($galery->category=='foto')
                            <i class="fas fa-images"> {{ __('Foto') }}</i>
                        @else
                            <i class="fab fa-youtube text-danger"> {{ __('Video') }}</i>
                        @endif
                      </td>
                      <td>
                        <x-btnAct>
                            <x-act title="Preview" href="{{ route('album.detail', $galery->slug) }}" icon="book-open" />
                            <x-act title="Ubah" model="editing('{{ $galery->id }}')" icon="edit" />
                            <x-act title="Hapus" model="deleting('{{ $galery->id }}')" icon="trash" />
                        </x-btnAct>
                      </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
            <div class="px-2">{{ $galeries->links() }}</div>  
        </div>
      </div>
    </div>
  <div class="col-md-5">
    <form wire:submit.prevent='storeOrUpdateAlbum'>
      <div class="card card-primary card-outline">
          <div class="card-header">
              <h3 class="card-title">
                @if (!$isEditing)
                {{ __('Tambah Album Foto/Video') }}  
                @else
                {{ __('Update Album Foto/Video') }}  
                @endif
              </h3>
          </div>
          <div class="card-body p-0">
              <div class="mailbox-read-message">
                  <x-input title="Nama Album" name="title" />
                  <x-input title="Slug Album" name="slug" readonly />
                  <x-input-select title="Kategori" name="category" :defaultOptions="[['value' => 'foto', 'label' => 'Foto'], ['value' => 'video', 'label' => 'Video']]" />
                  <label for="body">{{ __('Deskripsikan Album') }}</label>
                  <textarea wire:model="body" name="body" class="form-control mb-3" cols="30" rows="10"></textarea>
                  @if ($category == 'foto')
                      <x-input title="Upload Gambar" name="images" type="file" multiple />
                  @elseif ($category == 'video')
                      <x-input title="Tautan Video YouTube" name="linkVideo" type="url" />
                  @else
                      <p>{{ __('Silahkan pilih kategori sebelum upload foto/menyalin tautan video') }}</p>
                  @endif
              </div>            
          </div>
          <div class="card-footer bg-white">
            @if ($category == 'foto')
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                  @if ($isEditing && empty($images))
                      @php
                          $decodedOldImages = json_decode($oldImages) ?? []; // Ensure it is an array even if oldImages is null
                      @endphp
                      @foreach ($decodedOldImages as $image)
                          <li>
                              <span class="mailbox-attachment-icon has-img"><img src="{{ asset('storage/' . $image) }}" alt="preview"></span>
                              <div class="mailbox-attachment-info">
                                  <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i></a>
                                  <span class="mailbox-attachment-size clearfix mt-1">
                                      <span>{{ number_format(\Illuminate\Support\Facades\Storage::size($image) / 1024, 2) }} KB</span>
                                      <button wire:click="removeImage({{ $loop->index }})" class="btn btn-default btn-sm float-right"><i class="fas fa-trash text-danger"></i></button>
                                  </span>
                              </div>
                          </li>  
                      @endforeach
                  @endif

                  @if (!empty($images))
                      @foreach ($images as $image)
                          <li>
                              <span class="mailbox-attachment-icon has-img"><img src="{{ $image->temporaryUrl() }}" alt="preview"></span>
                              <div class="mailbox-attachment-info">
                                  <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i></a>
                                  <span class="mailbox-attachment-size clearfix mt-1">
                                      <span>{{ number_format($image->getSize() / 1024, 2) }} KB</span>
                                      <button wire:click="removeImage({{ $loop->index }})" class="btn btn-default btn-sm float-right"><i class="fas fa-trash text-danger"></i></button>
                                  </span>
                              </div>
                          </li>
                      @endforeach
                  @endif
              </ul>
              @endif
          </div>
          <div class="card-footer text-right">
              <button type="submit" class="btn btn-success">{{ __('Simpan Album') }}</button>
          </div>
      </div>
  </form>  
  </div>
</div>