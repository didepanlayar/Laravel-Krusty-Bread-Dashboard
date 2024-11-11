<div class="modal fade" id="create-material" tabindex="-1" role="dialog" aria-labelledby="create-material-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('materials.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="create-material-label">Form Stok</h5>
                    <button type="button" class="close" style="background: transparent;border: none;" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col">
                            <label>Nama</label>
                            <div id="title">
                                <input class="typeahead @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Tepung">
                                @error('title')
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
                                <input class="typeahead @error('stock') is-invalid @enderror" type="number" name="stock" id="stock" value="{{ old('stock') }}" placeholder="1000">
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label>Satuan</label>
                            <div id="unit">
                                <input class="typeahead @error('unit') is-invalid @enderror" type="text" name="unit" id="unit" value="{{ old('unit') }}" placeholder="Pcs">
                                @error('unit')
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
