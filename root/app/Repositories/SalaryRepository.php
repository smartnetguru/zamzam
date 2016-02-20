<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 2016-1-3
 * Time: 8:08 PM
 */

namespace App\Repositories;


use App\Advance;
use App\Employee;
use App\Salary;
use App\Vehicles;
use Carbon\Carbon;

class SalaryRepository {

    /**
     * List all months of the english year
     * @return array
     */
    public function months()
    {
        return [
            'January' => 'January',
            'February' => 'February',
            'March' => 'March',
            'April' => 'April',
            'May' => 'may',
            'June' => 'June',
            'July' => 'July',
            'August' => 'August',
            'September' => 'September',
            'October' => 'October',
            'November' => 'November',
            'December' => 'December'
        ];
    }

    /**
     * List of years
     * @return array
     */
    public function years()
    {
        return [
            '2015' => '2015',
            '2016' => '2016',
            '2017' => '2017'
        ];
    }

    public function vehicles($eid)
    {
        $vehicle = Vehicles::all()->where('eid',$eid)->pluck('registration')->first();
        return $vehicle;
    }

    /**
     * Created by smartrahat Date 2016.01.15 Time: 5:24 PM
     * List all employees name
     * @return static
     */
    public function employees()
    {
        return [''=>'Select Employee ID'] + Employee::all()->lists('eid','eid')->toArray();
    }

    public function balance($eid)
    {
        $salary = Salary::all()->where('eid',$eid);
        $current = $salary->where('type','0')->where('month',Carbon::now()->subMonth(1)->format('F Y'))->pluck('total')->sum();
        $advanceDeduction = $this->advanceDeduction($eid);
        //dd($advanceDeduction);
        return ($salary->pluck('total')->sum() - ($salary->pluck('paid')->sum() + $advanceDeduction)) - $current;
    }

    public function payable($eid)
    {
        $basic = Salary::all()->where('eid',$eid)->pluck('basic')->first();
        $advanceDeduction = $this->advanceDeduction($eid);
        //dd($basic - 1000);
        //$t = $basic + $this->balance($eid) - $advanceDeduction;
        //dd($t);
        return $basic - ($advanceDeduction != null ? $advanceDeduction : 0);
    }

    public function advanceDeduction($eid)
    {
        $advanceDeduction = Advance::all()->where('eid',$eid)->where('effect_month',Carbon::now()->subMonth(1)->format('F Y'))->pluck('deduction_rate')->first();
        return $advanceDeduction != null ? $advanceDeduction : 0;
    }

    public function isAdvance($eid)
    {
        return Advance::all()->where('eid',$eid)->where('effect_month',Carbon::now()->subMonth(1)->format('F Y'))->pluck('total')->first();
    }

}