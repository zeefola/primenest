<?php

namespace App\Http\Controllers;

use App\application_history;
use Illuminate\Http\Request;
use App\Exports\ApplicationExport;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationController extends Controller
{
    public function fetch(){
        /** Fetch data into $data */

        $data = application_history::latest()->get();

        /** Return a json response object with  $data */
        return response()->json(['message' => $data]);

    }

    public function update(){
        /** Store incoming id in a variable */
        $id = request()->id;

        /** Find the id  */
        $db_data = application_history::find($id);

        /** Store data into the database */
        $db_data->surname = request()->surname;
        $db_data->other_name = request()->other_name;
        $db_data->phone = request()->phone;
        $db_data->property_type = request()->property_type;
        $db_data->payment_option = request()->payment_option;
        $db_data->location = request()->location;

        $db_data->save();


        /** Return a json response object */
        return response()->json(['message' => 'Data Updated Successfully']);

    }

    public function delete(){
        /** Store incoming request as a variable */
        $id = request()->id;

        /** Find and delete using the id */
        application_history::find($id)->delete();

        /** Return a json response object */
        return response()->json(['message' => 'Data Deleted Successfully']);

    }

    public function exportable(){
      return Excel::download(new ApplicationExport, 'application.xlsx');
   }
}
