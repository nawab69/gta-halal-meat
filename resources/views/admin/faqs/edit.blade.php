@extends('admin.app')
@section('title') Edit Faqs @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> Edit Faqs</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Edit Faqs</h3>
                <form action="{{ route('admin.faqs.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Question <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('ques') is-invalid @enderror" type="text" name="ques" id="ques" value="{{ old('ques', $faq->ques) }}"/>
                            <input type="hidden" name="id" value="{{ $faq->id }}">
                            @error('ques') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Answer <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('ans') is-invalid @enderror" type="text" name="ans" id="ans" value="{{ old('ans', $faq->ans) }}"/>
                            @error('ans') {{ $message }} @enderror
                        </div>

                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Faq</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.faqs.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
