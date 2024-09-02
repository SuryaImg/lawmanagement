@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Add Court'])
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
                    <form role="form" method="POST" action="{{ route('court.store') }}" enctype="multipart/form-data"  id="create_court">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Create </p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Court Information</p>
                            <div class="row">
                                <input type="hidden" name="country_id" value="1">
                                <input type="hidden" name="state_id" value="1">
                                <input type="hidden" name="city_id" value="1">
                                <!-- 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">State</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="state">
                                            <option value="">Select State</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="English">English</option>
                                        </select>
                                        @error('languages') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Language</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="languages">
                                            <option value="">Select language</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="English">English</option>
                                        </select>
                                        @error('languages') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Court Category</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="court_category_id">
                                            <option value="">Select Category</option>
                                            @foreach($court_category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('court_category_id') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Location</label>
                                        <input class="form-control" type="text" name="location" value="{{ old('location') }}">
                                        @error('location') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Court Name</label>
                                        <input class="form-control" type="text" name="court_name" value="{{ old('court_name') }}">
                                        @error('court_name') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Description</label>
                                        <textarea name="description" class="form-control" ></textarea>
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