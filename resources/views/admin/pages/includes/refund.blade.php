<div class="tile">
    <form action="{{ route('admin.pages.refund') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Refund Policy</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <textarea
                    class="form-control"
                    rows="10"
                    placeholder="Enter Privacy Policy"
                    id="refund_us"
                    name="refund"
                >{!! $refund !!} </textarea>
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

