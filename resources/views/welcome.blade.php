<!DOCTYPE html>
<html>
    <head>
        <title>Devcenter Social</title>
        <meta name="Description" content="Devcenter Social is an utility app to automate social connections among members of the DevCenter community.">
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
            <div style="width:30%">
            <!-- This will only appear after user login -->
            Welcome to the community. Update your details blah blah
            <form>
                <input type="text" name="name" placeholder="Name"><br>
                <input type="text" name="slacknameondevcenter" placeholder="Slack Username"><br>
                <input type="text" name="skills" placeholder="Skills"><br>
            </form>
            </div>
            <div class="content" style="width:65%">
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
                    <?php foreach($entries as $values)
                    {
                        echo '<tr>
                            <td>'.((isset($values[0]))? $values[0]: "").'</td>
                            <td>'.((isset($values[1]))? $values[1]: "").'</td>
                            <td>'.((isset($values[2]))? $values[2]: "").'</td>
                            <td>'.((isset($values[3]))? $values[3]: "").'</td>
                            <td>'.((isset($values[4]))? $values[4]: "").'</td>
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
