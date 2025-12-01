<?php
namespace App\Http\Controllers;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserDataController extends Controller
{
public function index()
{
$users = UserData::all();
return view('user.index', compact('users'));
}


public function create()
{
return view('user.create');
}


public function store(Request $request)
{
$request->validate([
'name' => 'required|regex:/^[a-zA-Z ]+$/',
'email' => 'required|email|unique:user_data,email',
'mobile' => 'required|digits:10',
'profile_pic' => 'nullable|mimes:png,jpg,jpeg',
'password' => 'required|min:6'
]);


$filename = null;
if($request->hasFile('profile_pic')){
$filename = $request->profile_pic->store('profiles','public');
}


UserData::create([
'name' => $request->name,
'email' => $request->email,
'mobile' => $request->mobile,
'profile_pic' => $filename,
'password' => bcrypt($request->password)
]);


return redirect()->route('user.index');
}


public function edit($id)
{
$user = UserData::findOrFail($id);
return view('user.edit', compact('user'));
}


public function update(Request $request, $id)
{
$request->validate([
'name' => 'required|regex:/^[a-zA-Z ]+$/',
'email' => 'required|email',
'mobile' => 'required|digits:10',
'profile_pic' => 'nullable|mimes:png,jpg,jpeg',
]);

$user = UserData::findOrFail($id);
$filename = $user->profile_pic;


if($request->hasFile('profile_pic')){
if($filename){ Storage::disk('public')->delete($filename); }
$filename = $request->profile_pic->store('profiles','public');
}


$user->update([
'name' => $request->name,
'email' => $request->email,
'mobile' => $request->mobile,
'profile_pic' => $filename,
]);


return redirect()->route('user.index');
}


public function destroy($id)
{
$user = UserData::findOrFail($id);
if($user->profile_pic){ Storage::disk('public')->delete($user->profile_pic); }
$user->delete();
return redirect()->route('user.index');
}


public function exportCSV()
{
$users = UserData::all();
$filename = 'users.csv';
$handle = fopen($filename, 'w');
fputcsv($handle, ['ID','Name','Email','Mobile','Profile Pic','Created At']);


foreach($users as $u) {
fputcsv($handle, [
$u->id,$u->name,$u->email,$u->mobile,$u->profile_pic,$u->created_at
]);
}
fclose($handle);


return response()->download($filename);
}
}


?>