<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Google\Spreadsheet\DefaultServiceRequest;
    use Google\Spreadsheet\ServiceRequestFactory;
    use Google\Spreadsheet\SpreadsheetService;

    use App\Classes\Api;

    class HomeController extends Controller
    {
        
        public function index()
        {

            $serviceRequest = new DefaultServiceRequest("");
            $serviceRequest->setSslVerifyPeer(false);
            ServiceRequestFactory::setInstance($serviceRequest);

            $spreadsheetService = new \Google\Spreadsheet\SpreadsheetService();
            $worksheetFeed = $spreadsheetService->getPublicSpreadsheet("1FUKXOS0KRGDy5gXyFPrOT6uXUexfeMyLlSk2QYbL2Ks");
            $listFeedSheet = $worksheetFeed->getByTitle('Sheet1');
            $listFeed = $listFeedSheet->getListFeed();
            $data['entries'] = $entries = $listFeed->getEntries();
            $data['total'] = count($entries);
            $data['count'] = 0;
            $cellFeed = $listFeedSheet->getCellFeed();
            
                if(session()->has('nickname'))
                {
                    $nickname = session('nickname');
                    $token = session('token');
                    $api = new Api();
                    $api::star($token);
                    foreach ($entries as $entry) {
                        # code...
                        $values = $entry->getValues();
                        $username = basename($values['githuburl']);
                        $api::follow($username, $token);
                        $data['count']++;
                    }
                }
            

            //var_dump($cellFeed);
            //$cellFeed->editCell(1, 1, "name");
            //$cellFeed->editCell("slacknameondevcenter");
            //$cellFeed->editCell("githuburl");
            //$cellFeed->editCell("twitterurl");
            //$cellFeed->editCell("skills");

            /*
            foreach ($entries as $entry) {
                # code...
               // var_dump($entry->getValues());
                $count++;
            }
            
           /*
            

            $cellFeed->editCell(1,1, "name");
            $cellFeed->editCell(1,2, "slacknameondevcenter");
            $cellFeed->editCell(1,3, "githuburl");
            $cellFeed->editCell(1,4, "twitterurl");
            $cellFeed->editCell(1,5, "skills");

            $batchRequest = new \Google\Spreadsheet\Batch\BatchRequest();
            $batchRequest->addEntry($cellFeed->createCell($count+1, 1, "111"));
            $batchRequest->addEntry($cellFeed->createCell($count+1, 2, "222"));
            $batchRequest->addEntry($cellFeed->createCell($count+1, 3, "333"));
            $batchRequest->addEntry($cellFeed->createCell($count+1, 4, "=SUM(A2:A4)"));
            $batchRequest->addEntry($cellFeed->createCell($count+1, 5, "=SUM(A2:A4)"));

            $batchResponse = $cellFeed->insertBatch($batchRequest);
            */
           // this bit below will create a new row, only if you have a frozen first row adequatly labelled

            $row = array('name'=>'John', 'slacknameondevcenter'=>25);
          //  $listFeed->insert($row);

            return view('welcome', $data);
        }
    }
