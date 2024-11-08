<div class="modal fade" id="update-sales" tabindex="-1" role="dialog" aria-labelledby="update-sales-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('sales-type.update', ['sales_type' => ':id']) }}" id="form-update-sales" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="update-sales-label">Form Jenis Pelanggan</h5>
                    <button type="button" class="close" style="background: transparent;border: none;" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col">
                            <label>Nama</label>
                            <div id="title">
                                <input class="typeahead @error('update_title') is-invalid @enderror" type="text" name="update_title" id="update-title" value="{{ old('update_title') }}" placeholder="Offline Store">
                                @error('update_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label>Komisi (%)</label>
                            <div id="commission">
                                <input class="typeahead @error('update_commission') is-invalid @enderror" type="number" name="update_commission" id="update-commission" value="{{ old('update_commission') }}" placeholder="1-100">
                                @error('update_commission')
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
