<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            padding :10px;
            text-align:center;
        }

    </style>
</head>
<body>
    <div class="container">
    <h1>Aplikasi Enkripsi dan Deskripsi</h1>
    <br>
    <h3>Kelompok 5 Praktikum DKP</h3>
    <br>
            <form method="POST">
                <label for="kata">Masukkan Kata</label>
                <input type="text" name="kata" style="text-transform:lowercase">
                <input type="submit" value="enkripsi" name="enkripsi">
                <input type="submit" value="dekripsi" name="decrypt">
            </form>
<?php

if(isset($_POST['kata'],$_POST['enkripsi'])){
    $kata = $_POST['kata'];
    echo "<br> <h2>Hasil Enkripsi : ".encrypt($kata)."</h2>";
}

if(isset($_POST['kata'],$_POST['decrypt'])){
    $kata = $_POST['kata'];
    $ubah = new Ubah($kata);
    echo "<br> <h2>Hasil Dekripsi : ".$ubah->decrypt($kata)."</h2>";
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
    
</body>
</html>