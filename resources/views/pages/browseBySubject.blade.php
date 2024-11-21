@extends('layouts.guest')

@section('content')
   <div class="container my-5">
      {{-- <a href="{{ route('login') }}" class="bg-coklat text-decoration-none rounded text-light px-4 py-2 border-0">Login</a> --}}
      <div class="row justify-content-center my-3">
         <div class="col-10 col-md-8 mx-auto">
            <div class="text-center">
               <h1>Browse By Subjects</h1>
            </div>

            <div class="my-2 text-center mx-auto">
              <div class="d-flex align-items-center justify-content-center gap-2">
                <select id="subject-select" class="form-select" aria-label="Select Subject">
                  <option selected disabled>--Select Subject--</option>
                  @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                  @endforeach
                </select>
                <button id="fetch-subject-data" class="btn btn-primary">Browse</button>
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
        $('#fetch-subject-data').click(function() {
          var selectedSubject = $('#subject-select').val();
          
          if (selectedSubject) {
         
            $('#spinner-container').show();

            $.ajax({
              url: '{{ route("browse.subject.data") }}',
              method: 'GET',
              data: { subject_id: selectedSubject },
              success: function(response) {
                var container = $('#eprints-container');
                container.empty(); 

                console.log(response);

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
                    No documents found for the selected subject.
                  </div>`);
                }
              },
              error: function(xhr) {
                console.error(xhr.responseText);
                swal("Error!", "Error fetching data", "error");
              },
              complete: function() {
                
                $('#spinner-container').hide();
              }
            });
          } else {
            swal("Heyy!", "Please select a subject!", "warning");
          }
        });
      });
    </script>
   @endpush
@stop
