<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <h3 class="tile-title">Site Banner</h3>
        <hr>
        <div class="tile-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">Banner Type</label>

                            <select class="form-control" name="banner" id="banner">
                                <option value="image">Image Banner</option>
                                <option value="video">Video Banner</option>
                            </select>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">Banner Video</label>
                        <input class="form-control" type="file" name="video" onchange="loadFile(event,'video')"/>
                    </div>
                </div>
            </div>

        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                </div>
            </div>
        </div>
    </form>
</div>
@push('scripts')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
