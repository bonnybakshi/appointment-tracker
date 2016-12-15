<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Appointment;
use App\Client;
use App\User;
use Session;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Auth;
class AppointmentController extends Controller
{
    /**
    * GET
    */
    public function index(Request $request)
    {

        $user = $request->user();
        
        // if user is not admin
        if(!($user->isAdmin())) {
            # Approach 1)
            $appointments = Appointment::where('user_id', '=', $user->id)->orderBy('id','DESC')->get();

            # Approach 2) Take advantage of Model relationships
            #$apointments = $user->apointments()->get();
        }
        //if user is admin
        else if($user->isAdmin()){
            $appointments = Appointment::all();
        }
        else  {
            $appointments = [];
        }

        return view('appointment.index')->with([
            'appointments' => $appointments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointment.date');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dropdown(Request $request)
    {
        # Validate
        $this->validate($request, [
            'date' => 'required',
        ]);
        $clients_for_dropdown = Client::getForDropdown();
        $appointments = Appointment::all();
        
        $date_value = $request->input('date');
        
        $existing_time = [];
        $time_for_dropdown =[];
        $times =['12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM', '8:00 PM'];
        $i =0;
        foreach($appointments as $appointment){
            if($appointment->visit_date == $date_value){    
                $existing_time[$i] = $appointment->visit_time;
                $i++;
            }  
        }
        if(count($existing_time)> 0){
            $time_for_dropdown = array_diff($times, $existing_time);
        }
        else $time_for_dropdown = $times;
        return view('appointment.create')->with([
            'time_for_dropdown' => $time_for_dropdown,
            'date_value' => $date_value,
            'clients_for_dropdown' => $clients_for_dropdown,
        ]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        # Validate
        $this->validate($request, [
            'time' => 'required',
        ]);
        
        
        $appointment = new Appointment();
        $appointment->visit_date = $request->input('date');
        $appointment->visit_time = $request->input('time');
        
        // if admin
        if($user->isAdmin()) {
            $client_id = $request->input('client_id');
            $client = Client::find($client_id);
            $user_id = User::where('name','=',$client->name)->pluck('id')->first();
           
            $appointment->client_id = $client_id;
            $appointment->user_id = $user_id;
        }else{
            $client_id = Client::where('name','=',Auth::user()->name)->pluck('id')->first();

            $appointment->client_id = $client_id;
            $appointment->user_id = Auth::user()->id;
        }
        $appointment->save();
        return redirect('/appointments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        $appointment = Appointment::whereIn('client_id',$client)->get();
        return view('appointment.show')->with([
            'appointment' => $appointment,
            'client'=>$client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        # Possible authors
        $status_for_dropdown =['pending', 'complete', 'no show'];
        return view('appointment.edit')->with(
            [
                'appointments' => $appointment,
                'status_for_dropdown' => $status_for_dropdown,
            ]
        );
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
       

        # Find and update book
        $appointment = Appointment::find($request->id);
        $appointment->visited = $request->status;
        $appointment->save();

        
        // # Finish
        // Session::flash('flash_message', 'Your changes to '.$book->title.' were saved.');
        return redirect('/appointments');
    }

    /**
    * GET
    * Page to confirm deletion
    */
    public function delete($id) {

        $appointment = Appointment::find($id);

        return view('appointment.delete')->with('appointment', $appointment);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Get the book to be deleted
        $appointment = Appointment::find($id);

        if(is_null($appointment)) {
            Session::flash('message','Appointment not found.');
            return redirect('/appointments');
        }

        # Then delete 
        $appointment->delete();

        # Finish
        return redirect('/appointments');
    }
}
