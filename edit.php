<?php

include_once("./models/Student.php");

$student = Student::show($_GET['id']);

if(isset($_POST['submit'])) {
    $response = Student::update([
        'id'   => $_POST['id'],
        'name' => $_POST['name'],
        'nis'  => $_POST['nis'],
    ]);

    setcookie('message', $response, time() + 10);
    header("Location: index.php");
}
?>

<?php include_once ("./layouts/top.php");?> 
<?php include_once ("./layouts/header.php");?>
       
<div class="flex">
            <div class="w-full h-full  p-3">
                <div class="bg-slate-200 rounded-xl p-2 w-full">
                    <h1 class="text-xl  mb-2">Form Input Nilai</h1>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input class="rounded-xl p-1 block w-full" type="text"  id="id" name="name" placeholder="Masukkan nama" value="<?=$student['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Nis">Nis</label>
                        <input class="rounded-xl p-1  block w-full" type="number"  id="nis" name="nis" placeholder="Masukkan nis" value="<?=$student['nis'] ?>">
                    </div>
                    <div class="grid gap-2">
                        <button class=" bg-yellow-300 hover:bg-yellow-500 p-1 rounded-xl" type="submit" name="submit">SUBMIT</button>
                    </div>
                   </form>


<?php include_once ("./layouts/bottom.php");?> 

