<?php
namespace TodoApp;
use PDO;
class Task{
    protected $pdo;
    private $subject;
    private $priority;
    private $dueDate;
    private $status=0;
    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    public function createTask($task){
        $this->subject=$task['subject'];
        $this->priority=$task['priority'];
        $this->dueDate=$task['dueDate'];
        $this->insertTask();
    }
    public function insertTask(){
        try{
            $query="INSERT INTO `task` (`subject`,`priority`,`due_date`,`status`) 
                VALUE (:subject,:priority,:dueDate,:status)";
            $stmt=$this->pdo->prepare($query);
            $stmt->bindParam(':subject',$this->subject,PDO::PARAM_STR);
            $stmt->bindParam(':priority',$this->priority,PDO::PARAM_STR);
            $stmt->bindParam(':dueDate',$this->dueDate,PDO::PARAM_STR);
            $stmt->bindParam(':status',$this->status,PDO::PARAM_STR);
            $stmt->execute();
            header('Location:/todo');
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function deleteTask($id){
        try{
            $stmt=$this->pdo->prepare("DELETE FROM task WHERE `id`=:id");
            $stmt->bindValue(":id",$id,PDO::PARAM_INT);
            $stmt->execute();
            header('Location:/todo');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function setComplete($id){
        $this->status=1;
        try{
            $query="UPDATE task SET status= :status WHERE id=:id";
            $stmt=$this->pdo->prepare($query);
            $stmt->bindParam(":status",$this->status,PDO::PARAM_INT);
            $stmt->bindValue(":id",$id,PDO::PARAM_INT);
            $stmt->execute();
            header('Location:/todo');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function allTasks(){
        $statement=$this->pdo->prepare("select * from task");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
