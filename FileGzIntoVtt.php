<?php

class FileGzIntoVtt
{
    public function unzipGz(string $gz_file) {
        $buffer_size = 4096; // read 4kb at a time
        $out_file_name = str_replace('.gz', '', $gz_file);
        $file = gzopen($gz_file, 'rb');
        $out_file = fopen($out_file_name, 'wb');
        $str='';
        while(!gzeof($file)) {
            fwrite($out_file, gzread($file, $buffer_size));
        }
        fclose($out_file);
        gzclose($file);
    }
}