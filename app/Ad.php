<?php

namespace App;

use App\Http\Requests\SaveAdRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ad extends Model
{
    protected $table = 'ads';
    protected $fillable = ['title', 'description'];

    /**
     * One to many relation with User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = Auth::id();
    }

    public function saveAd(SaveAdRequest $request)
    {
        $this->setUserIdAttribute();
        $this->fill($request->validated());
        $this->save();
    }
}
