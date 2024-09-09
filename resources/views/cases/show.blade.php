@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Case Page'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Show Case Files</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Information</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Title</label>
                                    <input class="form-control" type="text" name="name" value="{{ $cases->title }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <section class="container">
                                <label for="example-text-input" class="form-control-label">Files</label>
                                <div class="row gallery">
                                    @if($cases->media != null)
                                        @foreach ($cases->media as $list)
                                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                                <a href="{{ url('public/storage/'.$list->id.'/'.$list->file_name) }}" target="_blank">
                                                    <figure>
                                                        @if($list->mime_type == 'image/png' || $list->mime_type == 'image/jpg' || $list->mime_type == 'image/jpeg' )
                                                        <img class="img-fluid img-thumbnail" src="{{ url('public/storage/'.$list->id.'/'.$list->file_name) }}" alt="Image"/>
                                                        @else
                                                        <img class="img-fluid img-thumbnail" src="https://png.pngtree.com/png-vector/20190406/ourmid/pngtree-doc-file-document-icon-png-image_913809.jpg" alt="Image"/>
                                                        @endif
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