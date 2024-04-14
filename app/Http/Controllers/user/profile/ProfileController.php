<?php

namespace App\Http\Controllers\user\profile;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Rules\LinkValidationRule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetLocationController;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = 'http://api.ipify.org/?format=json';
        $ipAddress = Http::get($url)->json();
        $data = $request->validate([
            'name' => 'required',
            'about_me' => 'required|min:10',
            'date_of_birth' => 'required|date',
            'link' => 'url',
        ]);
        $data['ipaddress'] = $ipAddress['ip'];
        $data['location'] = Http::get("https://api.bigdatacloud.net/data/reverse-geocode-client?ip={$request->ip()}&localityLanguage=en")->json('countryName');
        $data['user_id'] = auth()->id();

        Profile::create($data);

        return redirect(route('home'));

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            abort(404);
        }
        
        // dd($user->followers()->count());
        return view('user.profile.show',[
            'user' => $user,
            'authUser' => Auth::user(),
            'posts' => $user->post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {

        $authUser = Auth::user();
        $user = User::where('username', $username)->firstOrFail();

        if ($user->id !== $authUser->id) {
            abort(403, 'Unauthorized');
        }

        return view('user.profile.edit', ['user' => $user, 'authUser' => $authUser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request, $username)
    {
        $user = Auth::user();
        if ($user->id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        $profile = Profile::find($user->profile->id);
        $profile->name = $request->name;
        $profile->about_me = $request->about_me;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->link = $request->link;
        $profile->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        //
    }

}
