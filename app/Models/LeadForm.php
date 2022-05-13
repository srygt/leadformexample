<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadForm extends Model
{
    protected $table = 'table_lead_form';

   protected $fillable = [
        LeadForm::COLUMN_ID,
        LeadForm::COLUMN_FULLNAME,
        LeadForm::COLUMN_EMAIL,
        LeadForm::COLUMN_PHONE,
        LeadForm::COLUMN_ADDRESS,
   ];

   const COLUMN_ID = 'id';
   const COLUMN_FULLNAME = 'fullname'; // Fullname kolon adı sabiti
   const COLUMN_EMAIL    = 'email'; // Email kolon adı sabiti
   const COLUMN_PHONE    = 'phone'; // Phone kolon adı sabiti
   const COLUMN_ADDRESS  = 'address'; // Address kolon adı sabiti
  

}
