<div class="card">
<h2>Distance Calculator</h2>


@if(session('success'))
<p style="color: green; font-weight: bold;">{{ session('success') }}</p>
@endif


<form action="{{ route('distance.calculate') }}" method="POST">
@csrf
<label>Latitude 1</label>
<input type="text" name="lat1" required>


<label>Longitude 1</label>
<input type="text" name="lng1" required>


<label>Latitude 2</label>
<input type="text" name="lat2" required>


<label>Longitude 2</label>
<input type="text" name="lng2" required>


<button type="submit">Calculate Distance</button>
</form>


<h3>History</h3>
<table>
<tr>
<th>Lat1</th><th>Lng1</th><th>Lat2</th><th>Lng2</th><th>Distance (km)</th><th>Date</th>
</tr>
@foreach($history as $row)
<tr>
<td>{{ $row->lat1 }}</td>
<td>{{ $row->lng1 }}</td>
<td>{{ $row->lat2 }}</td>
<td>{{ $row->lng2 }}</td>
<td>{{ $row->distance_km }}</td>
<td>{{ $row->created_at->format('Y-m-d') }}</td>
</tr>
@endforeach
</table>
</div>