<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forum</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        table.forum {
            width:100%
        }

        table.forum tr {
            height: 70px;
        }

        table.forum tr:nth-child(even) {
            background-color:#c8e9f5
        }

        table.forum tr td:first-child {
            width:50px;
            text-align: center;
        }

        table.forum tr td:first-child span {
            font-size:18px;
        }

    </style>
</head>
<body>
<div class="container" style="margin-top:20px">
    <h1 class="text-center">Forum</h1>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">General</div>
                <div class="panel-body" style="padding:0">
                    <table class="forum">
                        <?php foreach( $data["section"]["general"] as $section ){ ?>
                        <tr>
                            <td><span class="glyphicon glyphicon-folder-open"></span></td>
                            <td>
                                <div><a href="/<?php echo $section["id"]; ?>"><?php echo $section["name"]; ?></a></div>
                                <p>Posts: <strong><?php echo $section["posts"]; ?></strong></p>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">Admin</div>
                <div class="panel-body" style="padding:0">
                    <?php if( $data["admin"] ){ ?>
                        <table class="forum">
                            <?php foreach( $data["section"]["admin"] as $section ){ ?>
                                <tr>
                                    <td><span class="glyphicon glyphicon-folder-open"></span></td>
                                    <td>
                                        <div><a href="/<?php echo $section["id"]; ?>"><?php echo $section["name"]; ?></a></div>
                                        <p>Posts: <strong><?php echo $section["posts"]; ?></strong></p>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php }else{ ?>
                        <div class="alert alert-info text-center" style="margin:15px">
                            <p>You need to be an admin to view these posts</p>
                        </div>
                    <?php } ?>
                </div>
            </div>


        </div>
    </div>
</div>
</body>
</html>