<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


use App\User;

class UploadImageController extends Controller
{
    public function index(Request $request){

        if($request->hasFile('image')){
            $fileName = $request->image->getClientOriginalName();
            
            if(auth()->user()->avatar){
                Storage::delete('/public/images/'. auth()->user()->avatar);

            }

            

            $image = $request->image->storeAs('images', $fileName , 'public');
            auth()->user()->update([ 'avatar' => $fileName ]);
           
            return redirect()->back()->with('message', 'Image Uploaded!');

            
        }

      
        return redirect()->back()->with('error', 'Image not Uploaded!');
        
    }
}