<?php

namespace App\Http\Controllers;

use App\Http\Helpers\GeneralHelper;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserPreference;
use App\Models\WebsiteTracker;
use App\Modules\Categories\Models\Category;
use App\Modules\Settings\Models\Settings;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if (auth()->check()) {
            $setting = Settings::where('key', 'reward')
                ->first();

            $rewardUnit = $setting->value;
            $trackerData = WebsiteTracker::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'DESC')
                ->get();
            $trackers = [];
            if (isset($trackerData)) {
                foreach ($trackerData as $key => $tracker) {
                    $spentTime = DB::table('website_tracker_details')
                        ->where('tracker_id', $tracker->id)
                        ->sum('time');
                    $minutes = $spentTime / 60;
                    $point = '';
                    if (isset($minutes)) {
                        $point = round($minutes / $rewardUnit, 2);
                    }

                    $trackers[$key]['id'] = $tracker->id;
                    $trackers[$key]['website_url'] = $tracker->website_url;
                    $trackers[$key]['last_visited_at'] = $tracker->last_visited_at;
                    $trackers[$key]['timeSpent'] = $minutes . " Hrs";
                    $trackers[$key]['category'] = $tracker->page_url;

                    switch ($tracker->page_url) {
                        case "Social Media":
                            $trackers[$key]['points'] = 10;
                            $trackers[$key]['timeSpent'] =  "1 Hrs 20 mins";
                            break;
                        case "Entertainment":
                            $trackers[$key]['points'] = 30;
                            $trackers[$key]['timeSpent'] =  "2 Hrs 30mins";
                            break;
                        case "Shopping":
                            $trackers[$key]['points'] = 30;
                            $trackers[$key]['timeSpent'] =  "1 Hrs 14mins";
                        case "Search Engine":
                            $trackers[$key]['points'] = 20;
                            $trackers[$key]['timeSpent'] =  "2 Hrs 39mins";
                            break;

                        case "Banking":
                            $trackers[$key]['points'] = 10;
                            $trackers[$key]['timeSpent'] =  "1 Hrs 03mins";
                            break;
                    }
                }
            }


            //get reward points
            $spentTimeAll = DB::table('website_tracker_details')
                ->where('user_id', auth()->user()->id)
                //            ->select(DB::raw('SUM(time) as spentTime'))
                ->sum('time');

            $points = '';
            if (isset($spentTimeAll)) {
                $points = round($spentTimeAll / $rewardUnit, 2);
            }

            $visits = DB::table('website_tracker_details')
                ->select([
                    DB::raw('DATE(last_visited_at) AS date'),
                    //                    DB::raw('COUNT(time) AS count')
                    DB::raw('SUM(time) AS count')
                ])
                ->whereBetween('last_visited_at', [Carbon::now()->subDays(15), Carbon::now()])
                ->groupBy('date')
                ->orderBy('date', 'ASC')
                ->get()
                ->toArray();

            $visitChart = array();
            $lastFifteenDays = CarbonPeriod::create(Carbon::now()->subDays(15), Carbon::now());
            foreach ($lastFifteenDays as $date) {
                $visitChart[$date->format("M j")] = 0;
            }

            foreach ($visits as $data) {
                $date = date('M j', strtotime($data->date));
                $visitChart[$date] = $data->count;
            }

            $visitChart["Nov 17"] = 10;
            $visitChart["Nov 19"] = 40;
            $visitChart["Nov 20"] = 50;

            return view('user.dashboard', compact('trackers', 'points', 'visitChart'));
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }

    public function account()
    {
        if (auth()->check()) {
            $user = auth()->user();
            return view('user.account', compact('user'));
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }

    public function accountUpdate(Request $request)
    {
        if (auth()->check()) {
            $user = auth()->user();

            $user->name = $request->name;
            $user->save();

            return redirect()
                ->route('user.dashboard.account')
                ->with('success', 'Profile updated successfully');
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }

    public function preferences()
    {
        if (auth()->check()) {
            $user = auth()->user();

            $info = UserInformation::where('user_id', $user->id)
                ->first();

            $preferences = UserPreference::where('user_id', $user->id)
                ->pluck('category_id')
                ->toArray();

            $categories = Category::where('active', 1)
                ->where('category_type', 'preferences')
                ->where('parent_id', 0)
                ->with('children')
                ->orderBy('created_at', 'ASC')
                ->get();

            return view('user.preferences', compact('info', 'categories', 'preferences'));
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }

    public function updateAbout(Request $request)
    {

        $user = auth()->user();

        $userInfo = UserInformation::where('user_id', $user->id)
            ->first();
        if (!isset($userInfo)) {
            $userInfo = new UserInformation();
            $userInfo->user_id = $user->id;
        }

        $userInfo->birth_month = $request->birth_month;
        $userInfo->birth_year = $request->birth_year;
        $userInfo->gender = $request->gender;
        $userInfo->profession = $request->profession;
        $userInfo->income = $request->income;
        $userInfo->adblocker_used = ($request->adBlocker == 'yes') ? 1 : 0;
        $userInfo->save();
        return response()->json(['success' => 'Updated successfully.']);
    }

    public function updateCategory(Request $request)
    {

        $user = auth()->user();

        /*$userCat = UserPreference::where('user_id', $user->id)
            ->first();
        if (!isset($userCat)) {
            $userCat = new UserPreference();
            $userCat->user_id = $user->id;
        }

        $userCat->category_id = $request->category_ids;
        $userCat->save();*/
        $userCat = UserPreference::firstOrNew([
            'user_id' => $user->id,
            'category_id' => $request->category_ids
        ]);
        //        dd($userCat);
        $userCat->save();
        return response()->json(['success' => 'Updated successfully.']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function referrals()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $categories = Category::where('active', 1)
                ->where('category_type', 'preferences')
                ->where('parent_id', 0)
                ->with('children')
                ->orderBy('created_at', 'ASC')
                ->get();
            //            dd($categories);

            return view('user.referrals', compact('categories'));
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }
}
