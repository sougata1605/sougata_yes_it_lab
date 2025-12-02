<?

use App\Models\DistanceRecord;
use Illuminate\Http\Request;

class DistanceController extends Controller
{
    public function index()
    {
        $history = DistanceRecord::orderBy('created_at', 'desc')->get();
        return view('distance_form', compact('history'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'lat1' => 'required|numeric',
            'lng1' => 'required|numeric',
            'lat2' => 'required|numeric',
            'lng2' => 'required|numeric',
        ]);

        $distance = $this->calculateDistance(
            $request->lat1,
            $request->lng1,
            $request->lat2,
            $request->lng2
        );

        DistanceRecord::create([
            'lat1' => $request->lat1,
            'lng1' => $request->lng1,
            'lat2' => $request->lat2,
            'lng2' => $request->lng2,
            'distance_km' => $distance,
        ]);

        return redirect()->route('distance.index')->with('success', 'Distance calculated and saved!');
    }

    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371;

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat/2)**2 +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLng/2)**2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return round($earthRadius * $c, 3);
    }
}
