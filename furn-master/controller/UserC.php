<?php

include __DIR__ . '/../model/user.php';
include __DIR__ . '/../config.php';

class UserC {
    public function create(USER $user) {
        $db = config::getConnexion();
        $stmt = $db->prepare("INSERT INTO user (id,fullname,phone,password,email,gender,created_at,profile_pic,adresse,dateofbirth) VALUES (:id, :fullname, :phone, :password, :email, :gender, :created_at, :profile_pic, :adresse, :dateofbirth)");
        $stmt->bindValue(':id', $user->getId());
        $stmt->bindValue(':fullname', $user->getFullname());
        $stmt->bindValue(':phone', $user->getPhone());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':gender', $user->getGender());
        $stmt->bindValue(':created_at', $user->getCreatedAt());
        $stmt->bindValue(':profile_pic', $user->getProfilePic());
        $stmt->bindValue(':adresse', $user->getAdresse());
        $stmt->bindValue(':dateofbirth', $user->getDateOfBirth());
        $stmt->execute();
        $user->setId($db->lastInsertId());
        return $user;
      }
    
      public function login ($email) {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT * FROM user WHERE email=:email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
  
    function verifyCredentials($email, $password) {
            $db = config::getConnexion();
            $stmt = $db->prepare('SELECT * FROM user WHERE email = :email AND is_deleted = 0 LIMIT 1');
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($user && password_verify($password, $user['password'])) {
                // Password is correct, so return the user's ID
                return $user['id'];
            } else {
                // Invalid credentials
                return false;
            }
        }
    
        public function getUserByEmail($email) {
            $db = config::getConnexion();
            $stmt = $db->prepare('SELECT * FROM user WHERE email = :email');
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if (!$userData) {
                return null; // User not found
            }
        
            $user = new USER();
            $user->setId($userData['id']);
            $user->setfullname($userData['fullname']);
            $user->setPhone($userData['phone']);
            $user->setPassword($userData['password']);
            $user->setEmail($userData['email']);
            $user->setGender($userData['gender']);
            $user->setRole($userData['role']);
            $user->setProfilePic($userData['profile_pic']);
            $user->setadresse($userData['adresse']);
        
            return $user;
        }
        public function getUserByUsername($email) {
            $db = config::getConnexion();
            $stmt = $db->prepare('SELECT fullname FROM user WHERE email = :email');
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user['fullname'];
        }
        public function getUserByProfilePic($email) {
            $db = config::getConnexion();
            $stmt = $db->prepare('SELECT profile_pic FROM user WHERE email = :email');
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user['profile_pic'];
        }
        
        
        public function update(User $user) {
            $db = config::getConnexion();
            $stmt = $db->prepare("UPDATE user SET fullname = :fullname, phone = :phone, password = :password, email = :email, gender = :gender, role = :role, created_At = :createdAt, profile_Pic = :profilePic, adresse = :adresse, dateOfBirth = :dateOfBirth , Modified_at = :modified_at WHERE id = :id");
            $stmt->bindValue(':id', $user->getId());
            $stmt->bindValue(':fullname', $user->getfullname());
            $stmt->bindValue(':phone', $user->getPhone());
            $stmt->bindValue(':password', $user->getPassword());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':gender', $user->getGender());
            $stmt->bindValue(':role', $user->getRole());
            $stmt->bindValue(':createdAt', $user->getCreatedAt());
            $stmt->bindValue(':profilePic', $user->getProfilePic());
            $stmt->bindValue(':adresse', $user->getadresse());
            $stmt->bindValue(':dateOfBirth', $user->getDateOfBirth());
            $stmt->bindValue(':modified_at', $user->getModifiedAt());
        
            $stmt->execute();
            return $user;
        }        
        public function getUserById($id) {
            $db = config::getConnexion();
            $stmt = $db->prepare("SELECT * FROM user WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                return null;
            }
            $user = new User();
            $user->setId($result['id']);
            $user->setfullname($result['fullname']);
            $user->setPhone($result['phone']);
            $user->setPassword($result['password']);
            $user->setEmail($result['email']);
            $user->setGender($result['gender']);
            $user->setRole($result['role']);
            $user->setCreatedAt($result['created_at']);
            $user->setProfilePic($result['profile_pic']);
            $user->setadresse($result['adresse']);
            $user->setDateOfBirth($result['dateofbirth']);
            $user->SetIsdeleted($result['is_deleted']);
                    $user->SetIsdeleted($result['is_deleted']);
               
    
            return $user;
        }
        public function delete($id) {
            $db = config::getConnexion();
            $stmt = $db->prepare("DELETE FROM user WHERE id=:id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }
        public function softDelete($id) {
            $db = config::getConnexion();
            $stmt = $db->prepare("UPDATE user SET is_deleted = 1 WHERE id=:id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
          }

          public function ReadAll(){
            $db = config::getConnexion();
            $stmt = $db->prepare("SELECT * FROM user ORDER BY fullname");
            $stmt->execute();
            $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        }
        public function getUserByEmail2($email) {
            $db = config::getConnexion();
    
            $stmt = $db->prepare( 'SELECT * FROM user WHERE email = :email LIMIT 1');
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        function updateUserResetToken($email, $token) {
            // Connect to database
            $db = config::getConnexion();    
            // Update reset token in database
            $stmt = $db->prepare("UPDATE user SET reset_token = :token WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":token", $token);
            $stmt->execute();
        }
        function updateUserPassword($token, $password) {
            $db = config::getConnexion();    
    
            $stmt = $db->prepare("SELECT * FROM user WHERE reset_token = ?");
            $stmt->execute([$token]);
            $user = $stmt->fetch();
        
            if (!$user) {
                return false; // Token not found
            }
        
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
            $stmt = $db->prepare("UPDATE user SET password = ?, reset_token = NULL WHERE id = ?");
            $stmt->execute([$hashedPassword, $user['id']]);
        
            return true; // Password updated successfully
        }
      
       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    }
    




?>