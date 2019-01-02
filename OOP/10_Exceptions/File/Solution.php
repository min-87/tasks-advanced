<?php

namespace File;

// BEGIN (write your solution here)
function read($filename)
{
    if (!file_exists($filename)) {
        throw new Exceptions\FileNotFoundException("File {$filename} does not exist");
    }
    return file_get_contents($filename);
}

// END
