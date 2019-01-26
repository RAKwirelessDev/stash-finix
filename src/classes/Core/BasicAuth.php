<?php

namespace Core;

class BasicAuth
{

    public $auth_file;
    public $users;

    public function __construct(string $auth_file, bool $create_file = false) {
        $this->auth_file = $auth_file;
        if (file_exists($auth_file)) {
            $this->file_parse();
        } elseif ($create_file) {
            file_put_contents($auth_file, '');
        } else {
            throw new \Exception('auth-file file does not exist');
        }
        return true;
    }

    public function add_user(string $username, string $password) {
        if (empty($username) || empty($password) ||
                key_exists($username, $this->users) ||
                strpos($username, ':')) {
            return false;
        }
        $this->users[$username] = Crypt::hash($password);
        $this->publish();
        return true;
    }

    public function login_test(string $username, string $password) {
        if (!empty($username) && !empty($password) &&
                key_exists($username, $this->users) &&
                !strpos($username, ':') &&
                Crypt::check($password, $this->users[$username])) {
            return true;
        }
        return false;
    }

    private function publish() {
        unlink($this->auth_file);
        foreach ($this->users as $username => $password) {
            $data = $username.':'.$password;
            file_put_contents($this->auth_file, $data."\n", FILE_APPEND);
        }
    }

    private function file_parse() {
        $data = file_get_contents($this->auth_file);
        $users = explode("\n", $data);
        foreach ($users as $user) {
            $user = explode(":", $user);
            if (empty($user[0]) || empty($user[1])): break; endif;
            $this->users[$user[0]] = $user[1];
        }
    }



}