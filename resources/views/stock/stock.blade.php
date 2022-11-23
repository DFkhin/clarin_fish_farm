@extends('main')

@section('content')
<h2 class="mt-3">Stock Management</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/stock">Stock</a></li>
    	<li class="breadcrumb-item active"></li>	
  	</ol>
</nav>

<div class="mt-4 mb-4">
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
	@endif
	<div class="card">
		<div class="card-header">
			<div class="row2">
				<div class="col col-md-6">
					<a href="{{ route('stock.add') }}" class="btn btn-success btn-sm float-end" data-toggle="tooltip" data-placement="top" title="Add Stock"><i class="fa fa-plus" aria-hidden="true"></i></a>
					
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover" id="stock_table">
					<thead class="table-primary">
						<tr> 
							<th>Tilapia Stocks</th>
							<th>Ornamental Stocks</th>
							
							<th>Carp Stocks</th>

							<th>Beetle Fish Stocks</th>

							<th>Cat Fish Stocks</th>
							<th>Date Added</th>

							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
$(function(){
	var table = $('#stock_table').DataTable({
		processing:true,
		serverSide:true,
		ajax:"{{ route('stock.fetch_all') }}",
		columns:[
			
			{
				data:'tilapia_stock',
				name:'tilapia_stock'
			},
			
			{
				data:'ornamental_stock',
				name:'ornamental_stock'
			},
			
			{
				data:'carp_stock',
				name:'carp_stock'
			},
			
			{
				data:'beetle_fish_stock',
				name:'beetle_fish_stock'
			},
			
			{
				data:'cat_fish_stock',
				name:'cat_fish_stock'
			},
			{
				data:'date_added',
				name:'date_added'
			},
			{
				data:'action',
				name:'action',
				orderable:false
			}
		]
	});

	$(document).on('click', '.delete', function(){

		var id = $(this).data('id');

		if(confirm("Are you sure you want to remove it?"))
		{
			window.location.href = "stock/delete/" + id;
		}

		});

})
</script>
	<script type="text/javascript">
		$(document).ready(function(){
		$('.btnprn').printPage();
		});
	</script>
	
@endsection