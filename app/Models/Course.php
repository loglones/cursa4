<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Course extends Model{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'instructor_id',
        'price',
    ];
    public function instructor(): BelongsTo{
        return $this->belongsTo(Instructor::class);
    }

    public function grades(): HasMany{
       return $this->hasMany(UserGrade::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_courses')->withTimestamps();
    }
}
