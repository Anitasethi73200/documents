@extends('layouts.admin')
@section('title', __('Edit Document'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('document.index') }}">{{ __('Document') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit') }}</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="section-body">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Edit Document') }}</h5>
                    </div>
                    {{ Form::model($document, ['route' => ['document.update', $document->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
                    <input type="hidden" name="doc_id" value="{{ $document->id }}">
                    <input type="hidden" id="share_id" value="{{ $file_detail->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('file_id', __('Filename'), ['class' => 'form-label']) }}
                            <select name="file_id" id="file_id" class="form-control">
                                <option value="">Select File</option>
                                @foreach ($file as $files)
                                    <option value="{{ $files->id }}" @if ($document->file_id == $files->id) selected @endif>
                                        {{ $files->file_name }}</option>
                                @endforeach
                            </select>
                            @error('file_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('dtype', __('Document Type'), ['class' => 'form-label']) }}
                            <select name="dtype" id="dtype" class="form-control">
                                <option value="">Select Document Type</option>
                                <option value="create" @if ($document->dtype == 'create') selected @endif>Create</option>
                                <option value="upload" @if ($document->dtype == 'upload') selected @endif>Upload</option>
                            </select>
                            @error('dtype')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row" id="create-options"
                            @if ($document->dtype != 'create') style="display: none;" @endif>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('file_name', __('File Name'), ['class' => 'form-label']) }}
                                    <input type="text" class="form-control" value="{{ $file_detail->file_name }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('fileno', __('File No'), ['class' => 'form-label']) }}
                                    <input type="text" class="form-control" value="{{ $file_detail->fileno }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('category', __('Category'), ['class' => 'form-label']) }}
                                    <input type="text" class="form-control" value="{{ $file_detail->Category->name }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('subcategory', __('SubCategory'), ['class' => 'form-label']) }}
                                    <input type="text" class="form-control"
                                        value="{{ $file_detail->subcategory->name }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('department', __('Department'), ['class' => 'form-label']) }}
                                    <input type="text" class="form-control" value="{{ $file_detail->Department->name }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('section', __('Section'), ['class' => 'form-label']) }}
                                    <input type="text" class="form-control" value="{{ $file_detail->Section->name }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('title', __('Document Title'), ['class' => 'form-label']) }}
                                    {{ Form::text('title', $files->file_name, ['class' => 'form-control', 'id' => 'title', 'placeholder' => __('Enter File Title')]) }}
                                    @error('title')
                                        <span class="invalid-title" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {{ Form::label('comments', __('Comments'), ['class' => 'form-label']) }}
                                    {{ Form::text('comments', null, ['class' => 'form-control', 'id' => 'comments', 'placeholder' => __('Enter Comments')]) }}
                                    @error('comments')
                                        <span class="invalid-comments" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => __('Enter Description'), 'rows' => '8']) }}
                                    @error('description')
                                        <span class="invalid-description" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="upload-options" @if ($document->dtype != 'upload') style="display: none;" @endif>
                            <div class="form-group">
                                {{ Form::label('documentpath', __('Document'), ['class' => 'form-label']) }}
                                {{ Form::file('documentpath', null, ['class' => 'form-control']) }}
                                @error('documentpath')
                                    <span class="invalid-documentpath" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('share.index') }}" class="btn btn-success mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Update') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
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

        $(document).ready(function() {
            $('#dtype').change(function() {
                var dtype = $(this).val();
                if (dtype == 'create') {
                    $('#create-options').show();
                    $('#upload-options').hide();
                } else if (dtype == 'upload') {
                    $('#create-options').hide();
                    $('#upload-options').show();
                } else {
                    $('#create-options').hide();
                    $('#upload-options').hide();
                }
            });
        });
    </script>
@endsection
