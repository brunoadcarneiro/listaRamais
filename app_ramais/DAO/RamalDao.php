<?php


//CRUD
class RamalDao
{

        private $conexao;
        private $ramal;

        public function __construct(Conexao $conexao, Ramal $ramal)
        {

                $this->conexao  = $conexao->conectar();
                $this->ramal   = $ramal;
        }

        public function inserir()
        { //create

                $query = 'INSERT INTO ramal(numero) VALUES (:numero)';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':numero', $this->ramal->__get('numero'));
                $stmt->execute();
        }

        public function recuperar()
        { //read

                $query = 'SELECT * FROM ramal
                ORDER BY numero ASC';
                $stmt = $this->conexao->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarUm($id)
        { //Recupera um registro da tabela

                $query = 'SELECT * FROM ramal
                WHERE id = :id';

                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $id);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function atualizar()
        { //update

                $query = "UPDATE ramal SET numero = :numero WHERE id = :id";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':numero', $this->ramal->__get('numero'));
                $stmt->bindValue(':id', $this->ramal->__get('id'));
                return $stmt->execute();
        }

        public function remover()
        { //delete

                $query = "DELETE FROM ramal WHERE id = :id";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $this->ramal->__get('id'));
                $stmt->execute();
        }
}
