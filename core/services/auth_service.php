<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/repository/auth_epository.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/validator/data_validator.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ecommerce-admin/core/config/database/db_table_names.php');

class AuthenticationService extends AuthenticationRepository
{
    private $table;

    public function __construct($table = null)
    {
        parent::__construct();
        $this->table = empty($table) ? DatabaseTable::$ADMIN : $table;
    }
    // Authenticate user
    public function authenticate($email, $password)
    {
        $error = [];
        $result =  null;
        $email = DataValidator::sanitizeInput($email);
        $password = DataValidator::sanitizeInput($password);

        if (empty($password) || empty($email)) {
            $error['email'] = empty($email) ? 'This field is required' : null;
        } else {
            $error['email'] = DataValidator::validateEmail($email) ? null : 'Enter a valid Email';
            $error['password'] = DataValidator::validatePasswordStrength($password) ? null : 'Password must contain 1 upper, lower case letters, special charcter and number';
        }

        $psw = sha1($password);

        if (empty($error['email']) && empty($error['password'])) {
            return $result =  $this->authenticateUser($email, $psw, $this->table);
        } else {
            return [
                'token' => null,
                'message' => 'Form validation error',
                'success' => false,
                'data' => null,
                'error' => $error,
            ];
        }

        if ($result === 1) {
            return [
                'token' => null,
                'message' => 'Invalid credentials',
                'success' => false,
                'data' => null,
                'error' => $error,
            ];
        }
        if ($result === 0) {
            return [
                'token' => null,
                'message' => "Account does not exit!",
                'success' => false,
                'data' => null,
            ];
        }
        if ($result) {
            return [
                'message' => 'Success',
                'success' => true,
                'error' => $error,
                'data' => $result,
            ];
        } else {
            return [
                'message' => 'Error occurred',
                'success' => false,
                'error' => $error,
                'data' => $result,
            ];
        }
    }

    // Register new user
    public function register($email, $password, $fullName, $phone, $roleId)
    {
        $error = [];

        $userModel = new UserModel(
            fullName: $fullName,
            email: $email,
            password: $password,
            phone: $phone,
            role: new RoleModel(
                roleId: $roleId
            ),
            createdAt: date('Y-m-d H:i:s')
        );

        foreach ($userModel as $key => $value) {

            //sanitize the user input before validation
            $value = DataValidator::sanitizeInput($value);

            if (empty($value) && $key != 'role') {
                $error[$key] = 'This field is required';
            } else {
                if (DataValidator::validateEmail($userModel->getUserEmail())) { {
                        $error['email'] = 'Invalid Email address';
                    }

                    if (DataValidator::validateMobileNumber($userModel->getUserPhone())) {
                        $error['phone'] = 'Invalid mobile number';
                    }

                    if (DataValidator::validateName($userModel->getFullName())) {
                        $error['fullName'] = 'Enter a valid name';
                    }

                    if (DataValidator::validatePasswordStrength($userModel->getPassword())) {
                        $error['password'] = 'Password must contain atleast 1 upper, lower, special character and number.';
                    }
                }
            }

            if (!empty($error)) {
                return [
                    'message' => 'Form validation error',
                    'success' => false,
                    'error' => $error,
                    'data' => $userModel->toArray(),
                ];
            }

            if ($this->userExists($email)) {
                return [
                    'message' => 'This email is already taken',
                    'success' => false,
                    'error' => $error,
                    'data' => $userModel->toArray(),
                ];
            }

            // Hash the password
            $hashedPassword = sha1($password);

            // Call the repository to register the user
            $result = $this->registerUser($email, $hashedPassword, $fullName, $phone, $roleId, $this->table);

            return [
                'message' => $result ? 'Success' : 'Error occurred',
                'success' => $result,
                'error' => $error,
                'data' => $userModel->toArray(),
            ];
        }
    }
}
