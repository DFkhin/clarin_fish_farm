@extends('main')
@section('heads')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>

    <style type="text/css">
        .preview {
          overflow: hidden;
          width: 250px;
          height: 97px;
          border: 1px solid rgb(47, 91, 133);
          margin-left: 8px;
        }

        .image {
            display: none;
        }

        #image {
            display: block;
            width: 100%;
        }
        #thumbnail {
            width: 100%;
        }
    </style>

@endsection

@section('content')
<h1>User Profile </h1>
<hr>
<div class="row mt-4">
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>

    <p>
        <img src="{{asset('public/images/'.$data->photo)}}" width="200" />
        <input type="hidden" name="prev_photo" value="{{$data->photo}}" />
    </p>

	@endif
    <div class="col-md-3">
        <div class="position-relative" style="border-radius: 50%; overflow:hidden;">
            <div style="margin-top: 100%"></div>
            <img src="{{$user->profile_pic}}" style="width: 100%; top:0; left:0; position: absolute; cursor: pointer" alt="" id="profile-pic">
            <span class="position-absolute text-center w-100" style="opacity: 0; color: rgb(224, 224, 224); bottom: 0px; z-index: 10; background-color: rgba(50,50,50,0.5); padding: 0; pointer-events: none" id="change-label">
                <i class="fa fa-camera"></i> Change
            </span>
            <input type="file" accept="image/png, image/jpeg" style="display: none" id="image-input">
        </div>
        <div class="alert alert-warning mt-2" style="display: none" id="profile-pic-alert">
            Make sure to click on Save Changes to update your profile picture.
        </div>
    </div>
    <div class="col-md-4">  
        <h5>User Details</h5>
			<div class="card-header bg-green">Edit User</div>
			<form method="post" action="{{ route('profile') }}">
            @csrf
                <div class="input-group mb-3"> 
                    <i class="fa fa-user input-group-text" style="width: 45px"></i>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}" />
                </div>
            <div class="input-group mb-3">
                <i class="fa fa-envelope input-group-text" style="width: 45px"></i>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" />
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="New Password" />
            </div>
            <div class="form-group mb-3 justify-content-end">
                <button class="btn btn-success" type="submit">Save Changes</button>
            </div>
            </form>
    </div>
</div>
@endsection
@section('scripts')

<script src="{{asset('js/crop-profile.js')}}"></script>

<script>

    $(document).ready(function(){
        $("#profile-pic").hover(function(){
            $("#change-label").animate({opacity:1.0, padding: '20px'},300,"swing")
        })
        $("#profile-pic").mouseout(function(){
            $("#change-label").animate({opacity:0, padding: '0px'},100,'swing')
        })
    })


</script>

@endsection