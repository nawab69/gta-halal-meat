@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary pull-right">Add Product</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{route('admin.products.updateAll')}}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>Category</th>
                            <th> SKU </th>
                            <th> Name </th>
                            <th class="text-center"> Description </th>
                            <th class="text-center"> Price </th>
                            <th class="text-center"> Sell Price </th>
                            <th class="text-center"> Quantity </th>
                            <th class="text-center"> Status </th>
                            <th class="text-center"> Featured </th>
                            <!--<th class="text-center"> Image </th>-->

                        </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td><input class="form-control" style="width: 50px" type="number" name="{{ $product->id }}[product_id]" value="{{ $product->id }}" readonly></td>
                                    <td>
                                        <select name="{{ $product->id }}[categories][]" id="categories" class="form-control">
                                            @foreach($categories as $category)
                                                @php $check = in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : ''@endphp
                                                <option value="{{ $category->id }}" {{ $check }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <input type="hidden" class="form-control" name="{{ $product->id }}[brand_id]" value="{{ $product->brand_id }}">
                                    <input type="hidden" class="form-control" name="{{ $product->id }}[weight]" value="{{ $product->weight }}">
                                    <td><input type="text" class="form-control" name="{{ $product->id }}[sku]" value="{{ $product->sku }}"></td>
                                    <td><input type="text" class="form-control" name="{{ $product->id }}[name]" value="{{ $product->name }}"></td>
                                    <td><input type="text" class="form-control" name="{{ $product->id }}[description]" value="{{ $product->description }}"></td>
                                    <td><input type="text" class="form-control" name="{{ $product->id }}[price]" value="{{ $product->price }}"></td>
                                    <td><input type="text" class="form-control" name="{{ $product->id }}[sale_price]" value="{{ $product->sale_price }}"></td>
                                    <td><input type="text" class="form-control" name="{{ $product->id }}[quantity]" value="{{ $product->quantity }}"></td>
                                    <td class="text-center">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="status"
                                               name="{{$product->id}}[status]"
                                            {{ $product->status == 1 ? 'checked' : '' }}
                                        />
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="featured"
                                               name="{{$product->id}}[featured]"
                                            {{ $product->featured == 1 ? 'checked' : '' }}
                                        />
                                    </td>
                                    <!--<td><input class="form-control" type="file" name="{{ $product->id }}[image]"/></td>-->
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                        <button class="btn btn-block btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('public/backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
{{--    <script type="text/javascript">$('#sampleTable').DataTable();</script>--}}
@endpush
