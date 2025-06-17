
<?php
move_uploaded_file($_FILES["archivo"]["tmp_name"], 'archivos/' . $_FILES["archivo"]["name"]);
echo "Archivo Subido";
?>