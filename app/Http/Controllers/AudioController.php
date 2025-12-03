<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use getID3;
use App\Models\DistanceRecord;

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

/// distance related calculation 






    public function distance_index()
    {
            
        $history = DistanceRecord::orderBy('created_at', 'desc')->get();
        return view('distance/distance_form', compact('history'));
    }




    public function calculate(Request $request)
    {
       
        $request->validate([
            'lat1' => ['required', 'regex:/^[-+]?\d+(\.\d+)?\s*(°)?\s*[NnSs]?$/'],
            'lng1' => ['required', 'regex:/^[-+]?\d+(\.\d+)?\s*(°)?\s*[EeWw]?$/'],
            'lat2' => ['required', 'regex:/^[-+]?\d+(\.\d+)?\s*(°)?\s*[NnSs]?$/'],
            'lng2' => ['required', 'regex:/^[-+]?\d+(\.\d+)?\s*(°)?\s*[EeWw]?$/'],
        ], [
            'lat1.regex' => 'Latitude 1 must be a valid coordinate (e.g., 22.7866° N).',
            'lng1.regex' => 'Longitude 1 must be a valid coordinate (e.g., 86.1660° E).',
            'lat2.regex' => 'Latitude 2 must be a valid coordinate (e.g., 22.7866° N).',
            'lng2.regex' => 'Longitude 2 must be a valid coordinate (e.g., 86.1660° E).',
        ]);

       
        $lat1 = $this->parseCoordinate($request->lat1);
        $lng1 = $this->parseCoordinate($request->lng1);
        $lat2 = $this->parseCoordinate($request->lat2);
        $lng2 = $this->parseCoordinate($request->lng2);

       
        if ($lat1 === null || $lng1 === null || $lat2 === null || $lng2 === null) {
            return back()->with('error', 'Invalid coordinate format. Use formats like "22.7866° N".');
        }

       
        $distance = $this->calculateDistance($lat1, $lng1, $lat2, $lng2);

     
        DistanceRecord::create([
            'lat1' => $lat1,
            'lng1' => $lng1,
            'lat2' => $lat2,
            'lng2' => $lng2,
            'distance_km' => $distance,
        ]);

        return redirect()->route('distance.index')->with('success', 'Distance calculated and saved!');
    }

 
    private function parseCoordinate($value)
    {
       
        $clean = str_replace(['°', ' '], '', $value);

       
        preg_match('/^([-+]?\d+(\.\d+)?)([NnSsEeWw])?$/', $clean, $matches);

        if (!isset($matches[1])) {
            return null;
        }

        $number = (float)$matches[1];
        $direction = $matches[3] ?? null;

        
        if ($direction) {
            if (in_array(strtoupper($direction), ['S', 'W'])) {
                $number *= -1;
            }
        }

        return $number;
    }

   
    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371;

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) ** 2 +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return round($earthRadius * $c, 3);
    }
}

