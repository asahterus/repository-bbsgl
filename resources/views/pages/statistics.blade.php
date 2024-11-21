@extends('layouts.guest')
@section('content')
   <div class="container my-5">
      {{-- <a href="{{ route('login')}}" class="bg-coklat text-decoration-none rounded text-light px-4 py-2 border-0">Login</a> --}}
      <div class="row justify-content-center my-3">
         <div class="col-10 col-md-8 mx-auto">
            <div class="text-center">
               <h1>Repository Statistics</h1>
            </div>

            <div class="my-4 text-center mx-auto">
              <h3>Statistics</h3>
              <div class="card mb-3">
                <div class="card-header fw-bold">Downloads</div>
                <div class="card-body text-primary">
                  <canvas id="comboChart"></canvas>
                </div>
              </div>
              
              <div class="card mb-3">
                <div class="card-header fw-bold">Activity Overview</div>
                <div class="card-body text-primary">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="d-flex align-items-center justify-content-center">
                        <h4>{{ $documents_count }}</h4>
                        <span> Items</span>
                      </div>
    
                      <div class="d-flex align-items-center justify-content-center">
                        <h4>100%</h4>
                        <span> Full Text</span>
                      </div>
                    </div>

                    <div class="col-sm-12 col-md-6">

                      <div class="d-flex align-items-center justify-content-center">
                        <h4>513,839</h4>
                        <span> Downloads</span>
                      </div>
    
                      <div class="d-flex align-items-center justify-content-center">
                        <h4>93%</h4>
                        <span> Open Access</span>
                      </div>
                    </div>
                  </div>
                

                  
                </div>
              </div>
              

            </div>
         </div>
      </div>
   </div>

   <!-- Include Chart.js -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <script>
      document.addEventListener('DOMContentLoaded', function () {
         const ctx = document.getElementById('comboChart').getContext('2d');
         const comboChart = new Chart(ctx, {
            data: {
               labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
               datasets: [
                  {
                     type: 'bar',
                     label: 'Bar Dataset',
                     data: [10, 20, 30, 40, 50, 60, 70],
                     backgroundColor: 'rgba(54, 162, 235, 0.2)',
                     borderColor: 'rgba(54, 162, 235, 1)',
                     borderWidth: 1
                  },
                  {
                     type: 'line',
                     label: 'Line Dataset',
                     data: [10, 20, 30, 40, 50, 60, 70],
                     fill: false,
                     borderColor: 'rgba(255, 99, 132, 1)',
                     tension: 0.1
                  }
               ]
            },
            options: {

               plugins: {
                  legend: {
                     display: false 
                  }
               }
            }
         });
      });
   </script>
@stop
