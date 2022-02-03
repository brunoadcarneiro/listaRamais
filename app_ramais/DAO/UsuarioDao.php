<?php


//CRUD
class UsuarioDao
{

        private $conexao;
        private $usuario;

        public function __construct(Conexao $conexao, Usuario $usuario)
        {

                $this->conexao  = $conexao->conectar();
                $this->usuario  = $usuario;
        }

        public function inserir()
        { //create

                $query = 'INSERT INTO usuario(nome, senha, permissao, status) VALUES (:nome, :senha, :permissao, :status)';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':nome', $this->usuario->__get('nome'));
                $stmt->bindValue(':senha', $this->usuario->__get('senha'));
                $stmt->bindValue(':permissao', $this->usuario->__get('permissao'));
                $stmt->bindValue(':status', $this->usuario->__get('status'));
                $stmt->execute();
        }

        public function recuperar()
        { //read

                $query = 'SELECT * FROM usuario
                ORDER BY nome ASC';
                $stmt = $this->conexao->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarUm($id)
        { //Recupera um registro da tabela

                $query = 'SELECT * FROM usuario
                WHERE id = :id';

                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $id);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function atualizar()
        { //update

                $query = "UPDATE usuario SET nome = :nome, senha = :senha, permissao = :permissao, status = :status WHERE id = :id";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':nome', $this->usuario->__get('nome'));
                $stmt->bindValue(':senha', $this->usuario->__get('senha'));
                $stmt->bindValue(':permissao', $this->usuario->__get('permissao'));
                $stmt->bindValue(':status', $this->usuario->__get('status'));
                $stmt->bindValue(':id', $this->usuario->__get('id'));
                return $stmt->execute();
        }

        public function remover()
        { //delete

                $query = "DELETE FROM usuario WHERE id = :id";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $this->usuario->__get('id'));
                $stmt->execute();
        }
        public function logon($usuario)
        { //validar se o usuario existe e se ele está ativo

                $query = 'SELECT * FROM usuario
                WHERE nome = :nome
                AND status = 1';

                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':nome', $usuario);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);

        }
}
