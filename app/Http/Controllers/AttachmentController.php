<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    /**
     * Downloads attachment.
     *
     * @param  int  $id
     * @return Illuminate\Http\Response
     */
    public function download($id)
    {
        $attachment = Attachment::findOrFail($id);

        $files = Storage::files('files/' . $id);
        if (empty($files))
            return abort(404);

        return Storage::download($files[0], $attachment->original_file_name);
    }
}
