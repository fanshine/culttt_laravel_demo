<?php
class UserFollow extends BaseModel {

    protected $table = 'user_follows';

    protected $fillable = ['user_id', 'follow_id'];


}