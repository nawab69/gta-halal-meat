
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    @if (\Session::has('failure'))
        <div class="alert alert-danger">
            <p>{{ \Session::get('failure') }}</p>
        </div><br />
    @endif
    <h2>Laravel Newsletter Tutorial With Example</h2><br/>
    <form method="post" action="{{url('store-newsletter')}}">
    @csrf

<div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-2">
        <label for="Email">Email:</label>
        <input type="text" class="form-control" name="email">
    </div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success">Subscribe</button>
    </div>
</div>
</form>

