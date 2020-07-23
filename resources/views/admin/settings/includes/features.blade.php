<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <h3 class="tile-title">Features Settings</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="site_name">Feature Title 1</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Feature's Title"
                    id="feature_title_1"
                    name="feature_title_1"
                    value="{{ config('settings.feature_title_1') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="footer_copyright_text">Feature Description 1</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter Feature Description"
                    id="feature_info_1"
                    name="feature_subtitle_1"
                >{{ config('settings.feature_subtitle_1') }}</textarea>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    @if (config('settings.feature_icon_1') != null)
                        <img src="{{ asset('public/storage/'.config('settings.feature_icon_1')) }}" id="feature1Img" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="feature1Img" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label class="control-label">Feature 1 Image</label>
                        <input class="form-control" type="file" name="feature_icon_1" onchange="loadFile(event,'feature1Img')"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label" for="site_name">Feature Title 2</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Feature's Title"
                    id="feature_title_2"
                    name="feature_title_2"
                    value="{{ config('settings.feature_title_2') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="footer_copyright_text">Feature Description 2</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter Feature Description"
                    id="feature_info_2"
                    name="feature_subtitle_2"
                >{{ config('settings.feature_subtitle_2') }}</textarea>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    @if (config('settings.feature_icon_2') != null)
                        <img src="{{ asset('public/storage/'.config('settings.feature_icon_2')) }}" id="feature2Img" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="feature2Img" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label class="control-label">Feature 2 Image</label>
                        <input class="form-control" type="file" name="feature_icon_2" onchange="loadFile(event,'feature2Img')"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="site_name">Feature Title 3</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Feature's Title"
                    id="feature_title_3"
                    name="feature_title_3"
                    value="{{ config('settings.feature_title_3') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="footer_copyright_text">Feature Description 3</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter Feature Description"
                    id="feature_info_3"
                    name="feature_subtitle_3"
                >{{ config('settings.feature_subtitle_3') }}</textarea>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    @if (config('settings.feature_icon_3') != null)
                        <img src="{{ asset('public/storage/'.config('settings.feature_icon_3')) }}" id="feature3Img" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="feature3Img" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label class="control-label">Feature 3 Image</label>
                        <input class="form-control" type="file" name="feature_icon_3" onchange="loadFile(event,'feature3Img')"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="site_name">Feature Title 4</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Feature's Title"
                    id="feature_title_4"
                    name="feature_title_4"
                    value="{{ config('settings.feature_title_4') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="footer_copyright_text">Feature Description 4</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter Feature Description"
                    id="feature_info_4"
                    name="feature_subtitle_4"
                >{{ config('settings.feature_subtitle_4') }}</textarea>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    @if (config('settings.feature_icon_4') != null)
                        <img src="{{ asset('public/storage/'.config('settings.feature_icon_4')) }}" id="feature4Img" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="feature4Img" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label class="control-label">Feature 4 Image</label>
                        <input class="form-control" type="file" name="feature_icon_4" onchange="loadFile(event,'feature4Img')"/>
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
