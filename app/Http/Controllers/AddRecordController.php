<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddRecord;
use DB;

class AddRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('save-record');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveRecord(Request $request)
    {
        //
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);
        // $email = $request->input('email');
        // $name = $request->input('name');
        // $joindate = $request->input('joindate');
        // $leavedate = $request->input('leavedate');
        // $working = $request->input('working');
        //$image = $request->input('image');
        $data = $request->input();
        $emp = new AddRecord;
        $emp->email = $data['email'];
        $emp->name = $data['name'];
        $emp->joindate = $data['joindate'];
        $emp->leavedate = $data['leavedate'];
        if(!empty($data['working'])){
            $emp->working = $data['working'];
        }else{
            $emp->working = 0;
        }
        $emp->image = $imageName;
        $emp->save();
        echo "Record added sucessfully....";
        //DB::insert('insert into emp_records (email,name,joindate,leavedate,working,image) values(?)',[$email,$name,$joindate,$leavedate,$working,$imageName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showRecords()
    {
        //
        $dataShow = DB::select("SELECT id,email,name,image,  
        convert(TIMESTAMPDIFF(YEAR,joindate,leavedate), CHARACTER) as y,
        convert(TIMESTAMPDIFF(MONTH,joindate,leavedate)%12, CHARACTER) as m
        from emp_records where deleted=0");
        return view('add-new',['dataShow' => $dataShow]);
    }

    public function deleteRecords($ID)
    {
        //
        echo $ID;
        $deleteRecord = AddRecord::where('id', $ID)->update(array('deleted' => 1));
        return redirect('/');
    }
}
