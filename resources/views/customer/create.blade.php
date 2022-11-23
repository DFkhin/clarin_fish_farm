@extends('main')
@section('title','Add Customer')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/customer">Customer</a></li>
      <li class="breadcrumb-item active">Add New</li>
    </ol>
</nav>

    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Add Customer
        <a href="{{url('customer')}}" class="float-end btn btn-sm btn-success">View All</a>
    </div>

        @if(Session::has('msg'))
        <p class="text-success">{{session('msg')}}</p>
        @endif
        <form method="post" action="{{url('customer')}}" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <td>
                        <input type="text" name="full_name" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>
                        <input type="file" name="photo" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <input type="text" name="address" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>
                        <input type="text" name="mobile" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <input type="radio" name="status" value="1" /> Activate
                        <br />
                        <input type="radio" checked="checked" name="status" value="0" /> DeActivate
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>

@endsection