@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Case Stage Page'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <form role="form" method="POST" action="{{ route('case_stage.update', $case_stage->id) }}" enctype="multipart/form-data"  id="update_case_stage">
                        @csrf
                        @method('patch')
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Case Stage</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Update</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control" type="text" name="name" value="{{ $case_stage->name ?? '' }}">
                                        @error('name') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Description</label>
                                        <textarea name="description" class="form-control" >{{ $case_stage->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
