<?php

include_once("./models/Student.php");

$id = $_GET['id'];
$student = Student::show($id);

?>

<?php include("./layouts/top.php"); ?>
<?php include("./layouts/header.php"); ?>
        <!-- Content -->
        <div class="flex bg-slate-300 rounded-xl p-3 m-3">
            <div class="basis-1/5  p-3">
             <p class="font-bold">Nama</p>
             <p class="font-bold">NIS</p>
            </div>
            <div class="basis-4/5">
                <p><?= $student['name'] ?></p>
                <p><?= $student['name'] ?></p>
            </div>
            <div class="grid gap-2">
                <a href="index.php" class="bg-yellow-300 p-3 rounded-xl text-white m-3 text-center">Kembali</button>
            </div>
        </div>
        <!-- endcontent -->
    <?php include("./layouts/footer.php"); ?>
     <?php include("./layouts/bottom.php"); ?>
