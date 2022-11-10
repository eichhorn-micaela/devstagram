<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use App\Models\Post;
use App\Models\Comentario;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        //1 a muchos
        return $this->hasMany(Post::class);
    }
    public function comentarios(){
        //1 a muchos
        return $this->hasMany(Comentario::class);
    }
    public function likes(){
        //1 a muchos
        return $this->hasMany(Like::class);
    }

    //almacena seguidores
       public function followers(){
                return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
       }

       //comprebar si un usuario sigue a otro
       public function siguiendo(User $user){
        return $this->followers->contains($user->id);
       }

    //almacena los que seguimos
    public function following(){
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
}
}



