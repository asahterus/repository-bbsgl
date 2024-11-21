@extends('layouts.guest')

@section('content')
   <div class="container my-5">
      {{-- <a href="{{ route('login') }}" class="bg-coklat text-decoration-none rounded text-light px-4 py-2 border-0">Login</a> --}}
      <div class="row justify-content-center my-3">
         <div class="col-10 col-md-8 mx-auto">
            <div class="text-center">
               <h1>Browse By Author</h1>
            </div>

            <div class="my-2 text-center mx-auto">
              <div class="d-flex align-items-center justify-content-center gap-2">
                <input id="author-name-input" name="query" class="form-control" type="text" placeholder="Enter author name" aria-label="Search input example">
                <button id="fetch-author-data" class="btn btn-primary">Browse</button>
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
      $('#fetch-author-data').click(function() {
        var authorName = $('#author-name-input').val();
        if (authorName) {
            $('#spinner-container').show();
            
            $.ajax({
                url: '{{ route("browse.document.author") }}',
                method: 'GET',
                data: { author_name: authorName },
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
                          No documents found for the author "${authorName}".
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
            swal("Heyy!", "Please enter an author name!", "warning");
        }
    });

    </script>
   @endpush
@stop
