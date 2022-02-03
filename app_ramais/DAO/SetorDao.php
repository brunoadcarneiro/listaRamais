<?php


//CRUD
class SetorDao
{

        private $conexao;
        private $ramal;

        public function __construct(Conexao $conexao, Setor $setor)
        {

                $this->conexao  = $conexao->conectar();
                $this->setor   = $setor;
        }

        public function inserir()
        { //create

                $query = 'INSERT INTO setor(setor) VALUES (:setor)';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':setor', $this->setor->__get('setor'));
                $stmt->execute();
        }

        public function recuperar()
        { //read

                $query = 'SELECT * FROM setor
                ORDER BY setor ASC';
                $stmt = $this->conexao->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarUm($id)
        { //Recupera um registro da tabela

                $query = 'SELECT * FROM setor
                WHERE id = :id';

                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $id);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function atualizar()
        { //update

                $query = "UPDATE setor SET setor = :setor WHERE id = :id";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':setor', $this->setor->__get('setor'));
                $stmt->bindValue(':id', $this->setor->__get('id'));
                return $stmt->execute();
        }

        public function remover()
        { //delete

                $query = "DELETE FROM setor WHERE id = :id";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $this->setor->__get('id'));
                $stmt->execute();
        }
}
