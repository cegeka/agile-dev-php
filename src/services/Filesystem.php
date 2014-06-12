<?php


class Filesystem {

    public function __construct()
    {
        // ...
    }

    public function read($file)
    {
        if( !file_exists($file) ) {
            throw new InvalidArgumentException('File does not exist');
        }

        return json_decode( file_get_contents( $file ) );
    }

    public function write($file, $data, $overrideExisting = true)
    {
        if( $overrideExisting ) {
            $this->delete( $file );
        }

        file_put_contents( $file, json_encode( $data ) );
    }

    public function delete($file)
    {
        if( file_exists($file) ) {
            unlink( $file );
        }
    }

}