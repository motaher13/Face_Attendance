<html>
<body>
<p>abul</p>
@php
    $path_parts = pathinfo('/www/htdocs/index.html?abul=babul');

echo $path_parts['dirname']."<br>";
echo $path_parts['basename']. "<br>";
echo $path_parts['extension']. "<br>";
echo $path_parts['filename']. "<br>";
@endphp
</body>
</html>