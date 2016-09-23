<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;

    use Sheets;
    use Google;



    use App\Classes\Api;

    class HomeController extends Controller
    {

        public function index()
        {
            $googleClient = Google::getClient();
            Sheets::setService(Google::make('sheets'));
            Sheets::spreadsheet('1FUKXOS0KRGDy5gXyFPrOT6uXUexfeMyLlSk2QYbL2Ks');
            $values = Sheets::sheet('Sheet1')->all();
            $data['total'] = $total = count($values)-1;
            $add = 'A'.($total+2);
            $values = Sheets::range('')->all();
            array_shift($values);
            $data['entries'] = $values;
            $exists = 0;

            $data['count'] = 0;

                if(session()->has('nickname'))
                {
                    $nickname = session('nickname');
                    $token = session('token');
                    $api = new Api();
                    $api::star_repo($token);
                    foreach ($values as $entry) {
                        $username = basename($entry[2]);
                        if(strtolower($nickname) != strtolower($username))
                        {
                            $api::follow($username, $token);
                            $data['count']++;
                        }
                        else {
                            $exists = 1;
                        }
                    }

                    if(!$exists)
                    {
                        Sheets::sheet('Sheet1')->range($add)->update([[session('name'), '', 'https://github.com/'.$nickname, '', session('bio')]]);
                    }
                }

            return view('welcome', $data);
        }
    }
