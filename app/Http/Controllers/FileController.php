<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Models\ProfileImage;
use App\Models\User;
use Carbon\Carbon;

class FileController extends Controller
{
    /**

     * Show the form for creating a new resource.

     *

     * @return Response

     */

    public function index()

    {

        $files = ProfileImage::all();
        return Inertia::render('Tests/FileUpload', compact('files'));
    }


    public function getProfileImage()
    {
        try {

            $profileImages = ProfileImage::all()->map(function ($row) {
                return $row ? [
                    'id' => $row->id,
                    'user_id' => $row->user_id,
                    'imageName' => $row->image_name,
                    'imageData' => 'data:image/png;base64,'.$row->image_data,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at
                ] : null;
            });

            return response()->json([
                'status' => 200,
                'profileImages' => $profileImages
            ]);

        } catch (\Exception $error) {
            return response()->json($error->getMessage());
        }
    }


    /**

     * Show the form for creating a new resource.

     *

     * @return Response

     */

    public function store(Request $request)

    {

        // Validator::make($request->all(), [

        //     'userID' => ['required'],
        //     'name' => ['required'],
        //     'imageFile' => ['required'],

        // ])->validate();

        $request->validate([
            'userID' => ['required', 'exists:users,id'], // ตรวจสอบว่ามี user นี้ในระบบหรือไม่
            'name' => ['required', 'string'],
            'imageFile' => ['required', 'file', 'mimes:jpg,jpeg,png,gif', 'max:2048'], // จำกัดขนาดไม่เกิน 2MB
        ]);


        $file = $request->file('imageFile');


        if (!$file) {
            return back()->withErrors(['imageFile' => 'File upload error!']);
        }


        $dateTimeNow = Carbon::now();

        $imageData = file_get_contents($file->getRealPath());
        $imageDataBase64 = base64_encode($imageData);

        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('uploads'), $fileName);

        $user = User::findOrFail($request->userID);

        // if ($user) {
        //     ProfileImage::update([
        //         'image_name' => $fileName,
        //         'image_data' => $imageDataBase64,
        //         'updated_at' => $dateTimeNow
        //     ]);
        //     $status = "Update";
        // } else {

        //     ProfileImage::create([
        //         'user_id' => $request->userID,
        //         'image_name' => $fileName,
        //         'image_data' => $imageDataBase64,
        //         'created_at' => $dateTimeNow
        //     ]);
        //     $status = "Create";
        // }
        ProfileImage::create([
            'user_id' => $request->userID,
            'image_name' => $fileName,
            'image_data' => $imageDataBase64,
            'created_at' => $dateTimeNow
        ]);
        $status = "Create";

        return redirect()->route('profile.dashboard')
            ->with('success', 'upload image profile successfully!', $status);
    }
}
