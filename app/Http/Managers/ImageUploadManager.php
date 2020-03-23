<?php 

namespace App\Http\Managers;

use Illuminate\Support\Facades\Auth;

class ImageUploadManager {
    public function storeVideo($video) {
        $fullFileName = $video->getClientOriginalName();
        $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
        $extension = $video->getClientOriginalExtension();
        $file = $fileName . '_' . time() . '.'. $extension;
        $video->storeAs('public/courses_sections/' . Auth::user()->id, $file);
        return $file;
    }
}