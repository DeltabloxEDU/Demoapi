<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LogDownloadController extends Controller
{
    /**
     * Handle the download of the Laravel log file.
     *
     * @return BinaryFileResponse
     */
    public function downloadLog()
    {
        $filePath = storage_path('logs/laravel.log');

        if (!file_exists($filePath)) {
            abort(404, 'Log file does not exist.');
        }

        return response()->download($filePath);
    }
}
