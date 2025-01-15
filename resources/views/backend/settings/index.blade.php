@extends('backend.layout.app')

@section('content')
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Ayarlar
                    </h4>
                </div>
                <div>
                    <button type="button" class="btn btn-tabler" data-bs-toggle="modal" data-bs-target="#settingModal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Yeni Ayar Ekle
                    </button>
                </div>
            </div>

            <div class="card-body">
                <!-- Tab Menu -->
                <ul class="nav nav-tabs mb-3" id="settings-tab" role="tablist">
                    @foreach($Tab as $type)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" 
                               id="tab-{{$type->isType}}" 
                               data-bs-toggle="tab" 
                               href="#content-{{$type->isType}}" 
                               role="tab">{{$type->isType}}</a>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab Contents -->
                <div class="tab-content">
                    @foreach($Tab as $type)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                             id="content-{{$type->isType}}" 
                             role="tabpanel">
                            
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Anahtar</th>
                                            <th>Değer</th>
                                            <th class="w-1">İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($All->where('isType', $type->isType) as $item)
                                            {{Form::model($item, ["route" => ["settings.update", $item->id], 
                                                'enctype' => 'multipart/form-data', 
                                                'class' => 'setting-form'])}}
                                            @method('PUT')
                                            <tr>
                                                <td style="width: 20%">
                                                    <div class="font-weight-medium">{{ $item->item }}</div>
                                                </td>
                                                <td>
                                                    @if($item->isImage == 1)
                                                        <div class="mb-2">
                                                            <input type="file" class="form-control" name="image" accept="image/*">
                                                        </div>
                                                        @if($item->value)
                                                            <div class="d-flex align-items-center mt-2">
                                                                <img src="{{ asset($item->value) }}" class="img-thumbnail" style="height: 50px; width: auto;">
                                                            </div>
                                                        @endif
                                                    @else
                                                        <input type="text" class="form-control" name="value" value="{{ $item->value }}">
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-tabler btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="10" y1="14" x2="21" y2="3"></line><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5"></path></svg>
                                                        Kaydet
                                                    </button>
                                                </td>
                                            </tr>
                                            {{Form::close()}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="settingModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data" id="settingForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Yeni Ayar Ekle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Ayar Anahtarı -->
                        <div class="mb-3">
                            <label class="form-label">Ayar Anahtarı</label>
                            <input type="text" name="item" class="form-control" required>
                        </div>

                        <!-- Kategori Seçimi -->
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="isType" class="form-select" id="categorySelect">
                                <option value="">Kategori Seçin</option>
                                @foreach($Tab as $type)
                                    <option value="{{ $type->isType }}">{{ $type->isType }}</option>
                                @endforeach
                                <option value="new">Yeni Kategori Ekle</option>
                            </select>
                        </div>

                        <!-- Yeni Kategori Input -->
                        <div class="mb-3" id="newTypeDiv" style="display: none;">
                            <label class="form-label">Yeni Kategori Adı</label>
                            <input type="text" name="new_type" class="form-control" placeholder="Yeni kategori adını giriniz">
                        </div>

                        <!-- Tip Seçimi -->
                        <div class="mb-3">
                            <label class="form-label">Tip</label>
                            <select name="isImage" class="form-select" required>
                                <option value="0">Metin</option>
                                <option value="1">Resim</option>
                            </select>
                        </div>

                        <!-- Değer -->
                        <div class="mb-3">
                            <label class="form-label">Değer</label>
                            <input type="text" name="value" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal elementi
        var modal = document.getElementById('settingModal');
        
        // Modal yüklendiğinde
        modal.addEventListener('shown.bs.modal', function () {
            initializeModal();
        });

        // Kategori değişikliğini dinle
        document.getElementById('categorySelect').addEventListener('change', function() {
            var newTypeDiv = document.getElementById('newTypeDiv');
            
            console.log('Kategori değişti:', this.value); // Debug log
            
            if(this.value === 'new') {
                newTypeDiv.style.display = 'block';
                newTypeDiv.querySelector('input').focus();
            } else {
                newTypeDiv.style.display = 'none';
            }
        });

        // Form reset
        modal.addEventListener('hidden.bs.modal', function () {
            document.getElementById('settingForm').reset();
            document.getElementById('newTypeDiv').style.display = 'none';
        });
    });

    function initializeModal() {
        console.log('Modal initialized'); // Debug log
        var categorySelect = document.getElementById('categorySelect');
        categorySelect.selectedIndex = 0;
        document.getElementById('newTypeDiv').style.display = 'none';
    }
</script>
@endpush
@endsection
