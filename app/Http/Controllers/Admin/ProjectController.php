<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index() { return view('admin.projects.index', ['items' => Project::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.projects.form', ['item' => new Project]); }
    public function store(Request $request) { Project::create($this->data($request)); return redirect()->route('admin.projects.index')->with('success', 'Proyek ditambahkan.'); }
    public function edit(Project $project) { return view('admin.projects.form', ['item' => $project]); }
    public function update(Request $request, Project $project) { $project->update($this->data($request, $project)); return redirect()->route('admin.projects.index')->with('success', 'Proyek diperbarui.'); }
    public function destroy(Project $project) { $this->deleteStoredImage($project->image_url); $project->delete(); return back()->with('success', 'Proyek dihapus.'); }
    private function data(Request $request, ?Project $project = null): array
    {
        $data = $request->validate(['title'=>'required|string|max:120','category'=>'nullable|string|max:80','description'=>'nullable|string|max:1500','technologies'=>'nullable|string|max:300','url'=>'nullable|url|max:255','image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:5120','sort_order'=>'nullable|integer|min:0']);
        unset($data['image']);
        if ($request->hasFile('image')) { if ($project) $this->deleteStoredImage($project->image_url); $data['image_url'] = $request->file('image')->store('project-images', 'public'); }
        return $data;
    }
    private function deleteStoredImage(?string $path): void { if ($path && !filter_var($path, FILTER_VALIDATE_URL)) Storage::disk('public')->delete($path); }
}
