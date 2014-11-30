<?php
class Post extends BaseModel {

    protected $table = 'posts';

    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo('User');
    }

}