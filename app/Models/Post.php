<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];

    
        public function user(){
            return $this->belongsTo(User::class);

         }
        // // how to use mutator
        // public function setPostImageAttribute($value){
        //         $this->attributes['post_image'] = asset($value);
        // }
                    // how to use accesor
            // public function  getPostImageAttribute($value){
            //             return asset($value);
            // }

        
}
