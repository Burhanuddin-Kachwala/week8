<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Jobs extends Model{
    use HasFactory;
   protected $table='jobs_Listings';
   protected $guarded = [];

   public function employer(){
    return $this->belongsTo(Employer::class);
   }
   public function tag(){
    return $this->belongsToMany(Tag::class,foreignPivotKey:'jobs_listing_id');
   }
}
?>