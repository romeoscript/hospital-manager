<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AdminController extends Controller
{
    public function add_view()
    {
        return view('admin.add_doctor');
    }
    public function upload(Request $request)
    {
        $doctor = new Doctor;
        $image = $request->file;
        $imagename = time() . '.' . $image->getClientoriginalExtension();
        $request->file->move('doctorimage', $imagename);
        $doctor->image=$imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->specialty = $request->specialty;
        $doctor->room = $request->room;
        $doctor->save();
        return redirect()->back()->with('message','doctor added successfully');
    }
    public function show_appointment(){
        $data = appointment::all();
        return view('admin.show_appointment')->with("appoint",$data);
    }
    public function approve($id){
        $data = appointment::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }
    public function cancel($id){
        $data = appointment::find($id);
        $data->status = 'canceled';
        $data->save();
        return redirect()->back();
    }
    public function show_doctor(){
        $data = Doctor::all();
        return view('admin.show_doctor')->with('data',$data);
    }
    public function delete($id){

        $data = Doctor::find($id);
       $data->delete();
       return redirect()->back();
    }
    public function update($id){
        $data = Doctor::find($id);
        return view('admin.update_doctor')->with('data',$data);
    }
    public function update_doctor($id,Request $request ){
        $data = Doctor::find($id);
        $data->name = $request->name;
        $data->phone = $request->number;
        $data->specialty = $request->specialty;
        $data->room = $request->room;
        $image = $request->file;
        if ($image) {
            $imagename = time() . '.' . $image->getClientoriginalExtension();
            $request->file->move('doctorimage', $imagename);
            $data->image=$imagename;
        }
       
        $data->save();
        return redirect()->back()->with('message','details updated successfully');
        
    }
}
