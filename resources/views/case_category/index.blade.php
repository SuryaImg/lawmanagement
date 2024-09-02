@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Case Category'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="alert alert-light" role="alert">
                 <strong>You can make the changes here as per your necessity </strong>. Check it
            </div>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between"><div>
                        <h5 class="mb-0">All Case Category</h5>
                    </div>
                    <a href="{{ route('case_category.create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Case Category</a>
                </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="case_categorydataDataTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($case_category as $data)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$data->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0"> {{ $data->description }}</p>
                                    </td>
                                    <td class="text-center">
                                        <!-- <a href="{{ route('case_category.show',$data->id) }}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Show events">
                                            <i class="fas fa-eye text-secondary" aria-hidden="true"></i>
                                        </a> -->
                                        <a href="{{ route('case_category.edit',$data->id) }}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Edit event">
                                            <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary" aria-hidden="true" onclick="argon.showSwal('warning-message-and-cancel','delete_form_{{$data->id}}')" ></i>
                                        </span>
                                        <form action="{{ route('case_category.destroy', $data->id) }}" method="POST" id="delete_form_{{$data->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
@push('js')
<script>
    const userDataTable = new simpleDatatables.DataTable("#case_categorydataDataTable", {
        searchable: true,
        fixedHeight: true
    });
</script>
@endpush