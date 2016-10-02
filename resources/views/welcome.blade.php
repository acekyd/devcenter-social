<!doctype html>
<html lang="en">
    <head>
        <title>Devcenter-Square Social</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Devcenter Square Social is a utility app to automate social connections among members of the Devcenter Square community.">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/all.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="assets/img/devcenter.png">
    </head>
    <body>
        <section class="four columns">
            <div class="input-data">
                <div>
                    <div class="img-container">
                        <img src="assets/img/devcenter.png" alt="devcenter" />
                    </div>
                    <br />
                    @if(isset($error))
                        <div class="error">
                          {{$error}}
                        </div>
                    @endif
                    @if(session('nickname') && !isset($error))
                    <div class="alert">
                      Yaaay! Welcome to the club!
                    </div>
                    <form action="update" method="post">
                        {{ csrf_field() }}
                        <input class="u-full-width" type="text" name="name" placeholder="Name" value="{{$user[0] or ''}}"><br>
                        <input class="u-full-width" type="text" name="slacknameondevcenter" placeholder="Slack Username" value="{{$user[1] or ''}}"><br>
                        <input class="u-full-width" type="text" name="skills" placeholder="Skills" value="{{$user[4] or ''}}"><br>
                        <button type="submit">Update Profile</button>
                        <a href="https://docs.google.com/spreadsheets/d/1FUKXOS0KRGDy5gXyFPrOT6uXUexfeMyLlSk2QYbL2Ks/edit#gid=0" target="_blank">
                            <button class="google-doc">
                                <span class="fa fa-file-text-o icon"></span>
                                <span>See all Users</span>
                            </button>
                        </a>
                    </form>
                    @else
                    <p>Welcome to the community.</p>
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
                        @foreach($entries as $values)
                            <tr>
                                <td style="width:20%;">{{$values[0] or ""}}</td>
                                <td style="width:25%;">{{$values[1] or ""}}</td>
                                <td style="width:35%;">{{$values[4] or ""}}</td>
                                <td style="width:20%;">{!!((isset($values[2]))? "<a href='$values[2]' target='_blank'><button>View Github</button></a>": "")!!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </body>
</html>
