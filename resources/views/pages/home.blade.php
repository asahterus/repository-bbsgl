@extends('layouts.guest')
@section('content')
   <div class="container my-5">
    
      <div class="row justify-content-center my-3">
         <div class="col-12 col-md-8 col-lg-6">
            <div class="text-center">
               <h1>Welcome to BBSPGL Repository</h1>
            </div>

            <div class="my-5">
              <p class="text-center">Search BBSPGL Repository</p>
              <form action="{{ route('browse.simple') }}" method="GET">
                <div class="d-flex flex-column flex-md-row gap-2">
                  <input name="query" class="form-control" type="text" placeholder="Search.." aria-label="Search input example">
                  <button type="submit" class="bg-warning text-white rounded border-0">Search</button>
                  <a href="{{ route('search')}}" class="btn btn-dark border border-none bg-orange text-nowrap">Advanced Search</a>
                </div>
              </form>
            </div>

            <div class="my-4">
              <p class="text-center">Browse BBSPGL Repository</p>
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="d-flex justify-content-center align-items-center flex-wrap gap-4">
                    <div class="d-flex flex-column align-items-center text-center">
                      <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                      <a href="{{ route('browse.year') }}" class="text-black text-decoration-none">
                        Year
                      </a>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                      <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                      <a href="{{ route('browse.subject') }}" class="text-black text-decoration-none">
                        Subjects
                      </a>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                      <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                      <a href="{{ route('browse.division') }}" class="text-black text-decoration-none">
                        Divisions
                      </a>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                      <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                      <a href="{{route('browse.author')}}" class="text-black text-decoration-none">
                        Authors
                      </a>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                      <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                      <a href="{{ route('browse.contributor') }}" class="text-black text-decoration-none">
                        Contributors
                      </a>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                      <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                      <a href="{{ route('browse.document.type') }}" class="text-black text-decoration-none">
                        Type
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
      </div>
   </div>
@stop
