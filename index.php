<?php
include_once('./models/Student.php');

$students = Student::index();

if(isset($_POST['submit'])) {
    $response = Student::create([
        'name' => $_POST['name'],
        'nis' => $_POST['nis']
    ]);

    setcookie('message', $response, time() + 10);

    header("Location: index.php");
}

if(isset($_POST['delete'])){
    $response = Student::delete($_POST['id']);

    setcookie('message', $response, time() + 10);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Rank Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div class="">
        <div class="bg-yellow-300 p-3">
            <h1 class="text-xl">Class Rank Tailwind</h1>
        </div>
        <div class="flex">
            <div class="basis-1/4  p-3">
                <div class="bg-slate-200 rounded-xl p-2">
                    <h1 class="text-xl  mb-2">Form Input Nilai</h1>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input class="rounded-xl p-1 block w-full" type="text" id="name" name="name" placeholder="Masukkan nama">
                    </div>
                    <div class="mb-3">
                        <label for="Nis">Nis</label>
                        <input class="rounded-xl p-1  block w-full" type="number" id="nis" name="nis" placeholder="Masukkan nis">
                    </div>
                    <div class="grid gap-2">
                        <button class=" bg-yellow-300 hover:bg-yellow-500 p-1 rounded-xl" type="submit" name="submit">SUBMIT</button>
                    </div>
                   </form>
                </div>
            </div>
            <div class="basis-3/4 p-3">
                <div class="bg-slate-200 rounded-xl  p-3">
                    <h1 class="text-xl  mb-2">Tabel Data</h1>
                    <table class="table w-full">
                        <thead>
                            <tr class="bg-yellow-300 border border-yellow-500">
                                <th class="px-6 py-3">No.</th>
                                <th class="px-6 py-3 text-center">Nama</th>
                                <th class="px-6 py-3">Nilai</th>
                                <th class="px-6 py-3"> Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach($students as $key => $student) : ?>
                            <tr class="bg-white border border-yellow-500">
                                <td class="px-6 py-3"><?= $key + 1 ?></td>
                                <td class="text-center px-6 py3"><?= $student['name'] ?></td>
                                <td class="px-6 py-3"><?= $student['nis'] ?></td>
                                <td class="px-6 py-3">
                                    <button class="bg-blue-500 hover:bg-blue-800 rounded-xl p-3 text-white"><a href="detail.php?id=<?= $student['id'] ?>" class= "bg-blue-500 hover:bg-blue-800
                                    p-3 rounded-xl text-white">Detail</a></button>
                                    
                                    <button class="bg-green-500 hover:bg-green-800 rounded-xl p-3 text-white"><a href="edit.php?id=<?= $student['id'] ?>" class= "bg-green-500 hover:bg-green-800
                                    p-3 rounded-xl text-white">Edit</a></button>
                                    
                                    <form action=""method="POST"class="inline">
                                    <input type="hidden" name="id" value="<?= $student['id']?>">
                                    <button type="submit" name="delete" class="bg-red-500 hover:bg-red-800 rounded-xl p-3 text-white">
                                        Hapus
                                    </button>
                                    </form>
                                </td>
                            </tr>
                         <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center bg-yellow-500 p-3">
            ©Copyright 2023 Handhika Tia Saputro 
        </div>

    </div>
  </body>
</html>