@extends('main')

@section('content')

<!--<img src="{{ asset('images/bfar.png') }}" style=" display: block; margin-left: auto; margin-right: auto; width: 50%;">-->
<div class="row" style="margin-top:2%">
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="small-box bg-blue text-white text-bold">
            <div class="inner">
              <h3>{{ $total_admin }}</h3>
    
              <p>Total Users</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-users"></i>
            </div>
            
          </div>
        </div>
    <!-- ./col -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="small-box btn-yellow text-white">
            <div class="inner">
                <h3>{{ $total_transaction }}</h3>

                <p>Transactions Log</p>
              </div>
              <div class="icon ">
                <i class="fa-sharp fa-solid fa-arrow-right-arrow-left"></i>
            </div>
            
          </div>
        </div>
    
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="small-box bg-red text-white">
                <div class="inner">
                  <h3>{{ $total_stocks }}</h3>
        
                  <p>Total Fish Stock</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-fish"></i>
                </div>
                
              </div>
            </div>
    <!-- ./col -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="small-box bg-green text-white">
            <div class="inner">
              <h3>{{ $total_fish_sold  }}</h3>
    
              <p>Total Sold Fish</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-peso-sign"></i>
            </div>
            
          </div>
        </div>
</div>
  <div class="small-box" style="max-width: 100%;">
        
    <div id='full_calendar_events'></div>
</div>

@endsection