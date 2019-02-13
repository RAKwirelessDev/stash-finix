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
        $search = array_search(trim($key), $this->keys);
        if ($search !== false && !empty($key)) {
            unset($this->keys[$search]);
            // $this->keys = array_values($this->keys);
            $this->publish();
            return true;
        }
        return false;
    }

    public function key_check(string $key) {
        if (in_array($key, $this->keys)) {
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
                $this->keys[] = trim($key);
            }
        }
    }

}