# If you really need crypto-level security, you should read from /dev/random, the following code should work for you in any POSIX-compliant system (anything but Windows)
#Generate a random key from /dev/random
function get_key($bit_length = 128){
    $fp = @fopen('/dev/random','rb');
    if ($fp !== FALSE) {
        $key = substr(base64_encode(@fread($fp,($bit_length + 7) / 8)), 0, (($bit_length + 5) / 6)  - 2);
        @fclose($fp);
        return $key;
    }
    return null;
}
