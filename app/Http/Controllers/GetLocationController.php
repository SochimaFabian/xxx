<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class GetLocationController extends Controller
{
    public function getlocation($id){
        $profile = User::find($id)->profile;
        return Location::get($profile->ipaddress);
    }
}
