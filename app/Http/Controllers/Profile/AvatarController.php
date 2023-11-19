<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use OpenAI\Laravel\Facades\OpenAI;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
//        $path=$request->file('avatar')->store('avatars', 'public');
            $path=Storage::disk('public')->put('avatars',$request->file('avatar'));

        if ($oldAvatar=$request->user()->avatar){

            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar'=>$path]);
//        dd(auth()->user());
        return redirect(route('profile.edit'))-> with('message','Avatar is updated');
    }
    public function generate(){
        $result = OpenAI::images()->create([
            "prompt"=>"avatar for the user in the style of Tim Burton",
            "n"=>1,
            "size"=>"256x256"
        ]);


        $contents=file_get_contents($result->data[0]->url);
        $filename=Str::random(25);
        Storage::disk('public')->put("avatars/$filename.jpg",$contents);
        auth()->user()->update(['avatar'=>"avatars/$filename.jpg", $contents]);
        Return redirect(route('profile.edit'))-> with('message','Avatar is updated');

    }
}
