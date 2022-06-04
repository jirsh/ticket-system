<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use Illuminate\Support\Facades\Storage;

class Attachment extends Controller
{
    /**
     * Downloads attachment.
     *
     * @param  int  $id
     * @return Illuminate\Http\Response
     */
    public function download($id)
    {
        $attachment = \App\Models\Attachment::find($id);
        if (!$attachment)
            return abort(404);

        $files = Storage::files('files/' . $id);
        if (empty($files))
            return abort(404);
        
        return Storage::download($files[0], $attachment->original_file_name);
    } 
}
