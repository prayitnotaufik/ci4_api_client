<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Output</title>
</head>

<body>
    <nav class="nav">
        <a class="nav-link" href="/data/input">Input</a>
        <a class="nav-link" href="/data/output">Output</a>
    </nav>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Output Ganjil</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) : ?>
                                    <?php if ($d['no_hp'] % 2 != 0) { ?>
                                        <tr>
                                            <td><?= $d['no_hp']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="/data/update/<?= $d['id']; ?>">Edit</a></li>
                                                        <li><a class="dropdown-item" href="/data/delete/<?= $d['id']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</a></li>
                                                    </ul>
                                                </div>
                                                <!-- <a href="#" class="btn btn-warning">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a> -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Output Genap</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) : ?>
                                    <?php if ($d['no_hp'] % 2 == 0) { ?>
                                        <tr>
                                            <td><?= $d['no_hp']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="/data/update/<?= $d['id']; ?>">Edit</a></li>
                                                        <li><a class="dropdown-item" href="/data/delete/<?= $d['id']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</a></li>
                                                    </ul>
                                                </div>
                                                <!-- <a href="#" class="btn btn-warning">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a> -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function random() {
            var firstNum = ['087', '081', '089'];
            var number = Math.floor(100000000 + Math.random() * 900000000);
            var randomProv = Math.floor(Math.random() * firstNum.length);
            var fixProv;
            if (firstNum[randomProv] == '087') {
                fixProv = 'xl'
            } else if (firstNum[randomProv] == '081') {
                fixProv = 'tsel'
            } else {
                fixProv = 'tri'
            }
            document.getElementById('no_hp').value = firstNum[randomProv] + number;
            document.getElementById('provider').value = fixProv;
        }
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>