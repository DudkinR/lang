<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pict;

class PictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pict_background=   Pict::where('path', 'storage/story/background/')->get();
        $pict_personage=   Pict::where('path', 'storage/story/personage/')->get();
        return view('pict.index', compact('pict_background','pict_personage'));

    }
    // сканирование папки и добавление в базу данных картинок которые отсутствуют в базе данных
    public function scanFolder($path,$newName){
        $path = public_path($path);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $files = scandir($path);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $old_pict_count = Pict::where('path', $path)
                ->where('name', $file)
                ->count();
                if($old_pict_count==0){
                    $pict = new Pict();
                    $pict->name = $file;
                    $pict->path = $path;
                    $pict->extension = pathinfo($file, PATHINFO_EXTENSION);
                    $pict->size = filesize($path.'/'.$file);
                    $pict->mime_type = mime_content_type($path.'/'.$file);
                    $pict->url = $path.'/'.$file;
                    $pict->discription = 'discription';
                    $pict->save();
                }
                
            }
        }

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pict.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    if ($request->hasFile('filePicture')) {
        $newfile = $request->file('filePicture');
        if ($this->permissibleType($newfile->getMimeType())) {
            $extension = $newfile->getClientOriginalExtension();
            $type = $request->type;
            $newName = $this->rename($type);
            if ($type == 1) {
                $path = 'public/story/background';
                $pathDB=   'storage/story/background/';
            } elseif ($type == 2) {
                $path = 'public/story/personage';
                $pathDB=   'storage/story/personage/';
            }

            $newfile->storeAs($path, $newName.'.'.$extension);
            $filePath = storage_path($path.'/'.$newName.'.'.$extension);
            $fileSize = filesize($newfile);
            $mimeType = $newfile->getMimeType();

            $pict = new Pict();
            $pict->name = $newName;
            $pict->path = $pathDB;
            $pict->extension = $extension;
            $pict->size = $fileSize;
            $pict->mime_type = $mimeType;
            $pict->url = $pathDB.$newName.'.'.$extension;
            if($request->discription!='')
                $pict->discription = $request->discription;
            else
                $pict->discription = 'discription';
            $pict->save();
            return redirect()->route('pict.index');
        } else {
            return redirect()->route('pict.index');
        }
    } else {
        return redirect()->route('pict.index');
    }
}




    //permissible type files  for  upload pictures
    public function    permissibleType($typefiles){
        if($typefiles=='image/jpeg'||$typefiles=='image/png'||$typefiles=='image/gif' ){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function rename($type){
        //'storage/public/story/background/'  next name file
        if($type==1){//'background'
            $path = storage_path('app/public/story/background');
            $addName='background_';
    
        }
        elseif ($type==2){//'personage'
            $path = storage_path('app/public/story/personage');
            $addName='personage_';
        }
        // $path  если не существует папка то отправляем имя с   номером 1
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            return  $newName=$addName.'1';
        }
        $files = scandir($path);
        $max=0;
        if(count($files)==2){
            return  $newName=$addName.'1';
        }
        foreach ($files as $file) {
            if($file!=='.'&&$file!=='..'){
                $name=explode(".",$file);
                $num=explode("_",$name[0]);
                if($num[1]>$max){
                    $max=$num[1];
                }
            }
        }
         return  $newName=$addName.($max+1);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $pict=   Pict::find($id);
        return view('pict.show', compact('pict'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         $pict=   Pict::find($id);
        return view('pict.edit', compact('pict'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pict=  Pict::find($id);
        $pict->name = $request->name;
        $pict->discription=$request->discription;
        if($pict->path ==  'storage/story/background/'){
            $type=1;
            $path = storage_path('app/public/story/background');
            $pathDB ='storage/story/background/';
        }
        elseif($pict->path ==  'storage/story/personage/'){
            $type=2;
            $path = storage_path('app/public/story/personage');
            $pathDB ='storage/story/personage/';
        }
           
        if($request->type!==$type){
            if($request->type==1){
                $newPath = storage_path('app/public/story/background');
                $newPathDB ='storage/story/background/';
            }
            elseif($request->type==2){
                $newPath = storage_path('app/public/story/personage');
                $newPathDB ='storage/story/personage/';
            }
            // нужно переписать файл
            $newName=$this->rename($type);
            // move file to new    path
$oldPath=$path.'/'.$pict->name.'.'.$pict->extension;
$newPath=$newPath.'/'.$newName.'.'.$pict->extension;

             //move file
            rename($oldPath, $newPath);
            //update  path db
            $pict->path=$pathDB;
            $pict->name=$newName;

        }
        $pict->save();
        //pict.show
        return redirect()->route('pict.show', $pict->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $pict=   Pict::find($id);
        $pict->delete();
        return redirect()->route('pict.index');
    }
}
