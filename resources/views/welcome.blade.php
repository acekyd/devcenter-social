<!doctype html>
<html lang="en">
<head>
    <title>Devcenter-Social</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="Devcenter Social is an utility app to automate social connections among members of the DevCenter community.">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
</head>
<body>
    <section class="four columns">
        <div class="input-data">
            <div>
                <div class="img-container">
                    <img src="assets/img/devcenter.png" alt="devcenter" />
                </div>
                <br />
                <p>Welcome to the community.</p>
                @if(session('nickname'))
                <br>
                <form>
                    <input class="u-full-width" type="text" name="name" placeholder="Name" value="{{session('name')}}"><br>
                    <input class="u-full-width" type="text" name="slacknameondevcenter" placeholder="Slack Username" value="{{session('nickname')}}"><br>
                    <input class="u-full-width" type="text" name="skills" placeholder="Skills" value="{{session('bio')}}"><br>
                </form>
                <button>Update Profile</button>
                @else
                <a href="auth/github"><button class="gh">
                    <span class="fa fa-github icon"></span>
                    <span>Join and Follow {{$total}} Users</span>
                </button>
                </a>
                @endif

      </div>
        </div>
    </section>
    <section class="eight columns">
        <div class="data">
            <table class="u-full-width">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slack name on DevCenter</th>
                        <th>Skills</th>
                        <!--<th>Twitter Url</th>-->
                        <th>Github Url</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($entries as $values)
                    {
                        echo '<tr>
                            <td style="width:20%;">'.((isset($values[0]))? $values[0]: "").'</td>
                            <td style="width:25%;">'.((isset($values[1]))? $values[1]: "").'</td>
                            <td style="width:35%;">'.((isset($values[4]))? $values[4]: "").'</td>
                            <td style="width:20%;">'.((isset($values[2]))? "<a href='".$values[2]."' target='_blank'><button>View Github</button></a>": "").'</td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
      </table>
        </div>
    </section>
</body>
</html>
