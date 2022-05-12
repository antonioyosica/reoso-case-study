<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchField extends Model
{
  use HasFactory;

  protected $table = 'search_field';
  protected $keyType = 'string';

  public function searchProfile()
  {
    return $this->belongsTo(SearchProfile::class, 'fields', 'id');
  }
}
