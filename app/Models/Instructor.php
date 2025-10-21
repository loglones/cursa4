<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Relations\HasMany;

 class Instructor extends Model {
     use HasFactory;

     protected $fillable = [
         'fio',
         'experience',
         'skills',
         'drone_types',
         'achievements',
         'photo',
         'rating',
     ];
     protected $casts = [
         'rating' => 'decimal:2',
     ];
     public function courses(): HasMany {
         return $this->hasMany(Course::class);
     }
 }
