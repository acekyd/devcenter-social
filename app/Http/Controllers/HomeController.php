<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Sheets;
use Google;
use Illuminate\Http\Request;
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

        $count = 0;

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
                    }
                    else {
                        session()->put('cell_row', 'A'.($count+2));
                        $exists = 1;
                        $data['user'] = $entry;
                    }
                    $count++;
                }
                if(!$exists)
                {
                    if(session('name') == null || session('bio') == null)
                    {
                        $data['error'] = "Update your Github profile and try again.";
                        session()->flush();
                    }
                    else {
                        $data['user'] = [session('name'), '', 'https://github.com/'.$nickname, '', session('bio')];
                        Sheets::sheet('Sheet1')->range($add)->update([[session('name'), '', 'https://github.com/'.$nickname, '', session('bio')]]);
                        session()->put('cell_row', $add);
                    }
                }
            }

        return view('welcome', $data);
    }

    public function update(Request $request)
    {
        $googleClient = Google::getClient();
        Sheets::setService(Google::make('sheets'));
        Sheets::spreadsheet('1FUKXOS0KRGDy5gXyFPrOT6uXUexfeMyLlSk2QYbL2Ks');
        Sheets::sheet('Sheet1')->range(session('cell_row'))->update([[$request->name, $request->slacknameondevcenter, 'https://github.com/'.session('nickname'), '', $request->skills]]);
        
        return redirect('/');
    }
}
