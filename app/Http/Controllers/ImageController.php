<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ImageController extends Controller
{
    public static function storeImage(Request $request): Image
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $image = new Image;
 
        $image->url = $imageName;
 
        $image->save();

        return $image;
    }

    public function destroy(Request $request): RedirectResponse
    {
        $chirp = Chirp::with('user')->find($request->chirp_id);

        $this->authorize('delete', $chirp);
 
        $chirp->image->delete();

        return back()->with('message', 'Image Deleted');
    }
}
