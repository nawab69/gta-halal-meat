@extends('admin.app')
@section('title') Create Coupons @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> Create Coupons</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Add a new Coupon</h3>
                <form action="{{ route('admin.coupons.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body"><div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Coupon Code <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" id="ques" value="{{ old('code', $coupon->code) }}"/>
                            @error('code') {{ $message }} @enderror
                        </div>
                            <div class="form-group">
                                <label class="control-label" for="type">Coupon Type <span class="m-l-5 text-danger"> *</span></label>

                                <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                    <option selected>Please select an option</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Percentage</option>
                                    <option value="delivery">Free Delivery</option>
                                </select>
                                @error('code') {{ $message }} @enderror
                            </div>
                            <div class="form-group" id="dvalue">
                                <label class="control-label" for="value"> Discount Value (fixed) <span class="m-l-5 text-danger"> </span></label>
                                <input type="text" name="value" class="form-control" id="value">
                            </div>
                            <div class="form-group" id="dpercent">
                                <label class="control-label" for="percent"> Discount Percentage (%off) <span class="m-l-5 text-danger"> </span></label>
                                <input type="text" name="percent" class="form-control" id="percent">
                            </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Coupon</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.coupons.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

    <script>
        $(document).ready(function () {
            $('#dvalue').hide();
            $('#dpercent').hide();
            $("select").change(function () {
                let type = $( "select option:selected" ).val();
                if(type==='fixed'){
                    $('#dvalue').show();
                }else{
                    $('#dvalue').hide();
                }
                if(type==='percent'){
                   $('#dpercent').show();
                }else{
                    $('#dpercent').hide();
                }
            });
        });
    </script>
@endpush
