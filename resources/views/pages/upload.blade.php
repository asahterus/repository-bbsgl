@extends('layouts.guest')
@section('content')
    <div class="container my-5">
        <div class="stepper">
            <!-- Step 1 -->
            <button type="button" class="btn btn-light border">Type</button>
            <div class="step-line"></div>
            <!-- Step 2 -->
            <button type="button" class="btn btn-primary">Upload</button>
            <div class="step-line"></div>
            <!-- Step 3 -->
            <button type="button" class="btn btn-light border">Details</button>
            <div class="step-line"></div>

            <button type="button" class="btn btn-light border">Subjects</button>
            <div class="step-line"></div>

            <button type="button" class="btn btn-light border">Deposit</button>
        </div>


        <div class="direction-btn d-flex align-items-center justify-content-center my-5 gap-5">
            <a href="{{ route('upload.type') }}" class="text-decoration-none bg-warning rounded border-0 text-white p-2" style="width: 150px">
                < Previous
            </a>

            <button class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
                Save and Return
            </button>

            <button class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
                Cancel
            </button>

            <button id="nextButton" class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
                Next >
            </button>
        </div>

        <div id="upload" class="rounded p-3 mx-5">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between mb-0">
                    <p class="mb-0 fw-bold">Add a new document</p>
                </div>
                <div class="card-body">
                    <!-- Form untuk upload file atau URL -->
                    <form id="uploadForm" action="{{ route('storeUpload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Tabs -->
                        <ul class="nav nav-tabs d-flex align-items-center justify-content-center mb-3" id="tabContent" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link active w-100 text-center" id="file-tab" data-bs-toggle="tab" data-bs-target="#file" type="button" role="tab" aria-controls="file" aria-selected="true">
                                    File
                                </button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link w-100 text-center" id="url-tab" data-bs-toggle="tab" data-bs-target="#url" type="button" role="tab" aria-controls="url" aria-selected="false">
                                    From URL
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content" id="tabContent">
                            <!-- File Input -->
                            <div class="tab-pane fade show active" id="file" role="tabpanel" aria-labelledby="file-tab">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload File</label>
                                    <input class="form-control" type="file" id="formFile" name="file">
                                </div>
                            </div>

                            <!-- URL Input -->
                            <div class="tab-pane fade" id="url" role="tabpanel" aria-labelledby="url-tab">
                                <div class="mb-3">
                                    <label for="formURL" class="form-label">Enter URL</label>
                                    <input type="url" class="form-control" id="formURL" name="url" placeholder="https://example.com">
                                </div>
                            </div>
                        </div>

                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
      $('#nextButton').click(function(e) {
        document.getElementById('uploadForm').submit();
      })
    </script>
@endpush
