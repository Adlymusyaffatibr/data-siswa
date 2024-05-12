<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<style>
    .login-box{
        width:600px;
        height: 375px;
        /* border: solid 1px; */
        box-sizing:border-box;
        border-radius:10px;
        margin-bottom:30px;
        margin-top:30px;
    }
    
    .main a{
        color:white;
        text-decoration: none;
    }
</style>

<div class="main d-flex flex-column justify-content-center align-items-center ">
        <div class="login-box p-5 shadow ">
        <h1 style="text-align:center">MASUKKAN DATA SISWA</h1>
    <form method="POST" action="">
        <table border="0">
            <tr>
                <div class="form-floating mb-3">
                    <input type="text" name="nama"class="form-control" id="floatingInput"></input>
                    <label for="floatingInput">Name </label>
                </div>
            </tr>
            <tr> 
                <div class="form-floating mb-3">
                    <input type="number" name="nis" class="form-control"id="nis"></input>
                    <label for="nis"class="form-label">NIS </label>
                </div>
            </tr>
            <tr>
                <div class="form-floating mb-3">
                    <input type="text" name="rayon" class="form-control"id="rayon"></input>
                    <label for="rayon"class="form-label">RAYON</label></td>
                </div>  
            </tr>
            <tr>    
                <td colspan="2"><button type="submit" name="kirim"class="btn btn-primary">Submit</button></td>
            </tr>
        </table>
    </form>
    </div>
        <div>
    <!-- pembuka php -->
    <?php 
    //memulai sesi
    session_start();
    
    //array multidimensi belum ada buat dulu
    if(!isset($_SESSION['dataSiswa'])){
        $_SESSION['dataSiswa'] = array();
    }

    //array ada, buat array dati data yang dimasukkan
    if(isset($_POST['kirim'])){
        if(@$_POST['nama'] && @$_POST['nis'] && @$_POST['rayon']){
    if(isset($_SESSION['dataSiswa'])){
        $data = [
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon'],
        ];
        array_push($_SESSION['dataSiswa'], $data);
    }
    }  
}  

    if(!empty($_SESSION['dataSiswa'])){
        // var_dump($_SESSION);
        echo '<table class="table">';
        echo '<tr>';
        echo '<td>NAMA</td>';
        echo '<td>NIS</td>';
        echo '<td>RAYON</td>';
        echo '</tr>';
    
        //nampilin data pake table
        foreach($_SESSION['dataSiswa'] as $index => $value){
            echo '<tr>';
            echo '<td>'. $value['nama']. '</td>';
            echo '<td>'. $value['nis']. '</td>';
            echo '<td>'. $value['rayon']. '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }else{
        echo "ISI DATANYA TERLEBIH DAHULU!!";
    }
    ?>
                </div>
</body>
</html>