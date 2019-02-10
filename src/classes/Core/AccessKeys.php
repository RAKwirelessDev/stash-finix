<?php

namespace Core;

class AccessKeys
{

    public $keys_file;
    public $keys;

    public function __construct(string $keys_file, bool $create_file = false) {
        $this->keys_file = $keys_file;
        if (file_exists($keys_file)) {
            $this->file_parse();
        } elseif ($create_file) {
            file_put_contents($keys_file, '');
        } else {
            throw new \Exception('auth-file file does not exist');
        }
        return true;
    }

    public function delete_key(string $key) {
        if (!empty($key) && in_array($key, $this->keys)) {
            unset($this->keys[array_search($key, $this->keys)]);
            $this->publish();
            return true;
        }
        return false;
    }

    private function publish() {
        unlink($this->keys_file);
        foreach ($this->keys as $key) {
            if (!empty($key)) {
                file_put_contents($this->keys_file, $key."\n", FILE_APPEND);
            }
        }
    }

    private function file_parse() {
        $data = file_get_contents($this->keys_file);
        $keys = explode("\n", $data);
        foreach ($keys as $key) {
            if (!empty($key)) {
                $this->keys[] = $key;
            }
        }
    }

}