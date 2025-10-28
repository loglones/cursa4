<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Course extends Model{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'instructor_id',
        'price',
        'photo',//добавить в миграции фото
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

    public function getPhotoUrlAttribute()
    {
        if($this->photo){
            return Storage::url($this->photo);
        }
        return asset('img/FixedWingBWN.png');
    }
}
