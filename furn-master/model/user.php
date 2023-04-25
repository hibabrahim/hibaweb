<?php


class USER{
    private $id;
    private $fullname;
    private $password;
    private $email;
    private $gender;
    private $role;
    private $phone;
   private $adresse;
    private $createdAt;
    private $modifiedAt;
    private $deletedAt;
    private $profilePic;
    private $dateOfBirth;
    private $IsDeleted;

    public function __construct($id =null , $fullname = null , $adresse = null, $password = null, $email = null, $gender = null, $role = null, $createdAt = null, $modifiedAt = null, $deletedAt = null, $profilePic = null, $phone = null, $dateOfBirth = null ,  $IsDeleted = null) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->password = $password;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->phone = $phone;

        $this->gender = $gender;
        $this->role = $role;
        $this->createdAt = $createdAt;
        $this->modifiedAt = $modifiedAt;
        $this->deletedAt = $deletedAt;
        $this->profilePic = $profilePic;
        $this->dateOfBirth = $dateOfBirth;       
         $this->IsDeleted = $IsDeleted;

    }
   

    // Getters and setters for each property
public function getid(){
    return $this->id;
}


    public function setid($id){
        $this->id = $id;
    }
   
    public function getfullname(){
        return $this->fullname;
    }
    
    public function setfullname($fullname){
        $this->fullname = $fullname;
    }
    public function getadresse() {
        return $this->adresse;
    }

    public function setadresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    
    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function getModifiedAt() {
        return $this->modifiedAt;
    }

    public function setModifiedAt($modifiedAt) {
        $this->modifiedAt = $modifiedAt;
    }

    public function getIsdeleted() {
        return $this->IsDeleted;
    }
    public function SetIsdeleted($Isdeleted) {
        $this->IsDeleted = $Isdeleted;
    }

    public function getDeletedAt() {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt) {
        $this->deletedAt = $deletedAt;
    }

    public function getProfilePic() {
        return $this->profilePic;
    }

    public function setProfilePic($profilePic) {
        $this->profilePic = $profilePic;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;}

        public function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;
    }
}
?>