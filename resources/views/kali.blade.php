<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
</head>
<body>
    <h1>Form Kali</h1>
    <form action="/action-kali" method="post">
        @csrf
        <label for="angka1">Angka ke-1: </label>
        <input type="number" name="angka1" id="angka1">
        <br><br>
        <label for="angka2">Angka ke-2: </label>
        <input type="number" name="angka2" id="angka2">
        <br>
        <button type="submit">Proses</button>
    </form>
    <br><br>
    <h3>Hasilnya adalah: {{ $hasil }} </h3>
</body>
</html>
