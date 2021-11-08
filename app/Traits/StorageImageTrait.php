<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpload($request ,$fieldName,$forderName){
        
        if($request->hasFile($fieldName)){
            
            $file= $request->$fieldName;
            $fileNameOrigin= $file->getClientOriginalName();
            $fileNameHash = Str::random(40).'.'.$file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'. $forderName . '/' . auth()->id(),$fileNameHash);
            // lay ra url de user co the truy cap vao de lay anh tu folder public de user front end co the truy cap duoc thi phair lay dk url trong thu muc public
            $dataUploadTrait =[
                'file_name' =>$fileNameOrigin,
                'file_path'=> Storage::url($filePath)
                // Chuyên public/ trong storage  => storage trong public de  front end view duoc
            ];
            return $dataUploadTrait;
        }else{
            return null;
        }
        
       
    }

    public function storageTraitUploadMultiple($file,$forderName){
        
            
            $fileNameOrigin= $file->getClientOriginalName();
            $fileNameHash = Str::random(40).'.'.$file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/'. $forderName . '/' . auth()->id(),$fileNameHash);
            // lay ra url de user co the truy cap vao de lay anh tu folder public de user front end co the truy cap duoc thi phair lay dk url trong thu muc public
            $dataUploadTrait =[
                'file_name' =>$fileNameOrigin,
                'file_path'=> Storage::url($filePath)
            ];
            return $dataUploadTrait;
      
        
       
    }
}