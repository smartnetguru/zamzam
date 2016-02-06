<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteRequest;
use App\Repositories\RouteRepository;
use App\Routes;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class RouteController extends Controller
{
    /**
     * @var RouteRepository
     */
    private $repository;

    public function __construct(RouteRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = 'ROUTE MANAGEMENT';
        if(Input::has('client')){
            $client = Input::get('client');
            $routes = Routes::where('client','like','%'.$client.'%')->orderBy('id','desc')->paginate(10);
        }elseif(Input::has('vehicle')){
            $vehicle = Input::get('vehicle');
            $routes = Routes::where('vehicle','like','%'.$vehicle.'%')->orderBy('id','desc')->paginate(10);
        }elseif(Input::has('employee')){
            $employee = Input::get('employee');
            $routes = Routes::where('employee','like','%'.$employee.'%')->orderBy('id','desc')->paginate(10);
        }elseif(Input::has('start')&&Input::has('end')){
            $start = Input::get('start');
            $end = Input::get('end');
            $routes = Routes::whereBetween('date',[$start,$end])->orderBy('id','desc')->paginate(10);
        }elseif(Input::has('start')){
            $start = Input::get('start');
            $routes = Routes::where('date',$start)->orderBy('id','desc')->paginate(10);
        }elseif(Input::has('end')){
            $end = Input::get('end');
            $routes = Routes::where('date',$end)->orderBy('id','desc')->paginate(10);
        }else{
            $routes = Routes::orderBy('id','desc')->paginate(10);
        }
        $repository = $this->repository;
        return view('route.index',compact('title','routes','repository'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RouteRequest  $request
     * @return Response
     */
    public function store(RouteRequest $request)
    {
        Routes::create($request->all());
        Session::flash('success_message','Route Updated!!!');
        return redirect('route');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
