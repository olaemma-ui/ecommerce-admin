<?php
    require_once "session_keys.php";
class SessionManager
{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $this->regenerateSessionID();
        }
    }

    public function setSessionVariable($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function getSessionVariable($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    // Regenerate session ID (during login)
    private function regenerateSessionID()
    {
        // Regenerate session ID
        session_regenerate_id(true);
    }


    public function clear()
    {
        session_unset();
    }

    public function destroySession()
    {
        session_destroy();
    }
}
