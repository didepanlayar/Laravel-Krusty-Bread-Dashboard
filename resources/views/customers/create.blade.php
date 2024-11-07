    <div class="modal fade" id="create-customer" tabindex="-1" role="dialog" aria-labelledby="create-customer-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="create-customer-label">Form Data Pelanggan</h5>
                        <button type="button" class="close" style="background: transparent;border: none;" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col">
                                <label>Nama Lengkap</label>
                                <div id="name">
                                    <input class="typeahead @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="John Doe">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label>WhatsApp</label>
                                <div id="phone">
                                    <input class="typeahead @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="08123456789">
                                    @error('phone')
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
