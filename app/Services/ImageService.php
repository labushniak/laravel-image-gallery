<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    
    public function all()
    {
        $image = DB::table('image')->select('*')->get();
        return $image->all();
    }

    public function add($image)
    {
        DB::table('image')->insert([
            'image' => $image->store('uploads')
        ]);
    }

    public function one($id)
    {
        $image = DB::table('image')->select('*')->where('id', '=', $id)->get();
        return $image->first();
    }

    public function update($id, $image)
    {
        $imageName = $this->one($id)->image;
        Storage::delete($imageName);    
        
        $filename = $image->store('uploads');
    
        DB::table('image')
                  ->where('id', $id)
                  ->update(['image' => $filename]);
    }

    public function delete($id)
    {
        $imageName = $this->one($id)->image;
        
        Storage::delete($imageName);
    
        DB::table('image')->where('id', $id)->delete();
    }
}