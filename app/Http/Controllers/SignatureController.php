<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function index()
    {
        return view('admin.student.signature');
    }

    public function upload(Request $request)
    {

        // dd($request->student_id);
        $id = $request->student_id;

        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        //decode image 
        $image_base64 = base64_decode($image_parts[1]);

        // file_name
        // $file_name = "id-" . $id . "-" . time() . $file->getClientOriginalName();
        $file_name = 'id' . '-' . $id . '-' . time() . '-' . uniqid() . '.' . $image_type;


        // path + file_name
        $folderPath = 'public/upload/';
        $file_upload = $folderPath . $file_name;

        // save image to public folder
        Storage::disk('local')->put($file_upload, $image_base64);

        // save to database
        $data = Image::where('student_id', $id)->first();
        if (!$data) {
            Image::create([
                'student_id' => $id,
                'image' => $file_name
            ]);
        } else {
            return back()->with('success', 'data sudah ada');
        }

        return back()->with('success', 'success Full upload signature');
    }
}
