@extends('layouts.guest')
@section('content')
    <div class="container my-5">
      <div class="row">
        <div class="col-8 mx-auto">
          <h1>Users - {{ $user->title . ' '. $user->given_name .  ' ' . $user->family_name }}</h1>
          <a href="{{ route('profile.edit') }}" class="rounded bg-orange border-0 text-decoration-none text-white px-5 py-1">Edit</a>
        </div>
      </div>

      <div class="row mt-5 mb-2">
        <div class="col-8 mx-auto bg-light rounded p-3">
            <!-- Tabs -->
            <ul class="nav nav-tabs d-flex align-items-center justify-content-center mb-3" id="tabContent" role="tablist">
              <li class="nav-item w-50" role="presentation">
                  <button class="nav-link active w-100 text-center" id="file-tab" data-bs-toggle="tab" data-bs-target="#file" type="button" role="tab" aria-controls="file" aria-selected="true">
                      Details
                  </button>
              </li>
              <li class="nav-item w-50" role="presentation">
                  <button class="nav-link w-100 text-center" id="url-tab" data-bs-toggle="tab" data-bs-target="#url" type="button" role="tab" aria-controls="url" aria-selected="false">
                      History
                  </button>
              </li>
          </ul>

          <!-- Tab Content -->
          <div class="tab-content" id="tabContent">
              <!-- File Input -->
              <div class="tab-pane fade show active" id="file" role="tabpanel" aria-labelledby="file-tab">
                <div class="bg-secondary text-white p-2 d-flex align-items-center justify-content-between">
                 <p class="mb-0">Profile</p>
                 <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit</a>
                </div>  
                
                <div class="mb-1 row">
                    <label for="name" class="col-sm-2 col-form-label text-primary">Name:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="name" value="{{ $user->name }}">
                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="email" class="col-sm-2 col-form-label text-primary">Email address:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="email" value="{{ $user->email }}">
                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="department" class="col-sm-2 col-form-label text-primary">Department:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="department" value="{{ $user->department ? $user->department : '-' }}">
                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="organization" class="col-sm-2 col-form-label text-primary">Organization:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="organization" value="{{ $user->organization ? $user->organization : '-' }}">
                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="address" class="col-sm-2 col-form-label text-primary">Address:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="address" value="{{ $user->address ? $user->address : '-' }}">
                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="country" class="col-sm-2 col-form-label text-primary">Country:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="country" value="{{ $user->country ? $user->country : '-' }}">
                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="hideemail" class="col-sm-2 col-form-label text-primary">Hide Email:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="hideemail" value="{{ $user->hide_email ? $user->hide_email : '-' }}">
                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="homepage" class="col-sm-2 col-form-label text-primary">Homepage URL:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="homepage" value="{{ $user->homepage_url ? $user->homepage_url : '-' }}">
                    </div>
                  </div>

                  <hr class="mt-2 mb-3" />

                  <div class="bg-secondary text-white p-2">
                    Other defined fields
                  </div>

                  <div class="mb-1 row">
                    <label for="userid" class="col-sm-2 col-form-label text-black fw-bold">User ID Number:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="userid" value="{{ $user->id }}">
                    </div>
                  </div>
               
                  <div class="mb-1 row">
                    <label for="username" class="col-sm-2 col-form-label text-black fw-bold">Username:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="username" value="-">
                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="usertype" class="col-sm-2 col-form-label text-black fw-bold">User Type:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="usertype" value="{{ $user->role }}">
                    </div>
                  </div>

                  
              </div>

              <!-- URL Input -->
              <div class="tab-pane fade" id="url" role="tabpanel" aria-labelledby="url-tab">
                <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Aktivitas</th>
                          <th scope="col">Waktu</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse($activities as $index => $activity)
                          <tr>
                              <th scope="row">{{ $index + 1 }}</th> <!-- Menampilkan nomor urut -->
                              <td>{{ $activity->description }}</td> <!-- Menampilkan deskripsi aktivitas -->
                              <td>{{ $activity->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i:s') }}</td> <!-- Menampilkan waktu aktivitas -->

                          </tr>
                      @empty
                          <tr>
                              <td colspan="3">Tidak ada aktivitas yang ditemukan.</td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
          
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection