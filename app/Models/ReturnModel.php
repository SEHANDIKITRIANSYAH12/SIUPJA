<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    use HasFactory;
    protected $table = 'returns';
    protected $fillable = [
        'loan_id', 'condition_note', 'photo', 'status'
    ];
    public function loan() { return $this->belongsTo(Loan::class); }
}
