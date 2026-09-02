<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model {
    protected $fillable = ['title','category','description','technologies','url','image_url','sort_order'];
    public function imageUrl(): string {
        return filter_var($this->image_url, FILTER_VALIDATE_URL) ? $this->image_url : asset('storage/' . ltrim($this->image_url, '/'));
    }
}
