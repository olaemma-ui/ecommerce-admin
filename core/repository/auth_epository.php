<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/utils/utilis.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/database/database_config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/required/global_imports.php');
abstract class AuthenticationRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Authenticate user
    final protected function authenticateUser($email, $password, $table): array | bool|int
    {
        // Prepare SQL statement to fetch user data based on email
        $stmt = $this->db->mysqli->prepare(
            "SELECT $table.user_id, $table.email, $table.full_name, $table.phone, $table.password, $table.createdAt,
                roles.role_id, roles.role_name, roles.date_created
                FROM $table
                INNER JOIN roles ON $table.role_id = roles.role_id
                WHERE $table.email = ?"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $token = generateToken();

            // Verify password
            if ($this->verifyPassword($password, $user['password'])) {
                return [
                    'token' => $token,
                    'message' => 'Login successful',
                    'success' => true,
                    'data' => (new UserModel(
                        userId: $user['user_id'],
                        fullName: $user['full_name'],
                        email: $user['email'],
                        phone: $user['phone'],
                        password: null,
                        token: $token,
                        role: new RoleModel(
                            $user['role_id'],
                            $user['role_name'],
                            $user['date_created']
                        ),
                        createdAt: $user['createdAt'],
                    ))->toArray()
                ];
            }
            return 1;
        }
        return 0;
    }

    // Register new user (encrypt password)
    final protected function registerUser($email, $full_name, $phone, $password, $role_id, $table)
    {
        $hashedPassword = sha1($password);

        $uuid = generateUniqueId();
        // Prepare SQL statement to insert user data
        $stmt = $this->db->mysqli->prepare("INSERT INTO $table (user_id, email, full_name, phone, password, role_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param($uuid, $email, $full_name, $phone, $hashedPassword, $role_id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    final public function userExists($email)
    {
        $stmt = $this->db->mysqli->prepare("SELECT COUNT(*) as count FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    // Verify password
    private function verifyPassword($password, $hashedPassword)
    {
        return $password === $hashedPassword;
    }
}
