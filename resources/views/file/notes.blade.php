@extends('layouts.admin')
@section('title', __('Notes'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('file.index') }}">{{ __('Notes') }}</a></li>
        <li class="breadcrumb-item">{{ __('Notes') }}</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('File Created') }}</h5>
                </div>
                {{ Form::open(['route' => 'store.notes', 'method' => 'post']) }}
                <div class="card-body">
                    <input type="hidden" name="file_id" value="{{ $file->id }}">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#greenNotesTab">{{ __('Green Notes') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#yellowNotesTab">{{ __('Yellow Notes') }}</a>
                        </li>
                        @if ($gnotes != null)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('file.share', $gnotes->id) }}">{{ __('Send') }}</a>
                            </li>
                        @endif
                    </ul>

                    <div class="tab-content">
                        <div id="greenNotesTab" class="tab-pane active">
                            <br>
                            @php
                                $description = $gnotes->description ?? '';
                                $id = $gnotes->id ?? '';
                            @endphp
                            <div class="form-group">
                                <label for="gdescription">{{ __('Green Notes') }}</label>
                                {{ Form::textarea('gdescription', $description, ['class' => 'form-control ckeditor-textarea', 'id' => 'gdescription', 'rows' => '8']) }}
                                @error('description')
                                    <span class="invalid-name" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                <a class="btn btn-secondary" href="{{ route('discard.notes', $id) }}">{{ __('Discard') }}</a>
                            </div>
                        </div>
                        <div id="yellowNotesTab" class="tab-pane fade">
                            <br>
                            @php
                                $ydescription = $ynotes->description ?? '';
                                $yid = $ynotes->id ?? '';
                            @endphp
                            <div class="form-group">
                                <label for="ydescription">{{ __('Yellow Notes') }}</label>
                                {{ Form::textarea('ydescription', $ydescription, ['class' => 'form-control ckeditor-textarea', 'id' => 'ydescription', 'rows' => '8']) }}
                                @error('description')
                                    <span class="invalid-name" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                <a class="btn btn-secondary" href="{{ route('discard.notes', $yid) }}">{{ __('Discard') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>{{ __('List Of Correspondences') }}
                        <div class="dropdown float-right">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('All') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" id="showReceipt">{{ __('Receipt') }}</a>
                                <a class="dropdown-item" href="#" id="shownotes">{{ __('Previous Notes') }}</a>
                            </div>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <div id="table">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('Receipt/Issue No') }}</th>
                                    <th>{{ __('Subject') }}</th>
                                    <th>{{ __('Attachment') }}</th>
                                    <th>{{ __('Issue On') }}</th>
                                    <th>{{ __('Remarks') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($correspondence as $correspondences)
                                    <tr>
                                        <td>{{ $correspondences->receipt->dairy_date }}</td>
                                        <td>{{ $correspondences->receipt->subject }}</td>
                                        <td>{{ $correspondences->receipt->receved_date }}</td>
                                        <td>{{ $correspondences->receipt->letter_ref_no }}</td>
                                        <td>{{ $correspondences->receipt->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="receipttable" style="display: none;">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('Select') }}</th>
                                    <th>{{ __('Receipt/Issue No') }}</th>
                                    <th>{{ __('Subject') }}</th>
                                    <th>{{ __('Attachment') }}</th>
                                    <th>{{ __('Issue On') }}</th>
                                    <th>{{ __('Remarks') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ Form::open(['route' => 'correspondance.store', 'method' => 'post']) }}
                                @foreach ($receipt as $receipts)
                                    <tr>
                                        <td><input type="checkbox" name="receipt_id[]" value="{{ $receipts->id }}"></td>
                                        <td>{{ $receipts->dairy_date }}</td>
                                        <td>{{ $receipts->subject }}</td>
                                        <td>{{ $receipts->receved_date }}</td>
                                        <td>{{ $receipts->letter_ref_no }}</td>
                                        <td>{{ $receipts->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-2 mt-3" id="add" style="display: none;">
                            <input type="hidden" name="file_id" id="file" value="{{ $file->id }}">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Add Receipt') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div id="greenNotesSection" style="display: none;">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('Green Notes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($greennote as $greennotes)
                                    <tr>
                                        <td>{!! $greennotes->description !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <style>
        .ckeditor-textarea {
            width: 100%;
        }
    </style>
    <script>
        $(document).ready(function() {
            ClassicEditor.create(document.querySelector('#gdescription')).catch(error => console.error(error));
            ClassicEditor.create(document.querySelector('#ydescription')).catch(error => console.error(error));

            $('#showReceipt').on('click', function(event) {
                event.preventDefault();
                $('#receipttable').show();
                $('#table').hide();
                $('#add').show();
                $('#greenNotesSection').hide();
            });

            $('#shownotes').on('click', function(event) {
                event.preventDefault();
                $('#receipttable').hide();
                $('#add').hide();
                $('#table').hide();
                $('#greenNotesSection').show();
            });
        });
    </script>
@endsection
