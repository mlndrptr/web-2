<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .harga-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .harga-container h4 {
            margin-bottom: 20px;
        }
        .harga-container ul {
            list-style-type: none;
            padding: 0;
        }
        .harga-container ul li {
            margin-bottom: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body style="font-size: 18px;">
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-6">
                <form method="POST" action="total_belanja.php">
                    <fieldset class="border border-dark p-3 rounded" style="background-color: ivory;">
                        <legend class="float-none w-auto px-3 fw-bold h3">Belanja Online</legend>
                        <div class="form-group row">
                            <label for="nama" class="col-4 col-form-label">Nama Customer</label> 
                            <div class="col-8">
                                <input id="nama" name="nama" placeholder="*Mulandari Putri" type="text" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Pilih Produk</label> 
                            <div class="col-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="produk" id="tv" value="TV" required>
                                    <label class="form-check-label" for="tv">TV</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="produk" id="kulkas" value="KULKAS">
                                    <label class="form-check-label" for="kulkas">Kulkas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="produk" id="mesincuci" value="MESIN CUCI">
                                    <label class="form-check-label" for="mesincuci">Mesin Cuci</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-4 col-form-label">Jumlah</label> 
                            <div class="col-8">
                                <input id="jumlah" name="jumlah" type="number" required="required" class="form-control">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn btn-success">Kirim</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="col-md-6">
                <br>
                <table class="table">
                    <thead>
                        <tr style="background-color: lightblue">
                            <th scope="col">Daftar Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td>TV : Rp 4.200.000</td>
                        </tr>
                        <tr>
                            <td>Kulkas : Rp 3.100.000</td>
                        </tr>
                        <tr>
                            <td>Mesin Cuci : Rp 3.000.000</td>
                        </tr>
                        <tr style="background-color: lightblue">
                            <th scope="row">Harga dapat berubah kapan saja!</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>