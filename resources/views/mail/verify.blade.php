<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Akun</title>
</head>

<body>
    <p>
        Halo <b>{{ $details['nama'] }}</b> !
    </p>
    <br>
    <p>
        Berikut ini adalah data anda :
    </p>

    <table>
        <tr>
            <td>Full Name</td>
            <td>:</td>
            <td>{{ $details['nama'] }}</td>
        </tr>
        <tr>
            <td>Sebagai</td>
            <td>:</td>
            <td>Anggota</td>
        </tr>
        <tr>
            <td>Website</td>
            <td>:</td>
            <td>{{ $details['website'] }}</td>
        </tr>
        <tr>
            <td>Tanggal Register</td>
            <td>:</td>
            <td>{{ $details['datetime'] }}</td>
        </tr>
    </table>
    <br><br><br>
    <center>
        <h3>Click link dibawah ini untuk verifikasi akun :</h3>
        <a href="{{ $details['url'] }}"
            style="text-decoration: none; color: rgb(255,255,255); padding: 9px; background-color:blue; font: bold; border-radius:20%;">Verifikasi</a>
        <br><br><br>
        <p>
            <i class="fa fa-copyright" aria-hidden="true">Copyright | Project UAS</i>
        </p>
    </center>
</body>

</html>
