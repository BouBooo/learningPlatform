<?php 

namespace App\Http\Managers;

use Illuminate\Support\Facades\Auth;

class ImageUploadManager {
    public function storeVideo($video) {
        $fullFileName = $video->getClientOriginalName();
        $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
        $extension = $video->getClientOriginalExtension();
        $file = time() . '_' . $fileName. '.'. $extension;
        $video->storeAs('public/courses_sections/' . Auth::user()->id, $file);
        return $file;
    }

    public function getVideoDuration($filePath) {
        $getID3 = new \getID3;
        $file = $getID3->analyze($filePath);
        $duration = date('H:i:s.v', $file['playtime_seconds']);
        return $duration;
    }
}