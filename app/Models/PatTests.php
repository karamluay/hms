<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatTests extends Model
{
    use HasFactory;
    protected $guarded=[];
    /**
     * Get the test that owns the PatTests
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo(LabTest::class, 'test_id');
    }
}
