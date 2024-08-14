<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id','produk','slug','kategori','harga','foto','deskripsi', 'rating', 'created_at','updated_at'];

     // Jika Anda perlu mengubah format atau menambahkan logika untuk rating
     public function getRatingAttribute($value)
     {
         // Misalnya, jika rating disimpan di tabel terpisah
         // $totalRatings = $this->ratings->sum('rating');
         // $totalReviews = $this->ratings->count();
         // return $totalReviews > 0 ? $totalRatings / $totalReviews : 0;
         return $value;
     }

}
