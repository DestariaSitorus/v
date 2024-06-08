<?php
$koneksi = mysqli_connect("localhost", "root", "", "datadesta");

session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // "register" sesuai sama nama table
   $query = " SELECT * FROM register WHERE username='$username' AND password='$password'";
   $cekuser=mysqli_query($koneksi,$query);

   if($cekuser && mysqli_num_rows($cekuser) ==1 0){
      $user = mysqli_fetch_assoc($cekuser);
      $role = $user['role'];

      $_SESSION
      if($role == 'user'){
    echo "<script>
          alert('Welcome');
          window.location.href = 'main.php';
          </script>";
    exit();
      }elseif($role=='admin'){
            echo "<script>
            alert('Welcome');
            window.location.href = 'main.php';
            </script>";
      }elseif ($role=='petugas'){
            echo "<script>
            alert('Username/Password Invalid');
            window.location.href = 'main.php';
            </script>";
      exit();
       } else { 
    echo "<script>
          alert('Username/Password Invalid');
          window.location.href = 'index.php';
          </script>";
    exit();
}
}
?>
