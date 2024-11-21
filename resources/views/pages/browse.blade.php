@extends('layouts.guest')
@section('content')
   <div class="container my-5">
      <div class="row justify-content-center my-3">
         <div class="col-10 col-md-4 mx-auto">
            <div class="text-center">
               <h1>Browse Items</h1>
            </div>

            <div class="rounded border border-warning p-3 my-2 text-center mx-auto">
              <p>
                Items may be browsed by the following:
              </p>
              <ul class="text-center mx-auto list-unstyled">
                <li class="">
                  <a class="text-decoration-none" href="{{ route('browse.year') }}">Year</a>
                </li>
                <li class="">
                  <a class="text-decoration-none" href="{{route('browse.subject')}}">Subject</a>
                </li>
                <li class="">
                  <a class="text-decoration-none" href="{{ route('browse.division')}}">Divisions</a>
                </li>
                <li class="">
                  <a class="text-decoration-none" href="{{ route('browse.author') }}">Authors</a>
                </li>
                <li class="">
                  <a class="text-decoration-none" href="{{route('browse.contributor')}}">Contributors</a>
                </li>
                <li class="">
                  <a class="text-decoration-none" href="{{route('browse.document.type')}}">Document Type</a>
                </li>
              </ul>
            </div>
         </div>
      </div>
   </div>
@stop
