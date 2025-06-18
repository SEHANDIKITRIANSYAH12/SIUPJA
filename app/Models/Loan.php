<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'tool_id', 'start_date', 'end_date', 'status', 'reason'
    ];
    public function user() { return $this->belongsTo(User::class); }
    public function tool() { return $this->belongsTo(Tool::class); }
    public function return() { return $this->hasOne(ReturnModel::class); }
}
