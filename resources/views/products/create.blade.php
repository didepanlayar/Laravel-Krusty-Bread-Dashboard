@extends('layouts.global')

@section('title') Tambah Produk @endsection

@section('content')
<div class="content-wrapper">
    <!-- title -->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Tambah Produk</h3>
                    <h6 class="font-weight-normal mb-0">Produk adalah barang atau jasa yang akan dijual.</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- title -->

    <!-- form -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Produk</h4>
                    <p class="card-description"> Lengkapi data produk. </p>
                    <ul class="nav nav-underline" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link nav-tab active" id="product-tab" data-bs-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="true">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-tab" id="material-tab" data-bs-toggle="tab" href="#material" role="tab" aria-controls="material" aria-selected="false">Komposisi</a>
                        </li>
                    </ul>
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="form-mode" value="create">
                        <div class="tab-content">
                            <!-- form-product -->
                            <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Foto Produk</label>
                                        <input class="typeahead @error('picture') is-invalid @enderror" type="file" name="picture" id="picture">
                                        @error('picture')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Nama Produk</label>
                                        <input class="typeahead @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Masukan Nama Produk">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Deskripsi Produk</label>
                                        <textarea class="typeahead" name="description" id="description" placeholder="Masukan Deskripsi Produk">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Kategori Produk</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category-id">
                                            <option value="">Pilih Kategori</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Harga Produk</label>
                                        <input class="typeahead @error('default_price') is-invalid @enderror" type="number" name="default_price" id="default-price" value="{{ old('default_price') }}" placeholder="Masukan Harga Produk" min="0" step="any">
                                        @error('default_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="d-grid gap-2 mt-2 mb-2">
                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#form-sales"><i class="ti-shopping-cart"></i> Jenis Penjualan </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label>Status Produk</label>
                                        <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                            <option value="">Pilih Status</option>
                                            <option value="Available">Tersedia</option>
                                            <option value="Sold">Habis</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            </div>
                            <!-- form-product -->
                            
                            <!-- form-material -->
                            <div class="tab-pane fade" id="material" role="tabpanel" aria-labelledby="material-tab">
                                <div class="form-group row mb-2">
                                    <div class="col">
                                        <label for="material-selector">Pilih Bahan</label>
                                        <select class="form-select" id="material-selector">
                                            <option value="">Pilih Bahan</option>
                                            @foreach($materials as $material)
                                                <option value="{{ $material->id }}" data-title="{{ $material->title }}" data-stock="{{ $material->stock }}" data-unit="{{ $material->unit }}">{{ $material->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-primary mt-4" id="add-material">Tambah Bahan</button>
                                    </div>
                                </div>
                            
                                <!-- table-material -->
                                <div class="table-responsive">
                                    <table class="table" id="selected-materials-table">
                                        <thead>
                                            <tr>
                                                <th>Nama Bahan</th>
                                                <th>Stok</th>
                                                <th>Unit</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- data-material -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- table-material -->
                            </div>
                            <!-- form-material -->
                        </div>
                        <!-- modal-from-sales -->
                        <div class="modal fade" id="form-sales" tabindex="-1" role="dialog" aria-labelledby="form-sales-label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="form-sales-label">Jenis Penjualan</h5>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">Simpan</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($sales_types as $sales)
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label>{{ $sales->title }}</label>
                                                    <input class="typeahead" type="number" name="prices[{{ $sales->id }}]" value="{{ old('prices[' . $sales->id . ']') }}" placeholder="Masukan Harga {{ $sales->title }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <!-- modal-from-sales -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- form -->
</div>
@endsection

@section('scripts')
    <script src="{{ asset('dashboard/assets/js/products.js') }}"></script>
@endsection
