@extends('main')

@section('content')

<h2 class="mt-3">Stock Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="/all_transaction">Stock</a></li>
    	<li class="breadcrumb-item active">Add New</li>
  	</ol>
</nav>

<div class="row3 mt-4">
	<div class="col-md-5 mx-auto">
		<div class="card">
			<div class="card-header">Add New Transaction</div>
			<div class="card-body">
				<form method="POST" action="{{ route('stock.add_stock_fish') }}">
					@csrf
					<div class="form-group mb-3">
		        		<label><b>Tilapia Fish Stock</b></label>
		        		<input type="number" name="tilapia_stock" min="0" oninput="validity.valid||(value='');" class="form-control" placeholder="tilapia">
		        		@if($errors->has('tilapia_stock'))
		        			<span class="text-danger">{{ $errors->first('tilapia_stock') }}</span>
		        		@endif
		        	</div>
		        	
                    <div class="form-group mb-3">
		        		<label><b>Ornamental Fish Stock</b></label>
		        		<input type="number" name="ornamental_stock" min="0" oninput="validity.valid||(value='');" class="form-control" placeholder="ornamental">
		        		@if($errors->has('ornamental_stock'))
		        			<span class="text-danger">{{ $errors->first('ornamental_stock') }}</span>
		        		@endif
		        	</div>

                    <div class="form-group mb-3">
		        		<label><b>Carp Fish Stock</b></label>
		        		<input type="number" name="carp_stock" min="0" oninput="validity.valid||(value='');" class="form-control" placeholder="carp">
		        		@if($errors->has('carp_stock'))
		        			<span class="text-danger">{{ $errors->first('carp_stock') }}</span>
		        		@endif
		        	</div>

                    <div class="form-group mb-3">
		        		<label><b>Beetle Fish Stock</b></label>
		        		<input type="number" name="beetle_fish_stock" min="0" oninput="validity.valid||(value='');" class="form-control" placeholder="beetle_fish">
		        		@if($errors->has('beetle_fish_stock'))
		        			<span class="text-danger">{{ $errors->first('beetle_fish_stock') }}</span>
		        		@endif
		        	</div>

                    <div class="form-group mb-3">
		        		<label><b>Cat Fish Stock</b></label>
		        		<input type="number" name="cat_fish_stock" min="0" oninput="validity.valid||(value='');" class="form-control" placeholder="cat_fish">
		        		@if($errors->has('cat_fish_stock'))
		        			<span class="text-danger">{{ $errors->first('cat_fish_stock') }}</span>
		        		@endif
		        	</div>

					<div class="form-group mb-3">
		        		<label><b>Date Added</b></label>
		        		<input type="date" name="date_added" class="form-control" placeholder="date_added">
		        		@if($errors->has('date_added'))
		        			<span class="text-danger">{{ $errors->first('date_added') }}</span>
		        		@endif
		        	</div>

		        	<div class="form-group mb-3">
		        		<input type="submit" class="btn btn-primary" value="Add" />
		        	</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection