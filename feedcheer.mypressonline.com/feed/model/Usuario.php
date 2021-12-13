<?php
class Usuario{

    private $id; 
	private $nome;
    private $email;
	private $telefone;
	private $mensagem;
   

    private $con;

    public function __construct(){
        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);
    }

    public function all(){
        $sql = $this->con->prepare("SELECT * FROM comentario");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }

    public function create(){
        $sql = $this->con->prepare("INSERT INTO comentario (nome, email, telefone, mensagem) VALUES (?,?,?,?)");
        $sql->execute([$this->getNome(), $this->getEmail(), $this->getTelefone(), $this->getMensagem()]);

        if($sql->errorCode()!='00000'){
            echo $sql->errorInfo()[2];
        }else{
		echo("<script>
           window.location.href = 'http://feedcheer.mypressonline.com/feed/index.php';
           </script>"
           );   
   	 	}
    }

	public function read(){
        $sql = $this->con->prepare("SELECT * FROM comentario WHERE id=?");
        $sql->execute([$this->getId()]);
        $row = $sql->fetchObject();
        return $row;		
	}

	public function update(){
		$sql = $this->con->prepare("UPDATE comentario SET nome=?, email=?, telefone=?, mensagem=? WHERE id=?");
		$sql->execute([ $this->getNome(), $this->getEmail(), $this->getTelefone(), $this->getMensagem(), $this->getId()]);

		if($sql->errorCode()!='00000'){
            echo $sql->errorInfo()[2];
        }else{
          echo("<script>
           window.location.href = 'http://feedcheer.mypressonline.com/feed/index.php';
           </script>"
           );
		}
	}

	public function delete(){
		$sql = $this->con->prepare("DELETE FROM comentario WHERE id=?");
		$sql->execute([$this->getId()]);

		if($sql->errorCode()!='00000'){
            echo $sql->errorInfo()[2];
        }else{
           echo("<script>
           window.location.href = 'http://feedcheer.mypressonline.com/feed/index.php';
           </script>"
           );
            
		}
	}

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;

		return $this;
	}

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;

		return $this;
	}

	public function getMensagem()
	{
		return $this->mensagem;
	}

	public function setMensagem($mensagem)
	{
		$this->mensagem = $mensagem;

		return $this;
	}
}