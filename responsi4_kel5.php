<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

     <!-- font kelompok 5 -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <title>Enkripsi dan Deskripsi kata</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        .container{
            width : 600px;
            border : 5px solid salmon;
            margin : 10px auto;
            padding :20px;
            text-align:center;
        }

        span{
            color:red;
        }

        .judul{
            font-family: 'Viga', sans-serif;
        }

    </style>
</head>
<body>
    <div class="container">
    <h1 class="judul">Aplikasi Enkripsi dan Deskripsi</h1>
    <br><br>
    <form method="POST">
        <div class="mb-3">
            <label for="kata" class="form-label">Masukkan Kata</label>
            <input type="text" class="form-control" id="kata" name="kata">
        </div>
        <button type="submit" class="btn btn-primary" name="enkripsi">Enkripsi</button>
        <button type="submit" class="btn btn-danger" name="decrypt">Dekripsi</button>
    </form>
<?php

if(isset($_POST['kata'],$_POST['enkripsi'])){
    $kata = $_POST['kata'];
    echo "<br> <h3>Hasil Enkripsi : "."<span>".encrypt($kata)."</span>"."</h3>";
}

if(isset($_POST['kata'],$_POST['decrypt'])){
    $kata = $_POST['kata'];
    $ubah = new Ubah($kata);
    echo "<br> <h3>Hasil Dekripsi : "."<span>".$ubah->decrypt($kata)."</span>"."</h3>";
}

function encrypt($kata){
    $output = "";
    $newKata = strtolower($kata);
    $arr_char = str_split($newKata);
    $new_char = array();
    // convert
    for($i=0;$i<count($arr_char);$i++){
        $char_number = (int)ord($arr_char[$i])+5;
        if($char_number>122){
            $selisih = $char_number-122;
            $new_char_item = 96+$selisih;
            $new_char_item = chr($new_char_item);
        }else{
            $new_char_item = chr($char_number);
        }
        array_push($new_char,$new_char_item);
    }
    $output = implode("",$new_char);
    return $output;
}

class Ubah{
    private $kata;
    
    public function __construct($kata){
        $this->kata = $kata;
    }

    function decrypt(){
        $output = "";
        $newKata = strtolower($this->kata);
        $arr_char = str_split($newKata);
        $new_char = array();
        // convert
        for($i=0;$i<count($arr_char);$i++){
            $char_number = (int)ord($arr_char[$i])-5;
            if($char_number<97){
                $selisih = 97-$char_number;
                $new_char_item = 123-$selisih;
                $new_char_item = chr($new_char_item);
            }else{
                $new_char_item = chr($char_number);
            }
            array_push($new_char,$new_char_item);
        }
        $output = implode("",$new_char);
        return $output;
    }
}
?>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  
</body>
</html>