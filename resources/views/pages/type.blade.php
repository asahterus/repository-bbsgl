@extends('layouts.guest')
@section('content')
    <div class="container my-5">
      <div class="stepper">
        <!-- Step 1 -->
        <button type="button" class="btn btn-primary">Type</button>
        <div class="step-line"></div>
        <!-- Step 2 -->
        <button type="button" class="btn btn-light border">Upload</button>
        <div class="step-line"></div>
        <!-- Step 3 -->
        <button type="button" class="btn btn-light border">Details</button>
        <div class="step-line"></div>
      
        <button type="button" class="btn btn-light border">Subjects</button>
        <div class="step-line"></div>
      
        <button type="button" class="btn btn-light border">Deposit</button>
        {{-- <div class="step-line"></div> --}}
      </div>

      <div class="direction-btn d-flex align-items-center justify-content-center my-5 gap-5">
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
            <p class="mb-0">Item Type</p>
            <p  class="mb-0">?</p>
          </div>
          <div class="card-body">

            <form id="itemTypeForm" action="{{ route('storeType') }}" method="POST">
              @csrf
              @foreach ($types as $type)
                  <div class="form-check my-3">
                      <input 
                        class="form-check-input" 
                        type="radio" 
                        name="typeRadio" 
                        id="typeRadio{{ $loop->index }}" 
                        value="{{ $type }}">
                      <label 
                        class="form-check-label fw-bold" 
                        for="typeRadio{{ $loop->index }}">
                        {{ $type }}
                      </label>
                  </div>
              @endforeach
              {{-- <button type="submit" class="btn btn-primary">Next ></button> --}}
          </form>
          

            {{-- @foreach ($types as $type)
              <div class="form-check my-3">
                <input 
                  class="form-check-input" 
                  type="radio" 
                  name="typeRadio" 
                  id="typeRadio{{ $loop->index }}" 
                  value="{{ $type }}"
                >
                <label 
                  class="form-check-label fw-bold" 
                  for="typeRadio{{ $loop->index }}"
                >
                  {{ $type }}
                </label>
              </div>
            @endforeach --}}
          
          </div>
        </div>
      </div>
    </div>

@endsection

@push('scripts')
    <script>
      $('#nextButton').click(function(e) {
        document.getElementById('itemTypeForm').submit();
      })
    </script>
@endpush

