<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eprint extends Model
{
    use HasFactory;

    protected $table = 'eprints';

    protected $fillable = [
        'title',
        'abstract',
        'keywords',
        'journal_title',
        'issn',
        'publisher',
        'official_url',
        'volume',
        'number',
        'page_from',
        'page_to',
        'year',
        'month',
        'day',
        'date_type',
        'identification_number',
        'references',
        'additional_information',
        'comments',
        'item_type',
        'file',
        'url',
        'contact_email',
        'family_names',
        'given_names',
        'nims',
        'emails',
        'corporate_creators',
        'contribution',
        'divisions',
        'refereed',
        'status',
        'related_urls',
        'url_type',
        'funders',
        'projects',
        'user_id',
        'subject_id'
    ];

    protected $casts = [
        'family_names' => 'array',
        'given_names' => 'array',
        'nims' => 'array',
        'emails' => 'array',
        'corporate_creators' => 'array',
        'contribution' => 'array',
        'divisions' => 'array',
        'related_urls' => 'array',
        'url_type' => 'array',
        'funders' => 'array',
        'projects' => 'array'
    ];

    public function user()
    {
        // Tipe Relasi: Many to One
        // Setiap Eprint dimiliki oleh satu User,
        // tetapi satu User bisa memiliki banyak Eprint.
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        // Tipe Relasi: One to Many
        // Satu Eprint dapat memiliki banyak Document,
        // tetapi satu Document hanya berhubungan dengan satu Eprint.
        return $this->hasMany(Document::class);
    }

    public function subject()
    {
        // Tipe Relasi: Many to One
        // Setiap Eprint berhubungan dengan satu Subject,
        // tetapi satu Subject bisa terkait dengan banyak Eprint.
        return $this->belongsTo(Subject::class);
    }

    public function documentType()
    {
        // Tipe Relasi: Many to One
        // Setiap Eprint berhubungan dengan satu DocumentType,
        // tetapi satu DocumentType bisa terkait dengan banyak Eprint.
        return $this->belongsTo(DocumentType::class);
    }

}
