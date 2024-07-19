@extends('layouts.admin')
@section('title', __('File Share'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('file.index') }}">{{ __('Share') }}</a></li>
        <li class="breadcrumb-item">{{ __('Share') }}
        </li>
    </ul>
    <style>
        #pdf-viewer,
        #doc-viewer {
            width: 100%;
            height: 500px;
            border: 1px solid #ccc;
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="section-body col-lg-6" style="padding-right:0">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('File Create') }}</h5>
                    </div>
                    {{ Form::open(['route' => 'storefile.share', 'method' => 'post']) }}
                    <input type="hidden" name="file_id" id="file_id" value="{{ $file->id }}">
                    <input type="hidden" name="notes_id" id="notes_id" value="{{ $notes->id }}">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check">
                                <input type="radio" name="status" value="1" class="form-check-input" checked>
                                <label class="form-check-label">Internal</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            {{ Form::label('department_id', __('Department')), ['class' => 'form-label'] }}
                            <select name="department_id" id="department" class="form-control">
                                <option value="">Select Department</option>
                                @foreach ($department as $departments)
                                    <option value="{{ $departments->id }}">{{ $departments->name }}</option>
                                @endforeach

                            </select>
                            @error('department_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('section_id', __('Section')), ['class' => 'form-label'] }}
                            <select name="section_id" id="section" class="form-control">
                                <option value="">Select Section</option>
                            </select>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('user', __('TO')), ['class' => 'form-label'] }}
                            <select name="user" id="user" class="form-control">
                                <option value="">Select User</option>

                            </select>
                            @error('User_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notify Through</label>
                            <div class="form-check">
                                <input type="radio" name="notify" value="email" class="form-check-input" checked>
                                <label class="form-check-label">Email</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="notify" value="sms" class="form-check-input">
                                <label class="form-check-label">SMS</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            {{ Form::label('remarks', __('Remarks'), ['class' => 'form-label']) }}
                            {{ Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => '']) }}
                            @error('remarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('duedate', __('Set Due Date'), ['class' => 'form-label']) }}
                            {{ Form::date('duedate', null, ['class' => 'form-control']) }}
                            @error('duedate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('action', __('Action'), ['class' => 'form-label']) }}
                            {{ Form::select('action', ['view' => 'view', 'edit' => 'edit'], null, ['class' => 'form-select', 'placeholder' => 'Select Action']) }}
                        </div>

                        <div class="mb-3">
                            {{ Form::label('priority', __('Priority'), ['class' => 'form-label']) }}
                            {{ Form::select('priority', ['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], null, ['class' => 'form-select', 'placeholder' => 'Select Priority']) }}
                            @error('priority')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Send') }}</button>
                            <br>
                            <a href="{{ route('file.index') }}" type="submit"
                                class="btn btn-success mb-3">{{ __('Revert') }}</a>
                        </div>

                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="section-body col-lg-6" style="padding-right:0">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="receipttable">
                                    <thead>
                                        <tr>
                                            <th>{{ __('File/Receipt.No') }}</th>
                                            <th>{{ __('Subject') }}</th>
                                            <th>{{ __('NoteType') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($fileview as $fileviews)
                                            <tr>
                                                <th scope="row">{{ $fileviews->fileshare->fileno }}</th>
                                                <td>{{ $fileviews->remarks }}</td>
                                                <td>{{ $fileviews->gnotes_id }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body col-lg-12" style="padding-right:0">
                <div class="col-md-12 m-auto">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row-20">
                                    {{ Form::label('description', __('Current Note')) }}
                                    {{ Form::textarea('description', $notes->description, ['class' => 'form-control', 'id' => 'description', 'placeholder' => __('Enter Description'), 'rows' => '16']) }}
                                    @error('description')
                                        <span class="invalid-name" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>
    {!! Form::close() !!}



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    </script>
    <script>
        $(document).ready(function() {
            $('#department').change(function() {
                var departmentId = $(this).val();
                $.ajax({
                    url: "{{ url('get-section') }}",
                    type: 'GET',
                    data: {
                        department_id: departmentId,
                    },
                    success: function(response) {
                        var sections = response;
                        $('#section').empty();
                        $('#section').html('<option value="">Select Section</option>');
                        $.each(sections, function(index, section) {
                            $('#section').append('<option value="' + section.id + '">' +
                                section.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#section').change(function() {
                var sectionId = $(this).val();
                var departmentId = $('#department').val();
                $.ajax({
                    url: "{{ url('get-user') }}",
                    type: 'GET',
                    data: {
                        section_id: sectionId,
                        department_id: departmentId
                    },
                    success: function(response) {
                        var users = response;
                        $('#user').empty();
                        $('#user').html('<option value="">Select User</option>');
                        $.each(users, function(index, user) {
                            $('#user').append('<option value="' + user.id + '">' + user
                                .name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

@endsection
