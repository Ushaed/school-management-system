<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/Database.php');
class Student
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }
  public function getstudent()
  {
    $query = "SELECT * FROM tbl_student";
    $result = $this->db->select($query);
    return $result;
  }
  public function insertStudent($roll,$name,$class,$section )
  {
    //$roll=mysql_real_escape_string($this->db->link,$roll);
    //$name=mysql_real_escape_string($this->db->link,$name);
    //$class=mysql_real_escape_string($this->db->link,$class);
    //$section=mysql_real_escape_string($this->db->link,$section);
    if(empty($roll)||empty($name)||empty($class)||empty($section)){
      $msg = "<div class='alert alert-danger'><strong>Error!</strong>Field must not be empty!</div>";
      return $msg;
      header('location:add.php');
    }else {
      $stu_query = "insert into tbl_student(roll,name,class,section) values('$roll','$name','$class','$section')";
      $stu_insert = $this->db->insert($stu_query);

      $stu_query = "insert into tbl_attendence(roll) values('$roll')";
      $stu_insert = $this->db->insert($stu_query);
      if($stu_insert){
        $msg = "<div class='alert alert-success'><strong>success fully data inserted</strong></div>";
        return $msg;
      }else{
        $msg = "<div class='alert alert-danger'><strong>Error!</strong>Something went wrong!</div>";
        return $msg;
      }
    }
  }

  public function insertAttendence($cur_date,$attend=array())
  {
    $query = "SELECT DISTINCT att_time FROM tbl_attendence";
    $getdata = $this->db->select($query);
    while ($result =$getdata->fetch_assoc()) {
      $db_date = $result['att_time'];
      if($cur_date==$db_date){
        $msg = "<div class='alert alert-danger'><strong>Error!</strong>Attendence already taken!</div>";
        return $msg;
      }
    }
    foreach($attend as $atn_key =>$atn_value)  {
      if($atn_value == "present"){
        $stu_query = "INSERT INTO tbl_attendence(roll,attend,att_time) VALUES ('$atn_key','present',now())";
        $data_insert = $this->db->insert($stu_query);
      }elseif ($atn_value == "absent") {
        $stu_query = "INSERT INTO tbl_attendence(roll,attend,att_time) VALUES ('$atn_key','absent',now())";
        $data_insert = $this->db->insert($stu_query);
      }
    }
    if($data_insert){
      $msg = "<div class='alert alert-success'><strong>successully attendence taken</strong></div>";
      return $msg;
      header('location:index.php');
    }else{
      $msg = "<div class='alert alert-danger'><strong>Error!</strong>Student data no inserted!</div>";
      return $msg;
      header('location:attendence.php');
    }
  }
  public function getDateList()
  {
    $query = "SELECT DISTINCT att_time FROM tbl_attendence";
    $result = $this->db->select($query);
    return $result;
  }

  public function getAllData($dt)
  {
    $query = "SELECT tbl_student.name ,tbl_student.class ,tbl_student.section ,tbl_attendence.* FROM tbl_student
    INNER JOIN tbl_attendence
    ON tbl_student.roll=tbl_attendence.roll
    WHERE att_time='$dt'";
    $result = $this->db->select($query);
    return $result;
  }
  public function updateAttendence($dt,$attend)
  {
    foreach($attend as $atn_key =>$atn_value)  {
      if($atn_value == "present"){
        $query = "UPDATE tbl_attendence
        SET atten='present'
        WHERE roll='".$atn_key."' AND att_time='".$dt."'";
        $data_update = $this->db->update($query);

      }elseif ($atn_value == "absent") {
      $query = "UPDATE tbl_attendence
      SET atten='absent'
      WHERE roll='".$atn_key."' AND att_time='".$dt."'";
      $data_update = $this->db->update($query);
      }
    }
    if($data_update){
      $msg = "<div class='alert alert-success'><strong>successully Updated</strong></div>";
      return $msg;
      header('location:student_view.php');
    }else{
      $msg = "<div class='alert alert-danger'><strong>Error!</strong>Something went wrong</div>";
      return $msg;
      header('location:student_view.php');
    }
  }


}
