<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)

    {
        if ($filters['search'] == null && $filters['jenis'] == "semua") {
            return false;
        } elseif ($filters['search'] !== null && $filters['jenis'] == "semua") {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('penulis', 'like', '%' . $search . '%')
                    ->orWhere('id', $search);
            });
        } elseif ($filters['search'] == null && $filters['jenis'] !== "semua") {
            $query->when($filters['jenis'] ?? false, function ($query, $jenis) {
                return $query->where('jenis', $jenis);
            });
        } elseif ($filters['search'] !== null && $filters['jenis'] !== "semua") {
            return $query->where('judul', 'like', '%' . $filters['search'] . '%')
                ->orWhere('penulis', 'like', '%' . $filters['search'] . '%')
                ->where('jenis', $filters['jenis']);
        }
    }
}
