<div class="modal fade" id="update-payment" tabindex="-1" role="dialog" aria-labelledby="update-payment-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('payments.update', ['payment' => ':id']) }}" id="form-update-payment" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="update-payment-label">Form Metode Pembayaran</h5>
                    <button type="button" class="close" style="background: transparent;border: none;" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col">
                            <label>Nama</label>
                            <div id="title">
                                <input class="typeahead @error('update_title') is-invalid @enderror" type="text" name="update_title" id="update-title" value="{{ old('update_title') }}" placeholder="Bank ABC">
                                @error('update_title')
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
