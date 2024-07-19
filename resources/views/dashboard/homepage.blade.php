@extends('layouts.admin')
@section('title')
    {{ __(' Dashboard') }}
@endsection
@section('content')
    <!-- [ breadcrumb ] start -->

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <!-- analytic card start -->
        @can('manage-user')
            <div class="col-xl-3 col-md-12">
                <a href="users">
                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-0 text-muted">{{ __('Total Users') }}</h6>
                                    <h3 class="m-b-5">{{ $user }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-users bg-primary text-white d-block"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan
        @can('manage-role')
            <div class="col-xl-3 col-md-12">
                <a href="roles">
                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-0 text-muted">{{ __('Total Role') }}</h6>
                                    <h3 class="m-b-5">{{ $role }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-key bg-info text-white d-block"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan
        @can('manage-module')
            <div class="col-xl-3 col-md-12">
                <a href="modules">
                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-0 text-muted">{{ __('Total Module') }}</h6>
                                    <h3 class="m-b-5">{{ $modual }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-users bg-success text-white d-block"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan
        @can('manage-langauge')
            <div class="col-xl-3 col-md-12">
                <a href="language">
                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-0 text-muted">{{ __('Total Languages') }}</h6>
                                    <h3 class="m-b-5">{{ $languages }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-world bg-danger text-white d-block"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        <!-- project-ticket end -->

        {{-- <div class="row"> --}}
        <div class="col-lg-12 ">
            @role('admin')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <h4 class="card-title mb-0">{{ 'Users' }}</h4>
                            </div>

                            <div class="col-sm-7 d-none d-md-block">

                                <div class="btn-group btn-group-toggle float-end mr-3" role="group" data-toggle="buttons">
                                    <label class="btn btn-light-primary active" for="option1" id="option1">
                                        <input id="option1" type="radio" class="btn-ckeck" name="options" autocomplete="off"
                                            checked="">
                                        {{ __('Month') }}
                                    </label>
                                    <label class="btn btn-light-primary" for="option2" id="option2">
                                        <input id="option2" type="radio" class="btn-ckeck" name="options"
                                            autocomplete="off"> {{ __('Year') }}
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="c-chart-wrapper chartbtn">
                            <canvas class="chart" id="main-chart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="card-title mb-0">{{ 'File Inbox' }}</h4>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl no.</th>
                                    <th>File</th>
                                    <th>Section</th>
                                    <th>Department</th>
                                    <th>Due Date</th>
                                    <th>Priority</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($file_inbox as $key => $file)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $file->filename->file_name }}</td>
                                        <td>{{ $file->section->name }}</td>
                                        <td>{{ $file->department->name }}</td>
                                        <td>{{ $file->duedate }}</td>
                                        <td>{{ $file->priority }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="card-title mb-0">{{ 'Receipt Inbox' }}</h4>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Receipt</th>
                                    <th>Section</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receipt_inbox as $key => $receipt)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $receipt->Receipt->letter_ref_no }}</td>
                                        <td>{{ $receipt->Section->name }}</td>
                                        <td>{{ $receipt->Department->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endrole
        </div>
    </div>
    <!-- [ Main Content ] end -->
    </div>
    </div>

@endsection
@push('style')
     @include('layouts.includes.datatable_css') 
     <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> 
@endpush


@section('javascript')
    @role('admin')
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
        <script src="{{ asset('js/main.js') }}" defer></script>
        <script>
            $(document).on("click", "#option2", function() {
                getChartData('year');
            });

            $(document).on("click", "#option1", function() {
                getChartData('month');
            });
            $(document).ready(function() {
                getChartData('month');
            })

            function getChartData(type) {

                $.ajax({
                    url: "{{ route('get.chart.data') }}",
                    type: 'POST',
                    data: {
                        type: type,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(result) {
                        mainChart.data.labels = result.lable;
                        mainChart.data.datasets[0].data = result.value;
                        mainChart.update()
                    },
                    error: function(data) {
                        console.log(data.responseJSON);
                    }
                });
            }
        </script>
        <script src="https://cdn.datatables.net/2.1.0/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script>
            new DataTable('#example');
        </script>
    @endrole
@endsection
