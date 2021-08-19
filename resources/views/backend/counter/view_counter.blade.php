@extends('backend.master')

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <!-- end col -->
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">View Counters</h4>
                    @if(session('success'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Counts</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($counter as $key => $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td><i class="{{ $item->icon }}" aria-hidden="true" style="font-size: 25px;"></i></td>
                                <td>{{ $item->counts }}</td>
                                <td>
                                    <a class="btn btn-outline-danger" href="{{url('delete-counter')}}/{{$item->id}}">Delete Counter</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>

@endsection