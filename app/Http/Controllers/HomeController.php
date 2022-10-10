<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = doctor::all();
                return view('user.home', compact('doctor'));
            }

            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect ('home');
        }
        else
        {
        $doctor = doctor::all();
        return view('user.home',compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {
        $data = new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->number;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='In Progress';

        if (Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }
        
       $data->save();

       return redirect()->back()->with('message','Appointment made successfully.'); 
    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoint'));
        }
        else
        {
            return redirect()->back();
        } 
    }

    public function cancel_appoint($id)
    {
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update_appoint($id)
    {
        $data=appointment::find($id);
        
        return view('user.update_appointment',compact('data'));
    }

    public function editappointment(Request $request ,$id)
    {
        $appointment = appointment::find($id);
        $appointment->name=$request->name;
        $appointment->email=$request->email;
        $appointment->phone=$request->phone;
        $appointment->date=$request->date;
        $appointment->message=$request->message;
        
            $appointment->save();
            return redirect()->back()->with('message','appointment details updated successfully');
        
        
    }

    protected function create(array $data)
    {
        $appoint = User::create([
            'name'=>$data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
        ]); 

        $appoint->notify(new AppointmentNotification());

        return $appoint;
    }

    public function consult()
    {
        return view('user.consult');
    }
}
