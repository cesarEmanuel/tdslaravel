<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUploadModel;
use App\Models\FileUploadHistoryModel;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
        $archivos = FileUploadModel::where("user_id",auth()->user()->id)->get()->toArray();
        $icons = ["image/jpeg"=>'image',
                  "image/png"=>'image',
                  "image/jpg"=>'image',
                  "application/pdf"=>'picture_as_pdf',];

        $modifiedResults = array_map(function ($result) use ($icons) {
            $carbonDate = Carbon::parse($result['created_at']);
            $formattedDate = $carbonDate->format('d F Y');
            $result['created_at'] = $formattedDate;
            $result['contador'] = FileUploadHistoryModel::where("id_file",$result['id'])->count();
            $result['icon'] = (isset($icons[$result['typefile']])?$icons[$result['typefile']]:'file_present');
            $result['sizefile'] = round(($result['sizefile']/1024)/1024,3);
            return $result;
        }, $archivos);
        $archivos = null;
        // dd($modifiedResults);
        return view('dashboard.index',[
            "archivos"=>$modifiedResults,
            "iconss"=>$icons
        ]);
    }
    public function create(Request $request){
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
                return back()->withStatus('Archivo subido.');
            }
        } catch (\Exception $e) {
            return back()->withStatus('Error al subir archivo.');
        }
    }
    public function updateDisplayName(Request $request)
    {
        $fileId = $request->input('file_id');
        $displayName = $request->input('display_name');

        // Update the display name in the database
        $file = FileUpload::find($fileId);
        $file->display_name = $displayName;
        $file->save();

        // Return a response indicating success or failure
        return response()->json(['success' => true]);
    }

    public function welcome()
    {
        return view('welcome');
    }
}
