<? php namespace Models;
	
	class Modalidad {
		public $id;
  		public $modalidad;
  	public function __construct(){
        $this->con= new conexion();
     }
	public function get_Modalidad()
    {
        try {
            $query = $this->dbh->prepare('select * from modalidad');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
public function set_Modalidad()
    {       $this->dbh->'modalidad';

    }
    public function delete_Modalidad($id)
    {
        try {
            $query = $this->dbh->prepare('delete from  modalidad where id = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insert_Modalidad($id, $modalidad)
    {
        try {
            $query = $this->dbh->prepare('insert into modalidad values(null,?)');
            $query->bindParam(1, $modalidad);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_Modalidad($id, $modalidad)
    {
        try {
            $query = $this->dbh->prepare('update modalidad SET modalidad = ? 
                WHERE id = ?');
            $query->bindParam(1, $modalidad);
            $query->bindParam(8, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function listar_Modalidad($id, $modalidad)
    {
        try {
            $query = $this->dbh->prepare('select all  from modalidad');
            $query->bindParam(1, $modalidad);
            $query->bindParam(2, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
	}
?>