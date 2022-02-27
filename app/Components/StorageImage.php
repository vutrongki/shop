<?php
namespace App\Components;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
trait StorageImage{
    public function storageUpload($request, $fieldName, $folderName) {
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'. $folderName .'/'. Auth::id(), $fileNameHash);
            $dataUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => $url = Storage::url($filePath)
            ];
    
            return $dataUpload;
        }
        return null;

    }

    public function storageUploadMultiple($file, $folderName) {

        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/'. $folderName .'/'. Auth::id(), $fileNameHash);
        $dataUpload = [
            'file_name' => $fileNameOrigin,
            'file_path' => $url = Storage::url($filePath)
        ];

        return $dataUpload;


    }
}
?>