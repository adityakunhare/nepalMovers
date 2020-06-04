<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = User::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route("admin.customer.edit", $row->id).'" class="edit btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Edit</a>';
                        $btn .= '  <form style="display:contents !important;" action="'.route('admin.customer.destroy', $row->id) .'" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        '.csrf_field().'
                        <button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="glyphicon glyphicon-trash"></i>Delete</button>
                        </form> ';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->back()->with('message','Customer create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.customer.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isUpdate =  User::findOrFail($id)->update($request->all());
        if($isUpdate){
            return redirect()->route('admin.customer.index')->with('message','Customer update successfully.');
        }else{
            return redirect()->back()->withErrors("Problem to update customer.")->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Customer::find($id)->delete()) {
            return redirect()->back()->with('message', 'User delete successfully.');
        }

    }
}
