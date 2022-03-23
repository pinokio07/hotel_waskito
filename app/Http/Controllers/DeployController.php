<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DeployController extends Controller
{
    public function index()
    {
      // $githubPayload = $request->getContent();
      // $githubHash = $request->header('X-Hub-Signature');
      // $localToken = config('app.deploy_secret');
      // $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);
      // if (hash_equals($githubHash, $localHash)) {

        // $abc = $request->sha;

        // if(!$abc){
        //   return "FAILED";
        // }

        // $localToken = config('app.git_deploy_secret');

        // if($abc === $localToken){
          $gitUser = config('app.git_username');
          $gitPass = config('app.git_password');
  
          $proses = new Process('git pull https://'.$gitUser.':'.$gitPass.'@github.com/pinokio07/hotel_fadilah');
          $proses->setWorkingDirectory(base_path());
  
          $proses->run();
  
          if($proses->isSuccessful()){
              return "OK";
          } else {
              throw new ProcessFailedException($proses);
          }
        // }
        
      // }
    }
}
