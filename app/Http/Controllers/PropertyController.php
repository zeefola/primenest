<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
    public function fetch(){


        /** Gets all properties and stores in [datas] */

        if(request()->id){
            $datas = Property::where('id',request()->id)->get();
        }else{
            $datas = Property::latest()->get();
        }
       
        /** Creates a collection instance */
        $result = collect();

        /** Looping thru the [datas] */
        foreach($datas as $data){

            /** Pushing [data] into collection instance [result] */
            $result->push([
                'id' => $data->id,
                'name' => $data->name,
                'estate' => $data->estate,
                'price' => $data->price,
                'keypoints' => $data->keypoints,
                'facts' => $data->facts,
                'amenities' => $data->amenities,
            ]);
        }

        /** Returns a response object */
        return response()->json(['message' => $result]);
    }


    



    public function create(){
        //request()->property
        //request()->facts
        //request()->amenities
        //request()->keypoints

        /** Store requests into a variable */
        $property_obj = request()->property;
        $fact_obj = request()->fact;
        $keypoint_request = request()->keypoint;
        $amenity_request = request()->amenity;

        $data = new Property();
        $data->estate = $property_obj->estate;
        $data->name = $property_obj->name;
        $data->price = $property_obj->price;
        $data->description = $property_obj->description;
        $data->save();

        if($fact_obj){
            $fact = new Fact();
            $fact->property_id = $data->id;
            $fact->bedroom = $fact_obj->bedroom;
            $fact->livingroom = $fact_obj->livingroom;
            $fact->garage = $fact_obj->garage;
            $fact->bathroom = $fact_obj->bathroom;
            $fact->save();
        }

        if($keypoint_request){
            $keypoint = new Keypoint();
            $keypoint->property_id = $data->id;
            $keypoint->bedroom = $keypoint_request->bedroom;
            $keypoint->bathroom = $keypoint_request->bathroom;
            $keypoint->area = $keypoint_request->area;
            $keypoint->parking = $keypoint_request->garage;
            $keypoint->save();
        }

        if($amenity_request){
            foreach($amenity_request as $amenity_request1){
              $amenity = new Amenity();
              $amenity->property_id = $data->id;
              $amenity->name = $amenity_request1->name;
              $amenity_request->save();
            }
        }


        /** Returns a response object */
        return response()->json(['message' => 'Create action successful']);


        

    }

    public function update(){


    }

    public function delete(){

        /** Incoming [id] */
        $id = request()->id;

        /** Delete based on [id] */
        Property::find($id)->delete();

         /** Returns a response object */
         return response()->json(['message' => 'Delete action successful']);
        
    }
}
