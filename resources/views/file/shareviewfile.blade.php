@extends('layouts.admin')
@section('title', __('View File '))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a hrefspecified="{{ route('file.index') }}">{{ __('File') }}</a></li>
        <li class="breadcrumb-item">{{ __('View') }}
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="section-body">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('View File') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row" id="create-options">
                            <div class="col-md-6">
                                <div class="row">
                                    <h5>File Description</h5>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Department Name</label>
                                            <input type="text" class="form-control" value="{{ $viewfile->department->name }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Section Name</label>
                                            <input type="text" class="form-control" value="{{ $viewfile->section->name }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Notify</label>
                                            <input type="text" class="form-control" value="{{ $viewfile->notifyby }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">DueDate</label>
                                            <input type="text" class="form-control" value="{{ $viewfile->notifyby }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Priority</label>
                                            <input type="text" class="form-control" value="{{ $viewfile->priority }}"
                                            disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Remarks</label>
                                            <input type="text" class="form-control" value="{{ $viewfile->remarks }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Green Notes:{!! $notes->description !!}</label>
                                    @error('title')
                                        <span class="invalid-title" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="receipttable">
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
                                                <td>{{ $correspondence->dairy_date }}</td>
                                                <td>{{ $correspondence->subject }}</td>
                                                <td>{{ $correspondence->receved_date }}</td>
                                                <td>{{ $correspondence->letter_ref_no }}</td>
                                                <td>{{ $correspondence->remarks }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <a href="{{ route('share.index') }}" data-bs-toggle="modal"
                                        data-bs-target="#commentModal" class="btn btn-danger mb-3">{{ __('Revert') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary mb-3">{{ __('Foreward') }}</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('#commentForm').submit(function(event) {
                event.preventDefault();
                let commentText = $('#commentText').val();
                var share_id = $('#share_id').val();
                // console.log(share_id);
                $.ajax({
                    url: '{{ route('comments.store') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        comment: commentText,
                        share_Id: share_id
                    },
                    success: function(response) {
                        $('#commentModal').modal('hide');
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors.comment) {
                            alert(errors.comment[0]);
                        }
                    }
                });
            });
        });
    </script>

@endsection
