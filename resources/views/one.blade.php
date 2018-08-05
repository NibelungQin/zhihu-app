<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
</head>
<body>
<select class="js-example-basic-single" name="state">
    <option value="AL">Alabama</option>
    ...
    <option value="WY">Wyoming</option>
</select>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
</body>
</html>