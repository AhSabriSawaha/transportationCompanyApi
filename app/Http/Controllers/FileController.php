<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $validated = $request->validate([
            'file' => ['required', 'mimes:jpg,bmp,png,pdf,xlsx,mp4,doc,docx,txt'],
        ]);
        $originalFilename = $request->file->getClientOriginalName();
        $newFilename = 'file_' . time() . '_' . rand(1000, 9999) . '.' . $request->file->getClientOriginalExtension();

        $request->file->move(public_path('temp'), $newFilename);

        return response()->json([
            'file' => $newFilename
        ]);
    }
}
