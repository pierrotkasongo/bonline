<?php
 require_once 'ConnexionBD.php';

class DataBase extends ConnexionBD
{
    public function  addCategories(Categories $categories){

        try {
            $query = $this->getConnexion()->prepare("INSERT INTO tbl_categories (
                                                                            nom_cat,
                                                                            description_cat)
                                                          VALUES (      :nom_cat,
                                                                        :description_cat)");
            $query->execute(array(
                'nom_cat' => $categories->getNom(),
                'description_cat' => $categories->getDescription()));
            $query->closeCursor();
            return "success";

        } catch (PDOException $e) {
            echo 'impossible de se connecter';
        }

    }

    public function getallCategories(){
        try {

            $query = $this->getConnexion()->prepare("SELECT *
                                                              FROM tbl_categories ORDER BY id DESC");
            $query->execute();
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function deleteOneCategories($id)
    {
        try {

            $query = $this->getConnexion()->prepare("DELETE FROM tbl_categories WHERE id=:id");
            $query->execute(array('id'=>$id));
            $query->closeCursor();
            return 'success';
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    public function  addMarque(Marques $marques){

        try {
            $query = $this->getConnexion()->prepare("INSERT INTO tbl_marques (
                                                                            marque)
                                                          VALUES (      :marque)");
            $query->execute(array(
                'marque' => $marques->getMarque()));
            $query->closeCursor();
            return "success";

        } catch (PDOException $e) {
            echo 'impossible de se connecter';
        }

    }

    public function getallMarques(){
        try {

            $query = $this->getConnexion()->prepare("SELECT *
                                                              FROM tbl_marques ORDER BY id_marque DESC");
            $query->execute();
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function deleteOneMarques($id)
    {
        try {

            $query = $this->getConnexion()->prepare("DELETE FROM tbl_marques WHERE id_marque=:id");
            $query->execute(array('id'=>$id));
            $query->closeCursor();
            return 'success';
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }


    public function  addProduit(Produits $produits){

        try {
            $query = $this->getConnexion()->prepare("INSERT INTO tbl_produits (
                                                                            nom,
                                                                            description,
                                                                            prixunitaire,
                                                                            catId,
                                                                            marqueId,
                                                                            photo)
                                                                        VALUES ( 
                                                                        :nom,
                                                                        :description,
                                                                        :prixunitaire,
                                                                        :catId,
                                                                        :marqueId,
                                                                        :photo)");
            $query->execute(array(
                'nom' => $produits->getNom(),
                'description' => $produits->getDescription(),
                'prixunitaire' => $produits->getPrixunitaire(),
                'catId' => $produits->getCat(),
                'marqueId' => $produits->getMarque(),
                'photo' => $produits->getPhoto()


            ));
            $query->closeCursor();
            return "success";

        } catch (PDOException $e) {
            echo 'impossible de se connecter';
        }

    }

    public function getallProduit(){
        try {

            $query = $this->getConnexion()->prepare("SELECT p.*,c.nom_cat,m.marque
                                                              FROM tbl_produits as p,
                                                              tbl_categories as c,
                                                              tbl_marques as m 
                                                              WHERE  p.catId=c.id
                                                              AND  p.marqueId = m.id_marque
                                                              ORDER BY id_produit DESC ");
            $query->execute();
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getFourProduit(){
        try {

            $query = $this->getConnexion()->prepare("SELECT *
                                                              FROM tbl_produits 
                                                              ORDER BY id_produit DESC LIMIT 4 ");
            $query->execute();
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getPlusVenduProduit(){
        try {

            $query = $this->getConnexion()->prepare("SELECT *
                                                              FROM tbl_produits 
                                                              ORDER BY id_produit DESC LIMIT 6 ");
            $query->execute();
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getDernierProduit(){
        try {

            $query = $this->getConnexion()->prepare("SELECT *
                                                              FROM tbl_produits 
                                                              ORDER BY id_produit DESC LIMIT 6 ");
            $query->execute();
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function deleteOneProduit($id)
    {
        try {

            $query = $this->getConnexion()->prepare("DELETE FROM tbl_produits WHERE id_produit=:id");
            $query->execute(array('id'=>$id));
            $query->closeCursor();
            return 'success';
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    public function  addCart($produits,$quantity,$sessionId){

        try {
            $query = $this->getConnexion()->prepare("INSERT INTO tbl_panier (
                                                                            sId,
                                                                            id_produit,
                                                                            quantite)
                                                                        VALUES ( 
                                                                        :sId,
                                                                        :id_produit,
                                                                        :quantite)");
            $query->execute(array(
                'sId' => $sessionId,
                'id_produit' => $produits,
                'quantite' => $quantity
            ));
            $query->closeCursor();
            return "success";

        } catch (PDOException $e) {
            echo 'impossible de se connecter';
        }

    }

    public function  getCartBySessionId($sessionId){

        try {

            $query = $this->getConnexion()->prepare("SELECT *
                                                              FROM tbl_panier 
                                                              WHERE sId=:sId");
            $query->execute(array("sId"=>$sessionId));
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    public function  getCart(){

        try {

            $query = $this->getConnexion()->prepare("SELECT pn.*,p.*
                                                              FROM 
                                                              tbl_panier as pn, 
                                                              tbl_produits as p
                                                              WHERE pn.id_produit=p.id_produit");
            $query->execute();
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    public function  loginAdmin($email,$password){

        try {

            $query = $this->getConnexion()->prepare("SELECT *
                                                              FROM 
                                                              tbl_admin 
                                                              WHERE email=:email 
                                                              AND password=:password");
            $query->execute(array("email"=>$email,"password"=>$password));
            return $resultat=$query->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    public function  getproductbyid($id){

        try {

            $query = $this->getConnexion()->prepare("SELECT *
                                                              FROM tbl_produits 
                                                              WHERE id_produit=:id");
            $query->execute(array("id"=>$id));
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    public function  getCartByIdSession($session){

        try {

            $query = $this->getConnexion()->prepare("SELECT pn.*,p.*
                                                              FROM 
                                                              tbl_panier as pn, 
                                                              tbl_produits as p
                                                              WHERE pn.id_produit=p.id_produit 
                                                              AND pn.sId=:idsession");
            $query->execute(array("idsession"=>$session));
            return $resultat=$query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    public function  deleteproduitpanierbyidandsession($id,$sessionid){

        try {

            $query = $this->getConnexion()->prepare("DELETE FROM tbl_panier WHERE idPanier=:idPanier AND sId=:sId");
            $query->execute(array("idPanier"=>$id,"sId"=>$sessionid));
            $query->closeCursor();
            return "success";

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }




}