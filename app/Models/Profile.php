<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Profile extends Model { protected $fillable = ['name','headline','location','email','phone','about','education','strengths','achievement','linkedin','github','website','photo_url','resume_url']; }
