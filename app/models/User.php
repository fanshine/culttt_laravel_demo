<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $fillable = ['username', 'email'];

    protected $guarded = ['id', 'password'];

    //----------------Ardent Params Start-------------------
    public static $rules = [
        'username'              => 'required|between:4,16',
        'email'                 => 'required|email',
        'password'              => 'required|alpha_num|between:8,16|confirmed',
        'password_confirmation' => 'required|alpha_num|between:8,16',
    ];

    //----------------Ardent Params End---------------------

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * Post relationship
     */
    public function posts()
    {
        return $this->hasMany('Post');
    }
}
