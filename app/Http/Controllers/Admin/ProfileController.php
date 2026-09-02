<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\Profile; use Illuminate\Http\Request; use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller {
 public function edit(){ return view('admin.profile',['profile'=>Profile::firstOrCreate([],['name'=>'Nama Anda'])]); }
 public function update(Request $r){ $data=$r->validate(['name'=>'required|string|max:100','headline'=>'nullable|string|max:160','location'=>'nullable|string|max:100','email'=>'nullable|email|max:100','phone'=>'nullable|string|max:50','about'=>'nullable|string|max:2000','education'=>'nullable|string|max:1000','strengths'=>'nullable|string|max:1000','achievement'=>'nullable|string|max:1000','linkedin'=>'nullable|url|max:255','github'=>'nullable|url|max:255','photo'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048']); $profile=Profile::firstOrCreate([],['name'=>$data['name']]); if($r->hasFile('photo')){if($profile->photo_url && !filter_var($profile->photo_url,FILTER_VALIDATE_URL))Storage::disk('public')->delete($profile->photo_url);$data['photo_url']=$r->file('photo')->store('profile-photos','public');} $profile->update($data); return back()->with('success','Profil berhasil diperbarui.'); }
}
