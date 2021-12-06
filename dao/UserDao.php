<?php

    require_once("models/User.php");
    require_once("models/message.php");

    class UserDao implements UserDAOInterface{

        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url){
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildUser($data){
            $user = new User();

            $user->id = $data["id"];
            $user->name = $data["name"];
            $user->lastname = $data["lastname"];
            $user->senha = $data["senha"];
            $user->image = $data["image"];
            $user->token = $data["token"];

            return $user;

        }
        public function create(User $user, $authUser = false){
            $stmt = $this->conn->prepare("INSERT INTO users(
                name, lastname, email, senha, token ) VALUES (:name, :lastname, :email, :senha, :token )");
            
            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":lastname", $user->lastname);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":senha", $user->senha);
            $stmt->bindParam(":token", $user->token);

            $stmt->execute();

            //autenticação
            if($authUser){
                $this->setTokenToSession($user->token);

            }

        }
        public function update(User $user, $redirect = true){

            $stmt = $this->conn->prepare("UPDATE users SET 
                name = :name,
                lastname = :lastname,
                email = :email,
                image = :image,
                token = :token
                WEHRE id = :id
            ");

            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":lastname", $user->lastname);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":image", $user->image);
            $stmt->bindParam(":token", $user->token);
            $stmt->bindParam(":id", $user->id);

            $stmt->execute();

            if($redirect){
                //redirecionar para a Home
                $this->message->setMessage("Dados Atualizado com sucesso!", "success", "home.php");
            }

        }
        public function verifyToken($protected = false){
           if(!empty($_SESSION["token"])){
            // pegar token
                $token = $_SESSION["token"];

                $user= $this->findByToken($token);
                
                if($user){
                    return $user;
                } else if($protected){
                     //redirecionar para a index.php
                    $this->message->setMessage("Usuario não autorizado, realize seu loguin!", "error", "index.php");
                }

           }  else if($protected){
            //redirecionar para a index.php
           $this->message->setMessage("Usuario não autorizado, realize seu loguin!", "error", "index.php");
             }
        }
        public function setTokenToSession($token, $redirect = true){
            //salvar token na sessaion
            $_SESSION["token"] = $token;

            if($redirect){
                //redirecionar para a Home
                $this->message->setMessage("Seja Bem vindo!", "success", "home.php");
            }

        }
        public function authenticateUser($email, $senha){

            $user = new User();

           $user = $this->findByEmail($email);

           if($user){

            // Checar se as senhas batem
            if(password_verify($senha, $user->senha)) {

                //gerar token e inserir na sessão
                $token = $user->generateToken();

                $this->setTokenToSession($token);

                // att token user
                $user->token = $token;

                $this->update($user, false);

                return true;

            } else {
                return false;
            }

           } else {
               return false;
           }
          
        }
        public function findByEmail($email){

            if($email != ""){

                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email") ;

                $stmt->bindParam(":email", $email);

                $stmt->execute();
                
                if($stmt->rowCount() > 0 ){
                    
                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);

                    return $user;

                }else{
                    return false;
                }

            } else {
                return false;
            }

        }
        public function findById($id){


        }
        public function findByToken($token){
            
            if($token != ""){

                $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token") ;

                $stmt->bindParam(":token", $token);

                $stmt->execute();
                
                if($stmt->rowCount() > 0 ){
                    
                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);

                    return $user;

                }else{
                    return false;
                }

            } else {
                return false;
            }

        }

        public function destroyToken(){

            //remove o token da sessao
            $_SESSION["token"] = "";

            // Redirecionar e apresentar mensagem de sucesso
            $this->message->setMessage("Deslogado com sucesso", "succes", "index.php");
        }

        public function changeSenha(User $senha){


        }
    }
