<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahan CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .login-container {
            display: flex;
            max-width: 800px; /* Ubah max-width sesuai kebutuhan */
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .left-container {
            flex: 1;
            overflow: hidden;
        }

        .left-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .right-container {
            flex: 1;
            padding: 40px; /* Menambahkan padding untuk memperbesar area formulir */
        }

        .login-form {
            max-width: 400px; /* Sesuaikan dengan kebutuhan */
            margin: 0 auto;
        }

        .login-form h2 {
            text-align: center; /* Tengahkan judul */
        }

        .login-form label {
            display: block;
            margin-bottom: 8px;
        }

        .login-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: none; /* Hapus border */
            border-bottom: 1px solid #ccc; /* Tambahkan garis bawah */
            outline: none; /* Hapus outline */
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="login-container">
        <div class="left-container">
            <img src="assets/images/hospital.jpg" alt="Login Image">
        </div>
        <div class="right-container">
            <div class="login-form">
                <h2>Registrasi</h2>
                <form id="registerForm">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-control" name="role" id="role" required>
                                <option value="dokter">Dokter</option>
                                <option value="pasien">Pasien</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-block" onclick="registerUser()">Registrasi</button>
                        </div>
                </form>

                <div class="register-link">
                    <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function registerUser() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var role = document.getElementById('role').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'process_register.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: response.message,
                            timer: 3000,
                            showConfirmButton: false
                        }).then(function() {
                            window.location.href = 'login.php';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message
                        });
                    }
                }
            };
            var data = 'username=' + username + '&password=' + password + '&role=' + role;
            xhr.send(data);
        }
    </script>
</body>
</html>