<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentsController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            //get filename with extension
            $filenamewithextension = $request->file('file')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('file')->storeAs('', $filenametostore, 'attachments');

            // you can save image path below in database
            $path = asset('attachments/' . $filenametostore);

            echo $path;
        }
    }

    public function retrieve ($attachment){

        try{

            $storagePath = Storage::disk('attachments')->path('/'.$attachment);
            return response()->file($storagePath);

        } catch (Exception $e){ abort(404); }

    }
}
