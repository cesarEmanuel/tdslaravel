<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileUploadModel extends Model
{
    protected $fillable = [
        'user_id',
        'namefile',
        'sizefile',
        'typefile',
        'md5file',
        'version',
        'statusfile',
        'displayfile',
    ];
    protected $table= 'files_uploads';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->hasMany(FileUploadHistory::class, 'id_file');
    }
}
