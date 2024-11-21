<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['eprint_id', 'document_type_id', 'file_path'];

    /**
     * Get the eprint associated with the document.
     */
    public function eprint()
    {
        return $this->belongsTo(Eprint::class);
    }

    /**
     * Get the document type associated with the document.
     */
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
