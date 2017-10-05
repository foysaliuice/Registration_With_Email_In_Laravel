<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $table = "Files";
  protected $fillable = [
      'file_name','member_email',
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
