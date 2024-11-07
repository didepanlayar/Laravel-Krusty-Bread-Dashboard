    <div class="modal fade" id="update-user" tabindex="-1" role="dialog" aria-labelledby="update-user-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('users.update', ['user' => ':id']) }}" id="form-update-user" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="update-user-label">Form Data Karyawan</h5>
                        <button type="button" class="close" style="background: transparent;border: none;" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col">
                                <label>Nama Lengkap</label>
                                <div id="name">
                                    <input class="typeahead @error('update_name') is-invalid @enderror" type="text" name="update_name" id="update-name" value="{{ old('update_name') }}" placeholder="John Doe">
                                    @error('update_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label>Username</label>
                                <div id="username">
                                    <input class="typeahead @error('update_username') is-invalid @enderror" type="text" name="update_username" id="update-username" value="{{ old('update_username') }}" placeholder="johndoe">
                                    @error('update_username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Email</label>
                                <div id="email">
                                    <input class="typeahead @error('update_email') is-invalid @enderror" type="text" name="update_email" id="update-email" value="{{ old('update_email') }}" placeholder="johndoe@email.com" disabled>
                                    @error('update_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label>WhatsApp</label>
                                <div id="phone">
                                    <input class="typeahead @error('update_phone') is-invalid @enderror" type="text" name="update_phone" id="update-phone" value="{{ old('update_phone') }}" placeholder="08123456789">
                                    @error('update_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Peran</label>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input @error('update_roles') is-invalid @enderror" {{ old('update_roles') == 'Owner' ? 'checked' : '' }} name="update_roles" id="role-owner" value="Owner"> Pemilik
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input @error('update_roles') is-invalid @enderror" {{ old('update_roles') == 'Staff' ? 'checked' : '' }} name="update_roles" id="role-staff" value="Staff"> Staf
                                    </label>
                                </div>
                            </div>
                            @error('update_roles')
                                <span class="invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
