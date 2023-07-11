<?php

namespace App\Models;

use App\Models\OrgData;
use App\Models\DocStatus;
use App\Models\TrackDocument;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenerateDocument extends Model
{
    use HasFactory;
    use HasRoles;
    protected $fillable = ['control_number','org_data_id','file','file_name', 'status_id'];
    protected $table = 'generate_document';

    public function orgData()
    {
        return $this->belongsTo(OrgData::class, 'org_data_id', 'id');
    }

    public function statusName()
    {
        return $this->belongsTo(DocStatus::class, 'status_id', 'id');
    }

    public function trackDoc()
    {
        return $this->belongsTo(TrackDocument::class, 'control_number', 'control_number');
    }
}

