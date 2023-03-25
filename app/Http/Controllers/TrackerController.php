<?php

namespace App\Http\Controllers;

use App\Models\WebsiteTracker;
use App\Models\WebsiteTrackerDetail;
use App\Modules\Settings\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackerController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function trackTimeSpent(Request $request)
    {
        $data = (object) $request->all();
//        dd($data->postData['url']);
        $tracker = WebsiteTracker::where('website_url', $data->postData['url'])
            ->first();
        if (!isset($tracker)) {
            $tracker = new WebsiteTracker();
        }
        $tracker->user_id = $data->postData['userId'];
        $tracker->website_url = $data->postData['url'];
        $tracker->time = $data->postData['totalTimeSpent'];
        $tracker->last_visited_at = date('Y-m-d H:i:s');
        $tracker->save();
        //insert to detail
        /*$trackerDetail = WebsiteTrackerDetail::where('tracker_id', $tracker->id)
            ->first();
        if (!isset($tracker)) {
            $trackerDetail = new WebsiteTracker();
        }*/
        $trackerDetail = new WebsiteTrackerDetail();
        $trackerDetail->tracker_id = $tracker->id;
        $trackerDetail->user_id = $data->postData['userId'];
        $trackerDetail->time = $data->postData['totalTimeSpent'];
        $trackerDetail->last_visited_at = date('Y-m-d H:i:s');
        $trackerDetail->save();

        return json_encode([
            'success' => true,
            'message' => 'Tracking saved successfully.'
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function getRewardPoints(Request $request)
    {
        $setting = Settings::where('key', 'reward')
            ->first();

        $rewardUnit = $setting->value;
        //get reward points
        $spentTime = DB::table('website_tracker_details')
            ->where('user_id', $request->user_id)
//            ->select(DB::raw('SUM(time) as spentTime'))
            ->sum('time');

        $points = '';
        if (isset($spentTime)) {
            $points = round($spentTime / $rewardUnit, 2);
        }

        return json_encode([
            'success' => true,
            'points' => $points,
            'message' => 'Reward points.'
        ]);
    }


}
