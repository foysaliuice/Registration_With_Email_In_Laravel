<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = "members";
  protected $fillable = [
      'member_name', 'member_email','member_password','verifyToken',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
}
