<? php namespace Models;
	
	class Forma_evaluacion {
		public $id;
  		public $evaluacion;
  	public function __construct(){
        $this->con= new conexion();
     }
	public function get_Forma_evaluacion()
    {
        try {
            $query = $this->dbh->prepare('select * from formaEvaluacion');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
public function set_Forma_evaluacion()
    {       $this->dbh->'formaEvaluacion';

    }
    public function delete_Forma_evaluacion($id)
    {
        try {
            $query = $this->dbh->prepare('delete from  formaEvaluacion where id = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insert_Forma_evaluacion($id, $evaluacion)
    {
        try {
            $query = $this->dbh->prepare('insert into formaEvaluacion values(null,?)');
            $query->bindParam(1, $evaluacion);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_Forma_evaluacion($id, $evaluacion)
    {
        try {
            $query = $this->dbh->prepare('update formaEvaluacion SET evaluacion = ? 
                WHERE id = ?');
            $query->bindParam(1, $evaluacion);
            $query->bindParam(8, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function listar_Forma_evaluacion($id, $evaluacion)
    {
        try {
            $query = $this->dbh->prepare('select all  from formaEvaluacion');
            $query->bindParam(1, $evaluacion);
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