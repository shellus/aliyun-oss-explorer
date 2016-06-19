<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use OSS\Core\OssException;
use OSS\OssClient;

class AliossController extends Controller
{
    /** @var OssClient $ossClient */
    protected $ossClient;
    protected $bucket;
    public function __construct(Request $request){

        $accessKeyId = env('OSS_ID');
        $accessKeySecret = env('OSS_KEY');
        $endpoint = env('OSS_HOST');
        $this -> bucket = $request['b'];
        $this -> ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
    }


    public function getBucket(){

        $buckets = $this -> ossClient -> listBuckets();
        return view('bucket', ['buckets' => $buckets]);

    }


    public function getPath(Request $request){
        $path = $request -> get('p', '');

        $list = $this -> ossClient ->listObjects($this -> bucket, ['prefix' => $path]);
        $vars = ['path' => $path?:'/', 'paths' => $list->getPrefixList(), 'objects' => $list -> getObjectList()];
        return view('path', $vars);
    }


    public function getSignUrl(Request $request){

        $object = $request -> get('o');
        $time = $request -> get('t');
        $signedUrl = $this -> ossClient->signUrl($this -> bucket, $object, $time);
        return $signedUrl;

    }
}
