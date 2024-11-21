@extends('layouts.guest')
@section('content')
   <div class="container my-5">
      {{-- <a href="{{ route('login') }}" class="bg-coklat text-decoration-none rounded text-light px-4 py-2 border-0">Login</a> --}}
      <div class="row justify-content-center my-3">
         <div class="col-10 col-md-8">
            <div class="text-center">
               <h1>Advanced Search</h1>
               <p>Don't panic! Just leave the fields you don't want to search blank. Otherwise, why not try a <span><a href="{{ route('browse') }}">simple search</a></span>.</p>
            </div>

            <div class="my-3">
              <form action="{{ route('advanced-search') }}" method="get">
                <!-- Documents -->
                <div class="mb-3 row">
                  <label for="documents" class="col-sm-2 col-form-label fw-bold">Documents</label>
                  <div class="col-sm-3">
                    <select class="form-select" name="documents_operator">
                      <option selected value="all-of">All of</option>
                      <option value="any-of">Any of</option>
                    </select>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="documents" name="documents">
                  </div>
                </div>

                <!-- Title -->
                <div class="mb-3 row">
                  <label for="title" class="col-sm-2 col-form-label fw-bold">Title</label>
                  <div class="col-sm-3">
                    <select class="form-select" name="title_operator">
                      <option selected value="all-of">All of</option>
                      <option value="any-of">Any of</option>
                    </select>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>

                <!-- Creators -->
                <div class="mb-3 row">
                  <label for="creators" class="col-sm-2 col-form-label fw-bold">Creators</label>
                  <div class="col-sm-3">
                    <select class="form-select" name="creators_operator">
                      <option selected value="all-of">All of</option>
                      <option value="any-of">Any of</option>
                    </select>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="creators" name="creators">
                  </div>
                </div>

                <!-- Abstract -->
                <div class="mb-3 row">
                  <label for="abstract" class="col-sm-2 col-form-label fw-bold">Abstract</label>
                  <div class="col-sm-3">
                    <select class="form-select" name="abstract_operator">
                      <option selected value="all-of">All of</option>
                      <option value="any-of">Any of</option>
                    </select>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="abstract" name="abstract">
                  </div>
                </div>

                <!-- Date -->
                <div class="mb-3 row">
                  <label for="date" class="col-sm-2 col-form-label fw-bold">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="date" name="publication_date">
                  </div>
                </div>

                <!-- Keywords -->
                <div class="mb-3 row">
                  <label for="keywords" class="col-sm-2 col-form-label fw-bold">Keywords</label>
                  <div class="col-sm-3">
                    <select class="form-select" name="keywords_operator">
                      <option selected value="all-of">All of</option>
                      <option value="any-of">Any of</option>
                    </select>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="keywords" name="keywords" >
                  </div>
                </div>

             <!-- Subjects -->
             <div class="mb-3 row">
                <label for="subject" class="col-sm-2 col-form-label fw-bold">Subject</label>
                <div class="col-sm-10">
                    <select class="form-select" multiple name="subject[]">
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
          

                <!-- Item Type -->
                <div class="mb-3 row">
                  <label for="item-type" class="col-sm-2 col-form-label fw-bold fs-4">Item Type</label>
                  <div class="col-sm-10">
                    <div class="bg-white rounded p-2">
                      @foreach($documentsType as $item)
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="{{ $item->id }}" name="item_type[]">
                          <label class="form-check-label" for="{{ $item->id }}">{{ $item->name }}</label>
                        </div>
               
                      @endforeach
                    </div>
                  </div>
                </div>

                <!-- Department -->
                <div class="mb-3 row">
                  <label for="department" class="col-sm-2 col-form-label fw-bold">Department</label>
                  <div class="col-sm-10">
                    <div class="bg-white rounded p-2">

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="geologiKelautan" name="department[]" value="Survei dan Pemetaan Sumber Daya Geologi Kelautan">
                        <label class="form-check-label" for="geologiKelautan">
                          Survei dan Pemetaan Sumber Daya Geologi Kelautan
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mitigasiKebencanaan" name="department[]" value="Survei dan Pemetaan Mitigasi Kebencanaan Kewilayahan Kelautan">
                        <label class="form-check-label" for="mitigasiKebencanaan">
                          Survei dan Pemetaan Mitigasi Kebencanaan Kewilayahan Kelautan
                        </label>
                      </div>
                      
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="other-type" name="department[]" value="Other">
                        <label class="form-check-label" for="other-type">
                          Other
                        </label>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>

                <!-- Editors -->
                <div class="mb-3 row">
                  <label for="keywords" class="col-sm-2 col-form-label fw-bold">Editors</label>
                  <div class="col-sm-3">
                    <select class="form-select" name="editos_operator">
                      <option selected value="all-of">All of</option>
                      <option value="any-of">Any of</option>
                    </select>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="editors" name="editors" >
                  </div>
                </div>

                <!-- Status -->
                <div class="mb-3 row">
                  <label for="status" class="col-sm-2 col-form-label fw-bold">Status</label>
                  <div class="col-sm-10">
                    <div class="bg-white rounded p-2">

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="published" name="status[]" value="published">
                        <label class="form-check-label" for="published">
                          Published
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="in-press" name="status[]" value="in press">
                        <label class="form-check-label" for="in-press">
                          In Press
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="submitted" name="status[]" value="submitted">
                        <label class="form-check-label" for="submitted">
                          Submitted
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="unpublished" name="status[]" value="unpublished">
                        <label class="form-check-label" for="unpublished">
                          Unpublished
                        </label>
                      </div>

                    </div>
                    
                  </div>
                </div>


                <div class="d-flex align-items-center justify-content-center gap-5">
                  <button type="submit" class="bg-orange rounded text-light px-4 py-2 border-0">Search</button>
                  <button type="reset" class="bg-orange rounded text-light px-4 py-2 border-0">Reset the Form</button>
                </div>
              </form>
            </div>
         </div>
      </div>
   </div>
@endsection
