<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use getID3;

class AudioController extends Controller
{
    public function index()
    {
        return view('audio.upload');
    }


public function getAudioLength(Request $request)
{
    $request->validate([
        'audio' => 'required|mimes:mp3,wav,aac,ogg,m4a'
    ]);

   
    $folder = public_path('uploads/audio/');
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $file = $request->file('audio');
    $filename = time() . '_' . $file->getClientOriginalName();
    $filePath = $folder . $filename;
    $file->move($folder, $filename);

  
    $getID3 = new \getID3;
    $info = $getID3->analyze($filePath);

    if (!isset($info['playtime_seconds'])) {
        return "Unable to read audio duration.";
    }

    $seconds = (int)$info['playtime_seconds'];
    $duration = gmdate("H:i:s", $seconds);

    return view('audio.result', [
        'filename' => $filename,
        'duration' => $duration
    ]);
}





}
