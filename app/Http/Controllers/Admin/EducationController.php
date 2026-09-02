<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index() { return view('admin.educations.index', ['items' => Education::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.educations.form', ['item' => new Education]); }
    public function store(Request $request) { Education::create($this->data($request)); return redirect()->route('admin.educations.index')->with('success', 'Pendidikan ditambahkan.'); }
    public function edit(Education $education) { return view('admin.educations.form', ['item' => $education]); }
    public function update(Request $request, Education $education) { $education->update($this->data($request)); return redirect()->route('admin.educations.index')->with('success', 'Pendidikan diperbarui.'); }
    public function destroy(Education $education) { $education->delete(); return back()->with('success', 'Pendidikan dihapus.'); }
    private function data(Request $request): array { return $request->validate(['institution'=>'required|string|max:150','degree'=>'required|string|max:150','study_program'=>'required|string|max:150','start_date'=>'required|string|max:50','end_date'=>'nullable|string|max:50','location'=>'nullable|string|max:150','description'=>'nullable|string|max:1500','sort_order'=>'nullable|integer|min:0']); }
}
