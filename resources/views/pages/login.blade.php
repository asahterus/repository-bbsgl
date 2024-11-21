
@extends('layouts.guest')
@section('content')
   <div class="container my-5">
      <div class="row justify-content-center">
         <div class="col-md-4">
            <div class="rounded shadow border border-warning p-5">
               <div class="text-center">
                  <h1>Login</h1>
                  <p>Please enter your username and password.</p>
               </div>
               <form id="loginForm">
                  @csrf
                  <div class="form-floating mb-3">
                     <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                     <label for="floatingInput">Email/Username</label>
                     <div class="text-danger" id="emailError"></div>
                  </div>
                  <div class="form-floating">
                     <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                     <label for="floatingPassword">Password</label>
                     <div class="text-danger" id="passwordError"></div>
                  </div>
                  <div class="d-grid">
                     <button type="submit" class="bg-warning w-100 rounded text-light py-2 border-0 mt-3">Login</button>
                   </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   @push('scripts')
   <script>
      $(document).ready(function() {
         $('#loginForm').submit(function(e) {
            e.preventDefault();
            
            $('#emailError').text('');
            $('#passwordError').text('');

            $.ajax({
               url: '{{ url('login') }}',
               type: 'POST',
               data: $(this).serialize(),
               success: function(response) {
                  swal("Success!", response.message, "success").then(function() {
                     window.location.href = '{{ url('/') }}'; 
                  });
               },
               error: function(response) {
                  var errors = response.responseJSON.errors;
                  if (errors.email) {
                     $('#emailError').text(errors.email[0]);
                  }
                  if (errors.password) {
                     $('#passwordError').text(errors.password[0]);
                  }
                  swal("Error!", "Please check your input.", "error");
               }
            });
         });
      });
   </script>
   @endpush
@stop
