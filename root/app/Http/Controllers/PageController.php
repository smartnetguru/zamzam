<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Repositories\PageRepository;
use App\Vehicles;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * @var PageRepository
     */
    private $repository;

    public function __construct(PageRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $title = 'HOME';
        $repository = $this->repository;
        $employees = Employee::where('license_expire', '<', Carbon::now()->addDays(30))->orWhere('visa_expire','<',Carbon::now()->addDays(30))->get();
        $vehicles = Vehicles::where('registration_expire', '<', Carbon::now()->addDays(30))->get();
        return view('pages.home',compact('title','employees','vehicles','repository'));
    }

}
