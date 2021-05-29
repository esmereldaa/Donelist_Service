<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class DataListModel extends Model{
    
    protected $table = 'donelist';
    public $timestamps = false;
    public $primaryKey = 'list_id';
    public $incrementing = false;

    protected $fillable = [
        'user_id','task_data', 'date'
    ];
    protected $hidden = [
    ];
    protected $attributes = [
    ];

}
