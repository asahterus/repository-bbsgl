@extends('layouts.guest')

@section('content')
   <div class="container my-5">
      {{-- <a href="{{ route('login') }}" class="bg-coklat text-decoration-none rounded text-light px-4 py-2 border-0">Login</a> --}}
      <div class="row justify-content-center my-3">
         <div class="col-10 col-md-8 mx-auto">
            <div class="text-center">
               <h1>Browse By Division</h1>
            </div>

            <div class="my-2 text-center mx-auto">
              <div class="d-flex align-items-center justify-content-center gap-2">
                <select id="division-select" class="form-select" aria-label="Select Division">
                  <option selected disabled>--Select Division--</option>
                  <option value="Survei dan Pemetaan Sumber Daya Geologi Kelautan">
                    Survei dan Pemetaan Sumber Daya Geologi Kelautan
                  </option>
                  <option value="Survei dan Pemetaan Mitigasi Kebencanaan Kewilayahan Kelautan">
                    Survei dan Pemetaan Mitigasi Kebencanaan Kewilayahan Kelautan
                  </option>
                  <option value="Other">
                    Other
                  </option>

                </select>
                <button id="fetch-document-type-data" class="btn btn-primary">Browse</button>
              </div>
            </div>

            <div id="spinner-container" class="text-center my-3" style="display: none;">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>

            <div id="eprints-container" class="d-flex flex-column mt-4">
              <!-- Eprints data will be populated here -->
            </div>
         </div>
      </div>
   </div>

   @push('scripts')
    <script>
      $(document).ready(function() {
        $('#fetch-document-type-data').click(function() {
          var divisionType = $('#division-select').val();
          if (divisionType) {
            
            $('#spinner-container').show();
            
            $.ajax({
              url: '{{ route("browse.document.division") }}',
              method: 'GET',
              data: { division: divisionType },
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
                    No Document found for the selected subject.
                  </div>`);
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
