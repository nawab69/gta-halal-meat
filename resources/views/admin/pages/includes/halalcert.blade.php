<div class="tile">
    <form action="{{ route('admin.pages.halal') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Halal Certification</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <textarea
                    class="form-control"
                    rows="10"
                    placeholder="Enter Halal Certification"
                    id="halal_us"
                    name="halal"
                >{!! $halal !!} </textarea>
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
