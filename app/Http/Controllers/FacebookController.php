<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FacebookController extends Controller
{
    //
	public function deleteCallback($id)
{
	$process = processdelete($id);
	return response()->json(['url'=>'https://www.tanyaconfidence-rewardvaganza.com/ccc12345','confirmation_code'=>'ccc12345']);
}

public function processdelete($id)
{
	list($encoded_sig, $payload) = explode('.',$id,2);
        $secret = 'be83c0f88faabecd0222525454e09f6d';
        $sig = base64_decode(strtr($encoded_sig, '-_','+/'));
        $data = json_decode(base64_decode(strtr($payload)),true);
        $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
        if ($sig !== $expected_sig) {
        //error_log('Bad Signed JSON signature!');
        return null;
        }
        return $data;

}

public function policyPrivacy()
{
	return view('policy');
}

}
