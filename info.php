<html>
<head>
</head>
<body>
<p>HTML works!</p>
<br/>
<?php echo 'PHP works!'; 

    
if (!extension_loaded('mysqli')) {
    if (!dl('mysqli.so')) {
    echo "mysql extension not loaded";
    }
} else {
  echo "mysql extension loaded fine\n";
}
    
    phpinfo();
?>
</body>
</html>
