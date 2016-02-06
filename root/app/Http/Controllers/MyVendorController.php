<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyVendorRequest;
use App\MyVendor;
use App\Repositories\VendorRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MyVendorController extends Controller
{

    /**
     * @var VendorRepository
     */
    private $repository;

    public function __construct(VendorRepository $repository)
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
        $title = 'VENDOR';
        if(Input::has('vid')){
            $vid = Input::get('vid');
            $vendors = MyVendor::where('vid',$vid)->paginate(10);
        }elseif(Input::has('name')){
            $name = Input::get('name');
            $vendors = MyVendor::where('name','like','%'.$name.'%')->paginate(10);
        }elseif(Input::has('type')){
            $type = Input::get('type');
            $vendors = MyVendor::where('type','like','%'.$type.'%')->paginate(10);
        }elseif(Input::has('address')){
            $address = Input::get('address');
            $vendors = MyVendor::where('address','like','%'.$address.'%')
                ->orWhere('state','like','%'.$address.'%')
                ->orWhere('city','like','%'.$address.'%')
                ->orWhere('country','like','%'.$address.'%')->paginate(10);
        }elseif(Input::has('contact_person')){
            $contact_person = Input::get('contact_person');
            $vendors = MyVendor::where('contact_person','like','%'.$contact_person.'%')->paginate(10);
        }
        else{
            $vendors = MyVendor::paginate(10);
        }
        return view('myVendor/index',compact('title','vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = 'ADD NEW VENDOR';
        $repository = $this->repository;
        return view('myVendor.create',compact('title','repository'));
    }

    /**
     * Store a newly created Vendor in storage
     * @param MyVendorRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MyVendorRequest $request)
    {
        if($request->hasFile('logo')){
            $image_name = $request['vid'].'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(base_path().'/resources/assets/images/vendor',$image_name);
            $data = $request->except('logo');
            $data['logo'] = $image_name;
            MyVendor::create($data);
        }else{
            MyVendor::create($request->all());
        }
        Session::flash('success_message','Vendor has been created successfully!');
        return redirect('vendor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $vendor = MyVendor::findOrFail($id);
        $title = $vendor->name;
        return view('myVendor.show',compact('title','vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $title = 'EDIT VENDOR';
        $vendor = MyVendor::findOrFail($id);
        $repository = $this->repository;
        return view('myVendor.edit',compact('title','vendor','repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MyVendorRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(MyVendorRequest $request, $id)
    {
        $vendor = MyVendor::findOrFail($id);
        if($request->hasFile('logo')){
            $image_name = $vendor->id.'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(base_path().'/resources/assets/images/vendor', $image_name);
            $data = $request->except('logo');
            $data['logo'] = $image_name;
            $vendor->update($data);
        }else{
            $vendor->update($request->except('logo'));
        }
        Session::flash('success_message','Vendor Updated Successfully');
        return redirect('vendor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        MyVendor::where('id',$id)->delete();
        Session::flash('success_message','Vendor has been deleted successfully!!!');
        return redirect('vendor');
    }
}
