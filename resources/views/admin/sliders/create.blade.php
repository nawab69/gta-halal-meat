@extends('admin.app')
@section('title') Sliders @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Sliders</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Add new Sliders</h3>
                <form action="{{ route('admin.sliders.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">SubTitle</label>
                            <textarea class="form-control" rows="2" name="subtitle" id="description">{{ old('subtitle') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="button">Button <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('button') is-invalid @enderror" type="text" name="button" id="button" value="{{ old('button') }}"/>
                            @error('button') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="link">Button Link <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" id="link" value="{{ old('link') }}"/>
                            @error('link') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Slider Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Slider</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.sliders.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
