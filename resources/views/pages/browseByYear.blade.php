@extends('layouts.guest')

@section('content')
   <div class="container my-5">
      <div class="row justify-content-center my-3">
         <div class="col-10 col-md-8 mx-auto">
            <div class="text-center">
               <h1>Browse By Year</h1>
            </div>

            <div class="my-2 text-center mx-auto">
              <div class="d-flex align-items-center justify-content-center gap-2">
                <select id="year-select" class="form-select" aria-label="Select Year">
                  <option selected disabled>--Select year--</option>
                  <option value="2024">2024</option>
                  <option value="2023">2023</option>
                  <option value="2022">2022</option>
                </select>
                <button id="fetch-year-data" class="btn btn-primary">Browse</button>
              </div>
            </div>

            <div id="spinner-container" class="text-center my-3" style="display: none;">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>

            <div id="eprints-container" class="d-flex flex-column mt-4">
              <!-- Eprints data  -->
            </div>
         </div>
      </div>
   </div>

   @push('scripts')
    <script>
      $(document).ready(function() {
        $('#fetch-year-data').click(function() {
          var selectedYear = $('#year-select').val();
          if (selectedYear) {
  
            $('#spinner-container').show();
            
            $.ajax({
              url: '{{ route("browse.year.data") }}',
              method: 'GET',
              data: { year: selectedYear },
              success: function(response) {
                var container = $('#eprints-container');
                container.empty(); 

                if (response.length > 0) {
                  $.each(response, function(index, eprint) {
                   
                    var fileUrl = `{{ route('file.open', ':filename') }}`.replace(':filename', eprint.file);
                    var item = `
                      <div class="my-2">
                        <a href="${fileUrl}" target="_blank" class="text-decoration-none">${eprint.title}</a>
                      </div>
                    `;
                    container.append(item);
                  });
                } else {
                  container.html(` 
                    <div class="alert alert-danger" role="alert">
                      No Document found for the selected year.
                    </div>
                  `);
                }
              },
              error: function() {
                swal("Error!", "Error fetching data", "error");
              },
              complete: function() {
                $('#spinner-container').hide();
              }
            });
          } else {
            swal("Heyy!", "Please select a document type!", "warning");
          }
        });
      });
    </script>
   @endpush
@stop
