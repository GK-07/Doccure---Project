<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .result-container{
        width: 100px; height: 22px;
        background-color: #ccc;
        vertical-align:middle;
        display:inline-block;
        position: relative;
        top: -4px;
    }
    .rate-stars{
        width: 100px; height: 22px;
        background: url(resources/shared/doctor/rate-star1.png) no-repeat;
        background-size: cover;
        position: absolute;
    }
    .rate-bg{
        height: 22px;
        background-color: #ffbe10;
        position: absolute;
    }
    </style>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
     <div style="margin-top: 10px">
            <div class="result-container">
                <div class="rate-bg" style="width:70%"></div>
                <div class="rate-stars"></div>
            </div>
    </div>
</body>
</html>