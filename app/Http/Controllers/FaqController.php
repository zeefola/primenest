<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
    
    public function fetch(){
     /** Get all FAQ data and store in $datas  */
     $datas = Faq::all();

     /** Create a collection */
     $results = collect();

     /** Loop through the datas */
     foreach($datas as $data){

     /** Push data into the Collection */
     $results->push([
         'id' => $data->id,
         'question' => $data->question,
         'answer' => $data->answer,
     ]);

     }

     /** Return a json response object */
     return response()->json(['message'=> $results]);

    }

    public function create(){
     /** Store the incoming request into a variable */
     $question = request()->question;
     $answer = request()->answer;

     /** Create an instance of the model, save*/
     $data = new Faq();
     $data->question = $question;
     $data->answer = $answer;
     $data->save();

     /** Return a json response object */
     return response()->json(['message' => 'Created successfully']);

    }

    public function update(){

    }

    public function delete(){
        /** Store the request id in a variable */
        $id = request()->id;

        /** Find and delete it */
        Faq::find($id)->delete();
        
        /** Return a json response object */
        return response()->json(['message' => 'Deleted Successfully']);

    }
}