<?php
require 'functions.php';

$id = $_GET['user_id'];
if( hapus($id) > 0 ) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'admin_dashboard.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'admin_room_management.php';
        </script>
    ";
}
?>