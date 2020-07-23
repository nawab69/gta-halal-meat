<div class="tile">
    <form action="{{ route('admin.pages.terms') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Terms and Conditions</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <textarea
                    class="form-control"
                    rows="10"
                    placeholder="Enter Terms and Conditions"
                    id="terms_us"
                    name="terms"
                >{!! $terms !!} </textarea>
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Page</button>
                </div>
            </div>
        </div>
    </form>
</div>
