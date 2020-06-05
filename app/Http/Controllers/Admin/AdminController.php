<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Admin::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route("admin.user.edit", $row->id).'" class="edit btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Edit</a>';
                        if($row->id != '1'){
                            $btn .= '  <form style="display:contents !important;" action="'.route('admin.user.destroy', $row->id) .'" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            '.csrf_field().'
                            <button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fas fa-trash"></i> Delete</button>
                            </form> ';
                        }
                        return $btn;
                    })->addColumn('image',function($row){
                        $image = asset("upload/admin/".$row->image);
                        return '<img class="rounded-circle" height="50" width="50" src='.$image.'>';
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('admin.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $imageName = "";
        if($request->has('image')){

            $imageName = uniqid()."_".time().".".$request->image->extension();

            $request->image->move(public_path('upload/admin'), $imageName);
            $request->image = $imageName;
        }
        $admin  = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        $admin->password = bcrypt($request->password);
        $admin->image = $imageName;

        if($admin->save()){
            return redirect()->route('admin.user.index')->with('message','User add successfully.');
        }else{
            return redirect()->back()->withErrors("Problem to add user.")->withInput();
        }
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
        $data = Admin::find($id);
        return view('admin.admin.edit',compact('data'));
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
        $isUpdate =  Admin::findOrFail($id)->update($request->all());
        if($isUpdate){
            return redirect()->route('admin.user.index')->with('message','User update successfully.');
        }else{
            return redirect()->back()->withErrors("Problem to update user.")->withInput();
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
        if(Admin::find($id)->delete()){
            return redirect()->back()->with('message','User delete successfully.');
        }
    }

    /**
     * Update login user password
     * @param  \Illuminate\Http\Request\ChangePasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(ChangePasswordRequest $request)
    {
        $loggedInUser = auth()->guard('admin')->user();
        $loggedInUser->password = bcrypt($request->password);
        $loggedInUser->save();
        return redirect()->back()->with('message','Password update successfully.');
    }
}
