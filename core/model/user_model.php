

<?php

class UserModel
{

    private $fullName;
    private $email;
    private $phone;
    private $password;
    private $token;

    private $createdAt;

    /**
     * @param RoleModel $name
     */
    private RoleModel $role;

    public function __construct($fullName = null, $email = null, $phone = null, $password = null, $role = new RoleModel(), $token = null, $createdAt)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->role = $role;
        $this->token = $token;
        $this->createdAt = $createdAt;
    }

    // public static function loginData($email, $password)
    // {
    //     $user = new UserModel(
    //         null,
    //         $email,
    //         null,
    //         $password,
    //         null,
    //         null
    //     );
    // }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function getUserEmail()
    {
        return $this->email;
    }

    public function getUserPhone()
    {
        return $this->phone;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getToken()
    {
        return $this->token;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function toArray()
    {
        return [
            "fullName" => $this->fullName,
            "email" => $this->email,
            "phone" => $this->phone,
            "password" => $this->password,
            "token" => $this->token,
            "createdAt" => $this->createdAt,
            "role" => $this->role->toArray(),
        ];
    }
}
