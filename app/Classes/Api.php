<?php 
namespace App\Classes;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Api{

    public static function follow($user, $token)
    {
        $client = new \GuzzleHttp\Client([
          // Base URI is used with relative requests
          'base_uri' => 'https://api.github.com',
          'headers' => ['Authorization' => 'token '.$token, 'Content-Length' => 0]
      ]);
      
      try {
        $response = $client->request('PUT', '/user/following/'.$user, []);
        $status = $response->getStatusCode();

          return json_decode($response->getBody(), true);
      }
        catch (RequestException $e) {
        //return $e->getRequest();
        return false;
      }

    }

    public static function star_repo($token)
    {
        $client = new \GuzzleHttp\Client([
          // Base URI is used with relative requests
          'base_uri' => 'https://api.github.com',
          'headers' => ['Authorization' => 'token '.$token, 'Content-Length' => 0]
      ]);
      
      try {
        $response = $client->request('PUT', '/user/starred/acekyd/devcenter-social');
        $status = $response->getStatusCode();

          return json_decode($response->getBody(), true);
      }
        catch (RequestException $e) {
        //return $e->getRequest();
        return false;
      }

    }
}