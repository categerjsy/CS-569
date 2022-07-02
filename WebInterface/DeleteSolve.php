<?php
include 'config.php';

mysqli_query($conn, "DELETE FROM solve WHERE 1");
echo "Deleted";