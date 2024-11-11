<div class="modal fade" id="update-material" tabindex="-1" role="dialog" aria-labelledby="update-material-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('materials.update', ['material' => ':id']) }}" id="form-update-material" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="update-material-label">Form Kategori</h5>
                    <button type="button" class="close" style="background: transparent;border: none;" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col">
                            <label>Nama</label>
                            <div id="title">
                                <input class="typeahead @error('update-title') is-invalid @enderror" type="text" name="update-title" id="update-title" value="{{ old('update-title') }}" placeholder="Tepung">
                                @error('update-title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label>Stok</label>
                            <div id="stock">
                                <input class="typeahead @error('update-stock') is-invalid @enderror" type="number" name="update-stock" id="update-stock" value="{{ old('update-stock') }}" placeholder="1000">
                                @error('update-stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label>Satuan</label>
                            <div id="unit">
                                <input class="typeahead @error('update-unit') is-invalid @enderror" type="text" name="update-unit" id="update-unit" value="{{ old('update-unit') }}" placeholder="Pcs">
                                @error('update-unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
