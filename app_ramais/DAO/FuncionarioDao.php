<?php


//CRUD
class FuncionarioDao
{

        private $conexao;
        private $funcionario;

        public function __construct(Conexao $conexao, Funcionario $funcionario)
        {

                $this->conexao  = $conexao->conectar();
                $this->funcionario   = $funcionario;
        }

        public function inserir()
        { //create

                $query = 'INSERT INTO funcionario(nome, ramal_id, setor_id) VALUES (:nome, :ramal_id, :setor_id)';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':nome', $this->funcionario->__get('nome'));
                $stmt->bindValue(':ramal_id', $this->funcionario->__get('ramal_id'));
                $stmt->bindValue(':setor_id', $this->funcionario->__get('setor_id'));
                $stmt->execute();
        }

        public function recuperar()
        { //read

                $query = 'SELECT 
                    f.id, r.numero, f.nome, s.setor
                FROM 
                    funcionario as f
                INNER JOIN ramal as r on (f.ramal_id = r.id) 
                INNER JOIN setor as s on (f.setor_id = s.id)
                ORDER BY f.nome ASC
        ';
                $stmt = $this->conexao->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarRamal()
        { //read

                $query = 'SELECT * FROM ramal';

                $stmt = $this->conexao->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarSetor()
        { //read

                $query = 'SELECT * FROM setor';

                $stmt = $this->conexao->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarUm($id)
        { //Recupera um registro da tabela

                $query = 'SELECT 
                    f.*,r.*, s.*
                FROM 
                    funcionario as f
                INNER JOIN ramal as r on (f.ramal_id = r.id) 
                INNER JOIN setor as s on (f.setor_id = s.id) 
                WHERE f.id = :id
            ';

                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $id);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function atualizar()
        { //update

                $query = "UPDATE funcionario SET nome = :nome, ramal_id = :ramal_id, setor_id = :setor_id WHERE id = :id";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':nome', $this->funcionario->__get('nome'));
                $stmt->bindValue(':ramal_id', $this->funcionario->__get('ramal_id'));
                $stmt->bindValue(':setor_id', $this->funcionario->__get('setor_id'));
                $stmt->bindValue(':id', $this->funcionario->__get('id'));
                return $stmt->execute();
        }

        public function remover()
        { //delete

                $query = "DELETE FROM funcionario WHERE id = :id";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $this->funcionario->__get('id'));
                $stmt->execute();
        }
}
