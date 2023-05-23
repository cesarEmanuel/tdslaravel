<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileUploadHistoryModel extends Model
{
    protected $fillable = [
        'id_file',
        'id_user_down',
        'ip_user',
    ];
    protected $table= 'files_uploads_history';
    public function fileUpload()
    {
        return $this->belongsTo(FileUpload::class, 'id_file');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user_down');
    }
}
