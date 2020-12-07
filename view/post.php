<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<div class="container" style="margin-top:20px">
    <h1 class="text-center">Forum</h1>

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/<?php echo $data["section"]["id"]; ?>"><?php echo $data["section"]["name"]; ?></a></li>
        <li class="active"><?php echo $data["post"]["name"]; ?></li>
    </ol>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $data["post"]["name"]; ?></h3>
            </div>
            <div class="panel-body">
                <div class="col-xs-2 text-center">
                    <div><span style="font-size:72px;color:#9ec2f1" class="glyphicon glyphicon-user"></span></div>
                    <div style="margin-top:7px">
                        <?php echo $data["post"]["user"]; ?>
                    </div>
                </div>
                <div class="col-xs-10">
                    <div class="well well-sm" style="margin:0;font-size:12px"><?php echo $data["post"]["content"]; ?></div>
                    <div style="font-size: 10px;margin-top:7px">Posted at <?php echo $data["post"]["date"]; ?></div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach( $data["comments"] as $comment ){ ?>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Comment</h3>
            </div>
            <div class="panel-body">
                <div class="col-xs-2 text-center">
                    <div><span style="font-size:72px;color:#9ec2f1" class="glyphicon glyphicon-user"></span></div>
                    <div style="margin-top:7px">
                        <?php echo $comment["user"]; ?>
                    </div>
                </div>
                <div class="col-xs-10">
                    <div class="well well-sm" style="margin:0;font-size:12px"><?php echo $comment["content"]; ?></div>
                    <div style="font-size: 10px;margin-top:7px">Posted at <?php echo $comment["date"]; ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Leave A Comment</h3>
                </div>
                <div class="panel-body">

                    <div class="alert alert-danger" style="margin:0;text-align: center">
                        <p>Thread <strong>closed</strong>, comments are disabled</p>
                    </div>

                </div>
            </div>

        </div>
    </div>



</div>
</body>
</html>
