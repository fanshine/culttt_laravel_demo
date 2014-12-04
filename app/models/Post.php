<?php
class Post extends BaseModel {

    protected $table = 'posts';

    protected $fillable = ['body'];

    //----------------Ardent Params Start-------------------
    public static $rules = [
        'clique_id' => 'required|integer'
    ];

    //----------------Ardent Params End---------------------


    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * Clique relationship
     */
    public function clique()
    {
        return $this->belongsTo('Clique');
    }

    /**
     * Comment relationship
     */
    public function comments()
    {
        return $this->morphMany('Comment', 'commentable');
    }

    public static $factory = [
        'name' => 'string',
        'clique_id' => 'factory|Clique'
    ];

}