<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::User()->usertype == 0) {
                $Doctor = Doctor::all();
                return view('user.home')->with('doctor', $Doctor);
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }
    public function index()
    {

        if (Auth::id()) {
            return redirect("home");
        } else {
            $Doctor = Doctor::all();
            return view('user.home')->with('doctor', $Doctor);
        }
    }
    public function appointment(Request $request)
    {
        $data = new appointment;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->doctor = $request->departement;
        $data->status = 'in progress';
        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', 'appointment booked successful ...waiting approval');
    }
    public function my_appointment()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $appoint = appointment::where('user_id', $userid)->get();
            return view('user.my_appointment')->with('appoint', $appoint);
        } else {
            return redirect()->back();
        }
    }
    public function cancel_appointment($id)
    {
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
