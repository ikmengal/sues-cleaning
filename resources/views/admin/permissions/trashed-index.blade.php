@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
<input type="hidden" id="page_url" value="{{ route('designations.index') }}">
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">{{ $title }}</h5>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row me-2">
                        <div class="col-md-2">
                            <div class="me-3">
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>
                                        {{-- <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select" fdprocessedid="o5g1n8">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> --}}
                                        @if(session()->has('message'))
                                            <div class="alert alert-success" id="message-alert">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif

                                        @if(session()->has('error'))
                                            <div class="alert alert-danger" id="message-alert">
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                {{-- <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>
                                        <input type="search" class="form-control" id="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                                        <input type="hidden" class="form-control" id="status" value="All">
                                    </label>
                                </div> --}}
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a data-toggle="tooltip" data-placement="top" title="Show All Records" href="{{ route('designations.index') }}" class="btn btn-success btn-primary mx-3">
                                        <span>
                                            <i class="ti ti-eye me-0 me-sm-1 ti-xs"></i>
                                            <span class="d-none d-sm-inline-block">View All Records</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                        <thead>
                            <tr>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">S.No#</th>
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 135px;" aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach ($models as $key=>$model)
                                <tr class="odd" id="id-{{ $model->id }}">
                                    <td tabindex="0">{{ $key+1 }}.</td>
                                    <td>
                                        <span class="text-truncate d-flex align-items-center">
                                            {{ $model->title??'-' }}
                                        </span>
                                    </td>
                                    <td>{!! \Illuminate\Support\Str::limit($model->description,50)??'-' !!}</td>
                                    <td>
                                        @if($model->status)
                                            <span class="badge bg-label-success" text-capitalized="">Active</span>
                                        @else
                                            <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('designations.restore', $model->id) }}">
                                                <span>
                                                    <i class="ti ti-refresh ti-sm me-2"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6">
                                    <div class="row mx-2">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to {{$models->count()}} of {{$models->count()}} entries</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        setTimeout(function() {
            $('#message-alert').fadeOut('slow');
        }, 2000);
    </script>
@endpush
