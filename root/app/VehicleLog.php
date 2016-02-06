<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class VehicleLog extends Model
{
    /**
     * Table name associated with this model
     * @var string
     */
    protected $table = 'vehicle_log';

    /**
     * List of columns which could be mass assignment
     * @var array
     */
    protected $fillable = [
        'bid',
        'date',
        'driver',
        'client',
        'status',
        'action',
        'description'
    ];

    /**
     * Set associated input box as a carbon instance
     * Created by smartrahat Date: 30.10.2015 Time: 9:55AM
     * @var array
     */
    protected $dates = ['date'];

    /**
     * <p>Set associated input box as carbon parse date
     * with following date format</p>
     * Created by smartrahat Date: 30.10.2015 Time: 9:57AM
     * @param $date
     */
    public function setAssignDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date)->format('Y-m-d');
    }
}