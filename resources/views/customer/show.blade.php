@extends('main')
@section('title','View Customer')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/customer">Customer</a></li>
      <li class="breadcrumb-item active">Show Customer</li>
    </ol>
</nav>
<div class="card mb-4 mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        View Customer
        <a href="{{url('customer')}}" class="float-end btn btn-sm btn-success">View All</a>
    </div>
    <div class="card-body">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        @if(Session::has('msg'))
        <p class="text-success">{{session('msg')}}</p>
        @endif
        <form method="post" action="{{url('customer/'.$data->id)}}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <td>
                        {{$data->full_name}}
                    </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>
                        <img src="{{asset('public/images/'.$data->photo)}}" width="200" />
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        {{$data->address}}
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>
                        {{$data->mobile}}
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($data->status==1) Activated @else DeActivated @endif
                        <br />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

@endsection