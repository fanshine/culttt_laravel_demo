<?php

class Comment extends BaseModel {

    public function commentable()
    {
        return $this->morphTo();
    }

}