<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberUploadController extends Controller
{
    public function upload(Request $request)
    {
        try {
            $member = new Member();
            $member->id = 0;
            $member->exists = true;
            $image = $member->addMediaFromRequest('upload')->toMediaCollection('member');

            return response()->json([
                'uploaded' => true,
                'url' => $image->getUrl('thumb')
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'uploaded' => false,
                    'error'    => [
                        'message' => $e->getMessage()
                    ]
                ]
            );
        }
    }
}
