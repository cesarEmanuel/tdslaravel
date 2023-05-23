<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUploadModel;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // dd($request->hasFile('file'));
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('files');

                $fileUpload = new FileUploadModel();
                $fileUpload->user_id = $request->user()->id;
                $fileUpload->displayfile = $request->displayname;
                $fileUpload->namefile = $file->getClientOriginalName();
                $fileUpload->sizefile = $file->getSize();
                $fileUpload->typefile = $file->getMimeType();
                $fileUpload->md5file = md5_file($file->getPathname());
                $fileUpload->version = 1;

                $fileUpload->statusfile = 'active';
                // dd($request->user()->id);
                $fileUpload->save();
                // dd('asdf');
                return response()->json(['message' => 'File uploaded successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'File upload failed'], 500);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
    }
}