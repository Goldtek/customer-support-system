<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>Customer Support System</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1" name="viewport" />
            <meta content="customer support system  " name="description" />
            <meta content="onwuegbuzie chisom dike" name="author" />
            <meta name="csrf-token" content="{{csrf_token()}}">
        
            <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
            <link href={{URL::to("font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css" />
            <link href={{URL::to("css/bootstrap.min.css")}} rel="stylesheet" type="text/css" />
            <link href={{URL::to("css/component.min.css")}} rel="stylesheet" type="text/css" />
            <link href={{URL::to("css/style.css")}} rel="stylesheet" type="text/css" />
            <link href={{URL::to("css/plugins.min.css")}} rel="stylesheet" type="text/css" />
            <link href={{URL::to("css/layout.min.css")}} rel="stylesheet" type="text/css" />
            <link href={{URL::to("css/blue.min.css")}} rel="stylesheet" type="text/css" id="style_color" />
            <link href={{URL::to("css/custom.min.css")}} rel="stylesheet" type="text/css" />
        
            <link rel="shortcut icon" href="favicon.ico" />
            @yield('style')
        </head>
        <body >
