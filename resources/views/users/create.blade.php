    <div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="create-user-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="create-user-label">Form Data Karyawan</h5>
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
                                <label>Username</label>
                                <div id="username">
                                    <input class="typeahead @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username') }}" placeholder="johndoe">
                                    @error('username')
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
                                    <input class="typeahead @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="johndoe@email.com">
                                    @error('email')
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
                        <div class="form-group row">
                            <label>Peran</label>
                            <div class="col-md-3">
                                <div id="owner">
                                    <div class="form-check">
                                        <label class="form-check-label"><input type="radio" class="form-check-input @error('roles') is-invalid @enderror" {{ old('roles') == 'Owner' ? 'checked' : '' }} name="roles" id="owner" value="Owner"> Pemilik </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div id="staff">
                                    <div class="form-check">
                                        <label class="form-check-label"><input type="radio" class="form-check-input @error('roles') is-invalid @enderror" {{ old('roles') == 'Staff' ? 'checked' : '' }} name="roles" id="staff" value="Staff"> Staf </label>
                                    </div>
                                </div>
                            </div>
                            @error('roles')
                                <span class="invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Password</label>
                                <div id="password">
                                    <input class="typeahead @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="*******">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label>Konfirmasi Password</label>
                                <div id="password-confirmation">
                                    <input class="typeahead @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation" placeholder="********">
                                    @error('password_confirmation')
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
