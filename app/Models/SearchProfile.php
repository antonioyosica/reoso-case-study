<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchProfile extends Model
{
  use HasFactory;

  protected $table = 'search_profile';

  public function searchField()
  {
    return $this->hasOne(SearchField::class, 'id', 'fields');
  }
}
