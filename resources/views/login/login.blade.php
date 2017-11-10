<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $nama }}</h1>
    <h1>{{ $sekolah }}</h1>
    <ul>
        @foreach($dataArray as $data)
            @if($data == 'KAMU')
                <li>Dika Budiaji</li>
            @else
                <li>{{ $data }}</li>    
            @endif
            
        @endforeach
    </ul>

    @include('login.form')
    
</body>
</html>