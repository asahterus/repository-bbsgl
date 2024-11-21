@extends('layouts.guest')
@section('content')
<div class="container my-5">
  <div class="stepper">
    <!-- Step 1 -->
    <button type="button" class="btn btn-light border">Type</button>
    <div class="step-line"></div>
    <!-- Step 2 -->
    <button type="button" class="btn btn-light border">Upload</button>
    <div class="step-line"></div>
    <!-- Step 3 -->
    <button type="button" class="btn btn-light border">Details</button>
    <div class="step-line"></div>
    <!-- Step 4 -->
    <button type="button" class="btn btn-primary">Subjects</button>
    <div class="step-line"></div>
    <button type="button" class="btn btn-light border">Deposit</button>
  </div>

  <div class="direction-btn d-flex align-items-center justify-content-center my-5 gap-5">
    <a href="{{ route('upload.details') }}" class="text-decoration-none bg-warning rounded border-0 text-white p-2" style="width: 150px">
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

  {{-- Item Type --}}
  <div id="item-type" class="rounded rounded p-3 mx-5">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between mb-0">
        <p class="mb-0">Subjects</p>
        <p class="mb-0">?</p>
      </div>
      <div class="card-body">
        <form id="subjectForm" action="{{ route('storeSubject') }}" method="post">
          @csrf
          @foreach ($subjects as $subject)
          <div class="form-check">
              <input class="form-check-input" type="radio" name="subjects" value="{{ $subject->id }}" id="blu-subject-{{ $subject->id }}">
              <label class="form-check-label" for="blu-subject-{{ $subject->id }}">
                  {{ $subject->name }}
              </label>
          </div>
          @endforeach

        </form>
       
        
      </div>
    </div>
  </div>
</div>

{{-- End of content section --}}
@endsection

@push('scripts')
  <script>
       $('#nextButton').click(function(e) {
        document.getElementById('subjectForm').submit();
      })
  </script>
    
@endpush