@extends('layouts.guest')
@section('content')
    <div class="container my-5">
      <div class="row">
        <div class="col-8 mx-auto">
          <h1>Edit</h1>

          <form method="POST" action="#">
            @csrf
            @method('PUT')

            <div class="direction-btn d-flex align-items-center justify-content-center gap-5">
              <a href="{{ route('profile') }}" class="bg-warning rounded border-0 text-white p-2 text-center text-decoration-none" style="width: 150px">Cancel</a>
              <button id="save-btn" class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
                  Save and Return
              </button>
            </div>

            <div class="row mt-5 mb-2">
              <div class="col-8 mx-auto">
                <div class="card mb-3">
                  <div class="card-header">
                    Personal Details
                  </div>
                  <div class="card-body">
                    <div class="mb-2 row">
                      <label for="email" class="col-sm-2 col-form-label text-primary">Email address:</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}">
                      </div>
                    </div>

                    <div class="mb-2 row">
                      <label for="hide_email" class="col-sm-2 col-form-label text-primary">Hide Email:</label>
                      <div class="col-sm-10">
                        <div class="d-flex flex-column">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="hide_email" id="visible" value="Make email visible to all"
                              {{ old('hide_email', $user->hide_email ?? '') == 'Make email visible to all' ? 'checked' : '' }}>
                            <label class="form-check-label" for="visible">
                              Make email visible to all
                            </label>
                          </div>
                    
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="hide_email" id="hide" value="Hide email to all except repository administration"
                              {{ old('hide_email', $user->hide_email ?? '') == 'Hide email to all except repository administration' ? 'checked' : '' }}>
                            <label class="form-check-label" for="hide">
                              Hide email to all except repository administration
                            </label>
                          </div>
                    
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="hide_email" id="unspecified" value="UNSPECIFIED"
                              {{ old('hide_email', $user->hide_email ?? '') == 'UNSPECIFIED' ? 'checked' : '' }}>
                            <label class="form-check-label" for="unspecified">
                              UNSPECIFIED
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="mb-2 row">
                      <label for="password" class="col-sm-2 col-form-label text-primary">Password:</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    Account Details
                  </div>
                  <div class="card-body">
                    <div class="mb-2 row">
                      <label for="title" class="col-sm-2 col-form-label text-primary">Title:</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <!-- Title Input -->
                          <div class="col-md-2">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $user->title ?? '-' }}">
                          </div>
                          
                          <!-- Given Name Input -->
                          <div class="col-md-5">
                            <input type="text" class="form-control" id="given_name" name="given_name" placeholder="Given Name" value="{{ $user->given_name ?? '-' }}">
                          </div>
                          
                          <!-- Family Name Input -->
                          <div class="col-md-5">
                            <input type="text" class="form-control" id="family_name" name="family_name" placeholder="Family Name" value="{{ $user->family_name ?? '-' }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="mb-2 row">
                      <label for="department" class="col-sm-2 col-form-label text-primary">Department:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="department" name="department" value="{{ $user->department ?? '-' }}">
                      </div>
                    </div>

                    <div class="mb-2 row">
                      <label for="organization" class="col-sm-2 col-form-label text-primary">Organization:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="organization" name="organization" value="{{ $user->organization ?? '-' }}">
                      </div>
                    </div>

                    <div class="mb-2 row">
                      <label for="address" class="col-sm-2 col-form-label text-primary">Address:</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="address" name="address" rows="3">{{ $user->address ?? '-' }}</textarea>
                      </div>
                    </div>

                    <div class="mb-2 row">
                      <label for="country" class="col-sm-2 col-form-label text-primary">Country:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="country" name="country" value="{{ $user->country ?? '-' }}">
                      </div>
                    </div>

                    <div class="mb-2 row">
                      <label for="homepage" class="col-sm-2 col-form-label text-primary">Homepage URL:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="homepage" name="homepage_url" value="{{ $user->homepage_url ?? '-' }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@push('scripts')

<script>
  $(document).ready(function() {

    let isSubmitting  =false;

    $('#save-btn').click(function(e) {
      e.preventDefault();
      
      if (isSubmitting) return;
      isSubmitting = true; 

      swal({
        title: "Apakah kamu yakin?",
        text: "Data yang diubah tidak dapat dikembalikan kembali",
        icon: 'warning',
        dangerMode: true,
        buttons: ["Tidak", "Ya!"],
      }).then((willUpdate) => {
        if (willUpdate) {
 
          let formData = {
            email: $('#email').val(),
            password: $('#password').val(),
            hide_email: $('input[name="hide_email"]:checked').val(),
            title: $('#title').val(),
            given_name: $('#given_name').val(),
            family_name: $('#family_name').val(),
            department: $('#department').val(),
            organization: $('#organization').val(),
            address: $('#address').val(),
            country: $('#country').val(),
            homepage_url: $('#homepage').val(),
            _token: '{{ csrf_token() }}' // Include CSRF token
          };

          // Send AJAX request to the controller
          $.ajax({
            url: '{{ route("profile.update", $user->id) }}',
            method: 'PUT',
            data: formData,
            success: function(response) {
              swal("Success!", response.message, "success").then(() => {
                window.location.href = '{{ route("profile") }}';
              });
            },
            error: function(xhr) {
              let errors = xhr.responseJSON.errors;
              let errorMessages = '';
              $.each(errors, function(key, value) {
                errorMessages += value[0] + '\n';
              });
              swal("Error!", errorMessages, "error");
            },
            complete: function() {
              isSubmitting = false;
            }
          });
        }
      });
    });
  });
</script>

@endpush
