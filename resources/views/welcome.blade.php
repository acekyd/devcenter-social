<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><img src="logo.png" style="width:50px; height="auto" "></div>
                <a href="auth/github">Join and Follow {{$total}} Users and counting...</a>
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Slack name on DevCenter</th>
                        <th>Github Url</th>
                        <th>Twitter Url</th>
                        <th>Skills</th>
                    </thead>
                    <tbody>
                    <?php foreach($entries as $entry)
                    {
                        $values = $entry->getValues();
                        echo '<tr>
                            <td>'.$values['name'].'</td>
                            <td>'.$values['slacknameondevcenter'].'</td>
                            <td>'.$values['githuburl'].'</td>
                            <td>'.$values['twitterurl'].'</td>
                            <td>'.$values['skills'].'</td>
                            </tr>
                        ';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
