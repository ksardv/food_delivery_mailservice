<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    const EMAIL_INIT_STATUS = "created";
    const EMAIL_PROC_STATUS = "processing";

    protected $guarded = [];
}
