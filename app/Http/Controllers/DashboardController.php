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
    public function create(){
        return view('dashboard.create');
    }
    public function store(Request $request){
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('files');

                $fileUpload = new FileUploadModel();
                $fileUpload->user_id = $request->user()->id;
                $fileUpload->displayfile = $request->input('displayname');
                $fileUpload->namefile = $file->getClientOriginalName();
                $fileUpload->sizefile = $file->getSize();
                $fileUpload->typefile = $file->getMimeType();
                $fileUpload->md5file = md5_file($file->getPathname());
                $fileUpload->version = 1;

                $fileUpload->statusfile = (null !== $request->input('statusfile')?'Publicado':'No publicado');
                $fileUpload->save();
                // dd('asdf');

                return redirect()->route('dashboard.index')
                                  ->withStatus('Guardado correctamente!');
                // return back()->withStatus('Archivo subido.');
            }
        } catch (\Exception $e) {
            return back()->withStatus('Error al subir archivo.');
        }
    }
    public function edit($id)
    {
        $file = FileUploadModel::find($id);
        
        // dd($file);
        return view('dashboard.create',[
            "datafile"=>$file
        ]);
    }
    public function update(Request $request,$id)
    {
        // dd($request);
        // $fileId = $request->input('file_id');
        $file = FileUploadModel::find($id);
        $file->displayfile = $request->input('displayname');
        $file->statusfile = (null !== $request->input('statusfile')?'Publicado':'No publicado');
        $file->save();

        return back()->withStatus('Archivo actualizado.');
    }
    public function destroy(){

    }
    public function welcome()
    {
        $archivos = FileUploadModel::where("statusfile",'Publicado')->get()->toArray();
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
            $result['autor'] = FileUploadModel::find($result['id'])->user()->first()->name;
            return $result;
        }, $archivos);
        $archivos = null;
        // dd($modifiedResults);
        return view('welcome',[
            "archivos"=>$modifiedResults
        ]);
        return view('welcome');
    }
}
