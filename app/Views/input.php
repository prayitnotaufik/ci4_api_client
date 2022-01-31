<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Input</title>
</head>

<body>
    <nav class="nav">
        <a class="nav-link" href="/data/input">Input</a>
        <a class="nav-link" href="/data/output">Output</a>
    </nav>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Nomor Handphone</h5>
                    </div>
                    <div class="card-body">
                        <form action="/data/create" method="POST">
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Handphone</label>
                                <input type="number" class="form-control" id="no_hp" name="no_hp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Provider</label>
                                <select class="form-select" aria-label="Default select example" id="provider" name="provider">
                                    <option value="xl">XL</option>
                                    <option value="tsel">Telkomsel</option>
                                    <option value="tri">Tri</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success mx-2">Save</button>
                                <!-- <button type="submit" class="btn btn-primary mx-2">Auto</button> -->
                                <a href="#" class="btn btn-primary" onclick="random()">Auto</a>
                            </div>
                        </form>
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