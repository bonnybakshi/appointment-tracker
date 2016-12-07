<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Session;
use Illuminate\Support\Facades\Validator;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $clients = Client::all();
        return view('client.index')->with(['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^\D?(\d{3})\D?(\d{3})\D?(\d{4})$/', $value) && strlen($value) >= 10;
        });

        Validator::replacer('phone', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute',$attribute, 'Invalid phone number.');
        });
        # Validate
        $this->validate($request, [
            'name' => 'required|max:120',
            'phone' => 'required|phone',
            'email' => 'required|email|unique:users',
        ]);

        # If there were errors, Laravel will redirect the
        # user back to the page that submitted this request
        # The validator will tack on the form data to the request
        # so that it's possible (but not required) to pre-fill the
        # form fields with the data the user had entered

        # If there were NO errors, the script will continue...

        # Get the data from the form
        #$title = $_POST['title']; # Option 1) Old way, don't do this.
        # Option 2) USE THIS ONE! :)

        $client = new Client();
        $client->name = $request->input('name');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');
        $client->save();

        Session::flash('flash_message', 'Your client '.$client->name.' was added.');

        return redirect('/clients');
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
        //
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
        //
    }
    /**
    * GET
    * Page to confirm deletion
    */
    public function delete($id) {

        $client = Client::find($id);

        return view('client.delete')->with('client', $client);
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
        $client = Client::find($id);

        if(is_null($client)) {
            Session::flash('message','Client not found.');
            return redirect('/clients');
        }

        # Then delete the book
        $client->delete();

        # Finish
        Session::flash('flash_message', $client->name.' was deleted.');
        return redirect('/clients');
    }
}
