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
        $dc_chat_ui = $client->request('PUT', '/user/starred/devcenter-square/android-chat-ui');
        $dc_angular = $client->request('PUT', '/user/starred/devcenter-square/angular-export');
        $dc_bg_guide = $client->request('PUT', '/user/starred/devcenter-square/beginner-guide');
        $dc_d_info_api = $client->request('PUT', '/user/starred/devcenter-square/disease-info');
        $dc_d_info_pwa = $client->request('PUT', '/user/starred/devcenter-square/disease-info-ui');
        $dc_ng_bank_parser = $client->request('PUT', '/user/starred/devcenter-square/ng-bank-parser');
        $dc_squaredex_api = $client->request('PUT', '/user/starred/devcenter-square/squaredex');
        $dc_squaredex_ui = $client->request('PUT', '/user/starred/devcenter-square/squaredex-ui');
        $dc_states_cities = $client->request('PUT', '/user/starred/devcenter-square/states-cities');
        $status = $response->getStatusCode();

          return json_decode($response->getBody(), true);
      }
        catch (RequestException $e) {
        //return $e->getRequest();
        return false;
      }

    }
}