@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Bio-Data Page'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Show Bio-Data</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $biodata->name }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email address</label>
                                    <input class="form-control" type="email" name="email" value="{{ $biodata->email }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">DOB</label>
                                    <input class="form-control" type="date" name="date_of_birth" value="{{ $biodata->date_of_birth }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Contact Number</label>
                                    <input class="form-control" type="number" name="contact_number" value="{{ $biodata->contact_number }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Full Address</label>
                                    <input class="form-control" type="text" name="address" value="{{ $biodata->address }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Highest Qualification</label>
                                    <input class="form-control" type="text" name="education" value="{{ $biodata->education }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Experience</label>
                                    <input class="form-control" type="text" name="experience" value="{{ $biodata->experience }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Skills</label>
                                    <input class="form-control" type="text" name="skills" value="{{ $biodata->skills }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Languages</label>
                                    <input class="form-control" type="text" name="languages" value="{{ $biodata->languages }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">About me</label>
                                    <textarea name="description" class="form-control" disabled>{{ $biodata->description }}</textarea>
                                </div>
                            </div>
                            <section class="container">
                                <label for="example-text-input" class="form-control-label">Photos</label>
                                <div class="row gallery">
                                    @if($biodata->media != null)
                                        @foreach ($biodata->media as $list)
                                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                                <a href="{{ url('storage/'.$list->id.'/'.$list->file_name) }}">
                                                    <figure>
                                                        <img class="img-fluid img-thumbnail" src="{{ url('storage/'.$list->id.'/'.$list->file_name) }}" alt="Image"/>
                                                        <span class="image_delete_icon">
                                                            <i class="cursor-pointer fas fa-trash text-danger" aria-hidden="true" onclick="argon.showSwal('warning-message-and-cancel','delete_form_{{$list->id}}')"></i>
                                                        </span>
                                                        <form action="{{ route('singlebio.destroy', $list->id) }}" method="POST" id="delete_form_{{$list->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </figure>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(".gallery").magnificPopup({
                delegate: "a",
                type: "image",
                tLoading: "Loading image #%curr%...",
                mainClass: "mfp-img-mobile",
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                }
            });
        });
    </script>
@endpush