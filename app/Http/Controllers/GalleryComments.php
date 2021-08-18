<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\GalleryImages;
use Auth;

class GalleryComments extends Controller
{
    // Using the same comments table throughout the site, polymorphic relationship, using the model.

    public function update(Request $request, $id)
    {
        if (isset($request->comment) && $this->authorize('Member'))

        {
            $image = GalleryImages::find($id);
            $comment = new Comments;
            $comment->body = $request->comment;
            $comment->user_id = Auth::user()->id;
            $image->comments()->save($comment);

            return redirect()->back();

        } else {

            $validator = Validator::make($request->all(), [
            'comment' => 'required',
            ])->validate();
        }

        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Comments::destroy($id);
        return back();
    }
}
