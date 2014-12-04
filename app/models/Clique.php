<?php
class Clique extends BaseModel {
    /**
     * Properties that can be mass assigned
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Ardent validation rules
     */
    public static $rules = [
        'name' => 'required',
    ];
    /**
     * User relationship
     */
    public function users(){
        return $this->belongsToMany('User');
    }
    /**
     * Post relationship
     */
    public function posts()
    {
        return $this->hasMany('Post');
    }

    /**
     * Factory
     */
    public static $factory = [
        'name' => 'string'
    ];
}