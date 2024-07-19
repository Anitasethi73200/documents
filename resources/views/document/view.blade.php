@extends('layouts.admin')
@section('title', __('View Document '))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a hrefspecified="{{ route('document.index') }}">{{ __('Document') }}</a></li>
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
                        <h5>{{ __('View Document') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('file_id', __('filename')) }}
                            <select name="file_id" id="file_id" class="form-control" readonly>
                                <option value="">Select File</option>
                                @foreach ($file as $files)
                                    <option value="{{ $files->id }}" @if ($file_detail->file_id == $files->id) selected @endif>
                                        {{ $files->file_name }}</option>
                                @endforeach
                            </select>
                            @error('file_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('dtype', __('Document Type')) }}
                            <select name="dtype" id="dtype" class="form-control" readonly>
                                <option value="">Select Document Type</option>
                                <option value="create" @if ($document->dtype == 'create') selected @endif> Create
                                </option>
                                <option value="upload" @if ($document->dtype == 'upload') selected @endif>Upload
                                </option>
                            </select>
                            @error('dtype')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row" id="create-options">
                            <div class="col-md-6">
                                <div class="row">
                                    <h5>File Description</h5>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">File name</label>
                                            <input type="text" class="form-control" value="{{ $view->file_name }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">File No</label>
                                            <input type="text" class="form-control" value="{{ $view->fileno }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Category</label>
                                            <input type="text" class="form-control" value="{{ $view->Category->name }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">SubCategory</label>
                                            <input type="text" class="form-control"
                                                value="{{ $view->subcategory->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Department</label>
                                            <input type="text" class="form-control"
                                                value="{{ $view->Department->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Section</label>
                                            <input type="text" class="form-control" value="{{ $view->Section->name }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Document Title :{{ $document->file_name }}</label>
                                    @error('title')
                                        <span class="invalid-title" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <a href="{{ asset("public/$document->documentpath") }}"
                                        class="btn btn-primary">Download
                                        Document</a>
                                </div>
                            </div>
                            <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="commentModalLabel">Add Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="commentForm">
                                                <div class="mb-3">
                                                    <label for="commentText" class="form-label">Comment</label>
                                                    <textarea class="form-control" id="commentText" name="comment " rows="3" required> </textarea>
                                                </div>
                                                <input type="hidden" id="share_id" value="{{ $file_detail->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Comment</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
