<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <a href="{{ route('document.edit', $document->id) }}" class="dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>
        <a href="{{ route('document.share', $document->id) }}" class="dropdown-item">
            <i class="fa fa-share-alt"></i>{{ __('Share') }}
        </a>
        {{-- <div class="dropdown-divider"></div> --}}
        <a href="{{ route('document.index') }}" class="dropdown-item  text-danger" data-toggle="tooltip" data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $document->id }}')"><i class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['document.destroy', $document->id], 'id' => 'delete-form-' . $document->id]) !!}
        {!! Form::close() !!}
    </div>
</div>
