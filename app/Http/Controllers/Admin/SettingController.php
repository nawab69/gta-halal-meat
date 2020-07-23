<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\BaseController;

/**
 * Class SettingController
 * @package App\Http\Controllers\Admin
 */
class SettingController extends BaseController
{
    use UploadAble;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->setPageTitle('Settings', 'Manage Settings');
        return view('admin.settings.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {


        if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {
            if (config('settings.site_logo') != null) {
                $this->deleteOne(config('settings.site_logo'));
            }
            $logo = $this->uploadOne($request->file('site_logo'), 'img');
            Setting::set('site_logo', $logo);

        }
        if ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {

            if (config('settings.site_favicon') != null) {
                $this->deleteOne(config('settings.site_favicon'));
            }
            $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
            Setting::set('site_favicon', $favicon);

        }
        if ($request->has('feature_icon_1') && ($request->file('feature_icon_1') instanceof UploadedFile)) {

            if (config('settings.feature_icon_1') != null) {
                $this->deleteOne(config('settings.feature_icon_1'));
            }
            $feature_icon_1 = $this->uploadOne($request->file('feature_icon_1'), 'img');
            Setting::set('feature_icon_1', $feature_icon_1);

        }
        if ($request->has('feature_icon_4') && ($request->file('feature_icon_4') instanceof UploadedFile)) {

            if (config('settings.feature_icon_4') != null) {
                $this->deleteOne(config('settings.feature_icon_4'));
            }
            $feature_icon_4 = $this->uploadOne($request->file('feature_icon_4'), 'img');
            Setting::set('feature_icon_4', $feature_icon_4);

        }
        if ($request->has('feature_icon_2') && ($request->file('feature_icon_2') instanceof UploadedFile)) {

            if (config('settings.feature_icon_2') != null) {
                $this->deleteOne(config('settings.feature_icon_2'));
            }
            $feature_icon_2 = $this->uploadOne($request->file('feature_icon_2'), 'img');
            Setting::set('feature_icon_2', $feature_icon_2);

        }
        if ($request->has('feature_icon_3') && ($request->file('feature_icon_3') instanceof UploadedFile)) {

            if (config('settings.feature_icon_3') != null) {
                $this->deleteOne(config('settings.feature_icon_3'));
            }
            $feature_icon_3 = $this->uploadOne($request->file('feature_icon_3'), 'img');
            Setting::set('feature_icon_3', $feature_icon_3);
        }

        if ($request->has('video') && ($request->file('video') instanceof UploadedFile)) {

            if (config('settings.video') != null) {
                $this->deleteOne(config('settings.video'));
            }
            $video = $this->uploadOne($request->file('video'), 'video');
            Setting::set('video', $video);
        }

        if($request) {

                $keys = $request->except('_token','site_logo','site_favicon','feature_icon_1','feature_icon_2','feature_icon_3','feature_icon_4');

                foreach ($keys as $key => $value) {
                    Setting::set($key, $value);
                }
            }
            return $this->responseRedirectBack('Settings updated successfully.', 'success');
        }

}

