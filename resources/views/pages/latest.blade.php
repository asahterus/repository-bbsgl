
@extends('layouts.guest')
@section('content')
   <div class="container my-5">
      <div class="row justify-content-center my-3">
         <div class="col-10 col-md-8">
            <div class="text-center">
               <h1>Latest Additions to BBSPGL Repository</h1>
            </div>

            <div class="mt-5 mb-2">

              @foreach($eprints as $day => $eprintGroup)
              <div class="d-flex flex-column">
     
               <h5 class="fw-bold">{{ $day === 'Today' ? 'Today' : $day }}</h5>

               <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Judul</th>
                      <th scope="col">Jenis</th>
                      <th scope="col">Author</th>
                      <th scope="col">Tahun Rilis</th>
                      {{-- <th scope="col">Institusi</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($eprintGroup as $eprint)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $eprint->title }}</td>
                        <td>{{ $eprint->item_type }}</td>
                        <td>
                            @php
                                $familyNames = json_decode($eprint->family_names, true);
                                $givenNames = json_decode($eprint->given_names, true);
                                $authors = [];
                
                                if (is_array($familyNames) && is_array($givenNames)) {
                                    foreach ($familyNames as $index => $familyName) {
                                        $authors[] = $familyName . ' ' . $givenNames[$index];
                                    }
                                }
                
                                echo implode(', ', $authors);
                            @endphp
                        </td>
                        <td>{{ \Carbon\Carbon::parse($eprint->publication_date)->year }}</td>
                        {{-- <td>{{ $eprint->corporate_creators }}</td> --}}
                    </tr>
                @endforeach
                
                    {{-- <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td colspan="2">Larry the Bird</td>
                      <td>@twitter</td>
                    </tr> --}}
                  </tbody>
                </table>
            

              </div>

              <!-- Separator between days -->
              <div class="my-3">
                <hr class="mb-0 text-dark hr">
                {{-- <hr class="my-1 hr">
                <hr class="mt-0 hr"> --}}
              </div>
              @endforeach

            </div>

         </div>
      </div>
   </div>
@stop
