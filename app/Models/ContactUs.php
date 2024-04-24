<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ContactUsController;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    protected $primaryKey = 'ContactUsID';

    protected $fillable = [
        'Name', 'Email', 'PhoneNumber', 'Message',
    ];
    // Other model configurations or methods if needed
}
