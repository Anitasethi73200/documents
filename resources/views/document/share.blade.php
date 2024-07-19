@extends('layouts.admin')
@section('title', __('Share Document'))
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a hrefspecified="{{ route('document.index') }}">{{ __('Document') }}</a></li>
    <li class="breadcrumb-item">{{ __('Share') }}
    </li>
</ul>
@endsection
@section('content')
<div class="row">
    <div class="section-body">
        <div class="col-md-10 m-auto">
            <div class="card ">
                <div class="card-header">
                    <h5>{{ __('Share Document') }}</h5>
                </div>
                <form action="{{route('store.share')}}" method="post">
                    <input type="hidden" name="doc_id" value="{{ $id }}">
                    <input type="hidden" name="file_id" value="{{$file->id}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('file_id', __('Share With')) }}
                            <select name="sharetype" id="sharetype" class="form-control">
                                <option value="">Select DocumentType</option>
                                <option value="role">Role</option>
                                <option value="user">User</option>
                            </select>
                            @error('Share With')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="status" value="1" checked>View
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="0">Edit
                            </label>
                        </div>
                        <div id="upload-options" style="display:none;">
                            <div class="form-group">
                                {{ Form::label('department_id', __('Department')), ['class' => 'form-label'] }}
                                <select name="department_id" id="department" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach($department as $departments)
                                    <option value="{{ $departments->id }}">{{ $departments->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::label('section_id', __('Section')) , ['class' => 'form-label']}}
                                <select name="section_id" id="section" class="form-control">
                                    <option value="">Select Section</option>
                                </select>
                                @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::label('user', __('Userlist')), ['class' => 'form-label'] }}
                                <select name="user" id="user" class="form-control">
                                    <option value="">Select User</option>

                                </select>
                                @error('User_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div id="create-options" style="display:none;">
                            <div class="form-group">
                                {{ Form::label('role', __('Role list')), ['class' => 'form-label'] }}
                                <select name="role" id="role" class="form-control">
                                    <option value="">Select Roll</option>
                                    @foreach($roll as $rolls)
                                    <option value="{{ $rolls->id }}">{{ $rolls->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-end">
                                <a href="{{ route('document.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary mb-3">{{ __('Share') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#sharetype').change(function() {
            var doctype = this.value;
            if (doctype === 'role') {
                $('#create-options').show();
                $('#upload-options').hide();
            } else if (doctype === 'user') {
                $('#create-options').hide();
                $('#upload-options').show();
            } else {
                $('#create-options').hide();
                $('#upload-options').hide();
            }
        });
    });
    $('#department').change(function() {
        var departmentId = $(this).val();
        $.ajax({
            url: "{{url('get-section')}}",
            type: 'GET',
            data: {
                department_id: departmentId,
            },
            success: function(response) {
                // console.log(response);
                var sections = response;
                $('#section').empty();
                $('#section').html('<option value="">Select Section</option>');
                $.each(sections, function(index, section) {
                    $('#section').append('<option value="' + section.id + '">' + section.name + '</option>');
                });
            },
            error: function(xhr, status, error) {

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
                // console.log(response);
                var users = response;
                $('#user').empty();
                $('#user').html('<option value="">Select User</option>');
                $.each(users, function(index, user) {
                    $('#user').append('<option value="' + user.id + '">' + user.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>
@endsection
