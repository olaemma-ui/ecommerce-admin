<?php
class RoleModel {
    private $roleId;
    private $roleName;
    private $dateCreated;

    public function __construct($roleId = null, $roleName = null, $dateCreated = null) {
        $this->roleId = $roleId;
        $this->roleName = $roleName;
        $this->dateCreated = $dateCreated;
    }

    // Getters
    public function getRoleId() {
        return $this->roleId;
    }

    public function getRoleName() {
        return $this->roleName;
    }

    public function getDateCreated() {
        return $this->dateCreated;
    }

    // Convert object properties to array
    public function toArray() {
        return [
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
            'dateCreated' => $this->dateCreated
        ];
    }
}