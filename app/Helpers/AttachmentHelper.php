<?php

namespace App\Helpers;

use App\Models\Reply;
use App\Models\Attachment;
use Illuminate\Http\UploadedFile;

class AttachmentHelper
{
    /**
     * Stores the files as attachments in the filesystem and database
     * 
     * @param UploadedFile[] $files
     * @param Reply $reply
     */
    static function storeAttachments($files, $reply)
    {
        foreach ($files as $file) {
            if (!$file->isValid())
                continue;

            $attachment = new Attachment;
            $attachment->original_file_name = $file->getClientOriginalName();
            $attachment->reply()->associate($reply);
            $attachment->save();
            $file->store('files/' . $attachment->id);
        }
    }
}
