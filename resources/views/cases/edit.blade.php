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
                    <form role="form" method="POST" action="{{ route('cases.update', $case->id) }}" enctype="multipart/form-data"  id="update_cases">
                        @csrf
                        @method('patch')
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Case Stage</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Update</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Case Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Respondent Name</label>
                                        <input class="form-control" type="text" name="p_r_name" value="{{ $case->p_r_name }}">
                                        @error('p_r_name') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Respondent Advocate</label>
                                        <input class="form-control" type="text" name="p_r_advocate" value="{{ $case->p_r_advocate }}">
                                        @error('p_r_advocate') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Title</label>
                                        <input class="form-control" type="text" name="title" value="{{ $case->title }}">
                                        @error('title') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Case Category</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="case_category_id">
                                            <option value="">Select Category</option>
                                            @foreach($case_category as $cat)
                                            <option value="{{$cat->id}}" @if($cat->id == $case->case_category_id) {{'selected'}} @endif>{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('case_category_id') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Case No</label>
                                        <input class="form-control" type="text" name="case_no" value="{{ $case->case_no }}">
                                        @error('case_no') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Case File No</label>
                                        <input class="form-control" type="text" name="case_file_no" value="{{ $case->case_file_no }}">
                                        @error('case_file_no') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Case Acts</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="acts">
                                            <option value="">Select Act</option>
                                            <option value="IPC-367">IPC-367</option>
                                            <option value="IPC-362">IPC-362</option>
                                            <option value="IPC-361">IPC-361</option>
                                        </select>
                                        @error('acts') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Court Category</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="court_category_id">
                                            <option value="">Select Category</option>
                                            @foreach($court_category as $cat)
                                            <option value="{{$cat->id}}" @if($cat->id == $case->court_category_id) {{'selected'}} @endif>{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('court_category_id') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Court</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="court_id">
                                            <option value="">Select Court</option>
                                        </select>
                                        @error('court_id') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Opposite Lawyer</label>
                                        <input class="form-control" type="text" name="opp_lawyer" value="{{ $case->opp_lawyer }}">
                                        @error('opp_lawyer') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Case Stage</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="stage_id">
                                            <option value="">Select Stage</option>
                                            @foreach($case_stage as $cat)
                                            <option value="{{$cat->id}}" @if($cat->id == $case->stage_id) {{'selected'}} @endif>{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('stage_id') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Case Charge</label>
                                        <input class="form-control" type="number" name="case_charge" value="{{ $case->case_charge }}">
                                        @error('case_charge') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Assign Staff</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="staff_id">
                                            <option value="">Select Stage</option>
                                            @foreach($user as $cat)
                                            <option value="{{$cat->id}}" @if($cat->id == $case->staff_id) {{'selected'}} @endif>{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('staff_id') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Receiving Date</label>
                                        <input class="form-control" type="date" name="receiving_date" value="{{ $case->receiving_date }}">
                                        @error('receiving_date') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Filing Date</label>
                                        <input class="form-control" type="date" name="filling_date" value="{{ $case->filling_date }}">
                                        @error('filling_date') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Hearing Date</label>
                                        <input class="form-control" type="date" name="hearing_date" value="{{ $case->hearing_date }}">
                                        @error('hearing_date') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Judgement Date</label>
                                        <input class="form-control" type="date" name="judgement_date" value="{{ $case->judgement_date }}">
                                        @error('judgement_date') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Description</label>
                                        <textarea name="description" class="form-control" >{{ $case->description }}</textarea>
                                        @error('description') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
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
