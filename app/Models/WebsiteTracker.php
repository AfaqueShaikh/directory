<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteTracker extends Model {

    protected $table = 'website_trackers';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $with = ['trans'];

    /**
     * Translation relation.
     */
    public function trans()
    {
        return $this->hasMany(WebsiteTrackerDetail::class, 'tracker_id');
    }

    /**
     * Translation relation.
     */
    /*public function timeSpents()
    {
        return $this->hasMany(WebsiteTrackerDetail::class, 'tracker_id');
    }*/


}
