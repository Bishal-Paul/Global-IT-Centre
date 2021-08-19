@extends('backend.master')

@section('content')
<!-- Start Page content -->
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <!-- end col -->
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">Edit Teachers Info</h4>

                    @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif

                    <form method="post" action="{{url('update-teacher')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$teacher->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">Name *</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$teacher->name}}" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post" class="col-3 col-form-label">Current Post *</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$teacher->post}}" name="post">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education" class="col-3 col-form-label">Education *</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$teacher->education}}" name="education">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-3 col-form-label">Email *</label>
                            <div class="col-9">
                                <input type="email" class="form-control" value="{{$teacher->email}}" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-3 col-form-label">Phone *</label>
                            <div class="col-9">
                                <input type="phone" class="form-control" value="{{$teacher->phone}}" name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-3 col-form-label">Address *</label>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{$teacher->address}}" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-3 col-form-label">Teacher's Bio *</label>
                            <div class="col-9">
                                <textarea name="bio" class="form-control" cols="30" rows="10">{{$teacher->bio}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-3 col-form-label">Preview Image</label>
                            <div class="col-9">
                                <img src="{{ asset('thumbnails/'.$teacher->image) }}" width="200px" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-3 col-form-label">Upload Image *</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0 justify-content-end row text-center">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
@endsection