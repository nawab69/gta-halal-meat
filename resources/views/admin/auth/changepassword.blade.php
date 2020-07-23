@extends('admin.app')
@section('title','change Password')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Change Password</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Change Your Password</h3>
                <form action="{{ route('admin.update') }}" method="POST" role="form">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="text" name="password" id="password" value="{{ old('password') }}"/>
                            @error('password') {{ $message }} @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Change Admin Password </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

