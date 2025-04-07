<?php
namespace MohasinDev\ColumnVisibility\Models;

use Illuminate\Database\Eloquent\Model;

class ColumnPreference extends Model
{
    protected $fillable = ['user_id', 'table_key', 'hidden_columns'];
    protected $casts = ['hidden_columns' => 'array'];
}
