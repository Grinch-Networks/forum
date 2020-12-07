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

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active"><?php echo $data["section"]["name"]; ?></li>
    </ol>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $data["section"]["name"]; ?></div>
                <div class="panel-body" style="padding:0">
                        <?php if( $data["section"]["posts"] ){ ?>
                            <table class="forum">
                                <?php foreach( $data["section"]["posts"] as $post ){ ?>
                                <tr>
                                    <td><span class="glyphicon glyphicon-file"></span></td>
                                    <td>
                                        <div><a href="/<?php echo $data["section"]["id"]; ?>/<?php echo $post["id"]; ?>"><?php echo $post["name"]; ?></a></div>
                                        <p>Comments: <strong><?php echo $post["comments"]; ?></strong></p>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        <?php }else{ ?>
                            <div class="alert alert-info text-center" style="margin:10px">
                                <p>There are no posts in this section</p>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>