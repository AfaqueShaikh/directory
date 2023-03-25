<?php

namespace App\Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Settings\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site_title = Settings::find(1)->value;
        $reward = Settings::find(2)->value;

        return view('Settings::index', compact('site_title',
            'reward'
        ));
    }

    public function updateSettings(Request $request)
    {
        $request->validate(
            [
                'site_title' => 'required',
                'reward' => 'required'
            ]
        );

        $name = $request->site_title;
        $reward = $request->reward;

        $siteTitleSetting = Settings::find(1);
        $rewardSetting = Settings::find(2);

        $siteTitleSetting->value = $name;
        $rewardSetting->value = $reward;

        $siteTitleSetting->save();
        $rewardSetting->save();

        return back()
            ->with('Setting updated successfully!!!');
    }

}
