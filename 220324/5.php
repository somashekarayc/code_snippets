<?php

$fh = fopen("testfile.txt", 'w') or die ("Failed to create file");
$text = <<<_END
Line 1
Line 2
Line 3
_END;
fwrite($fh, $text) or die ("Could not write to file");
fclose($fh);
echo "File 'testfile.txt' written successfully";

echo '<br>';


copy('testfile.txt', 'testfile2.txt') or die ("Could not copy file");
echo "File successfully copied to 'testfile2.txt'";
