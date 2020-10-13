<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Location;
use App\Exports\ContactExport;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth.apikey');
    }
    
    public function fetch(){

        $datas = Contact::latest()->get();
        $locations = Location::all()->pluck('name')->toArray();
        /** Return a json response object */

        return response()->json(
            [
                'message' => $datas,
                'dependencies' => array(
                    'locations' => $locations
                )
            ]
        );

    }

    public function update(){

        /** Request coming in */
        $id = request()->id;
        $name = request()->fullname;
        $email = request()->email;
        $phone = request()->phone;
        $message = request()->message;
        $location = request()->location;

        /** Find id , Update data and save */
        $data = Contact::find($id);
        $data->fullname = $name;
        $data->email = $email;
        $data->phone = $phone;
        $data->message = $message;
        $data->location = $location;

        $data->save();


        /** Return a json response object */
        return response()->json(['message' => 'Data Updated Successfully']);
    }

    public function delete(){
        
        /** Incoming Id */
        $id = request()->id;

        /** Find and delete Id */
        Contact::find($id)->delete();

        /** Return a json response object */
     return response()->json(['message' => 'Deleted Successfully']);

    }

    public function exportable(){
        return Excel::download(new ContactExport, 'contact.xlsx');
    }

  
}
