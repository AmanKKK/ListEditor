<?php
 require_once "connection/connection.php";




$data=json_decode(file_get_contents('php://input'), true);


if(isset($data)){
  echo ('filled data');
}else{
  echo ('empty data');
}


$nameOfCourse=$data['quadro']['title']; //Списки подгрупп такого та курса;
$yearOfCourse=$data['quadroinfo'][0]['year']; //Год курса;
$idCourse=$data['quadroinfo'][0]['id']; 
$checkyearOfCourse=$yearOfCourse;


$groupIDarray=array();
$studentIDarray=array();
$IDofGroup=0;
$qtyOFstudents=0;
$pass=0;
$innerIndex=-1;

if($checkyearOfCourse===$yearOfCourse){
  $requestFORdelete="DELETE FROM `groups` WHERE `year`=$yearOfCourse";
  mysqli_query($connection,$requestFORdelete);
}


for($index=0;$index<count($data['cards']);$index++){
  $pass++;
  $qtyOFstudents=$qtyOFstudents+count($data['cards'][$index]['tarefas']);
  array_splice($groupIDarray,0);
  $groupID=$data['cards'][$index]['id'];
  $groupname=$data['cards'][$index]['name'];
  $sendtogroup="INSERT INTO `groups`(`name`,`year`,`mailing_hidden`)VALUES('$groupname','$yearOfCourse','$groupID')";
  mysqli_query($connection,$sendtogroup);
  $requestGroup="SELECT `id` FROM `groups` ";
  $resultofrequestGroup=mysqli_query($connection,$requestGroup);
  for($i=0;$i<count($data['cards']);$i++){
  $fetchGrouparray=mysqli_fetch_assoc($resultofrequestGroup);
  array_push($groupIDarray,$fetchGrouparray['id']);
  }
  for($index1=0;$index1<count($data['cards'][$index]['tarefas']);$index1++){
    $innerIndex++;
    array_splice($studentIDarray,0);
    $studentnames=$data['cards'][$index]['tarefas'][$index1]['name'];
    $studentID=$data['cards'][$index]['tarefas'][$index1]['id'];
    $sendstudents="INSERT INTO `students`(`first_name`,`course_year`)VALUES('$studentnames','$yearOfCourse')";
    mysqli_query($connection,$sendstudents);
    $requestStudent="SELECT `id` FROM `students` ";
    $resultOFrequestStudent=mysqli_query($connection,$requestStudent);
    for($i1=0;$i1<$qtyOFstudents;$i1++){
      $fetchStudentArray=mysqli_fetch_assoc($resultOFrequestStudent);
      array_push($studentIDarray,$fetchStudentArray['id']);   
    }
    if($pass<=1){
    $sendTogroup_id="INSERT INTO `students_to_group`(`group_id`,`student_id`)VALUES('$groupIDarray[$index]','$studentIDarray[$index1]')";
    mysqli_query($connection,$sendTogroup_id);
    }else{
      $sendTogroup_id1="INSERT INTO `students_to_group`(`group_id`,`student_id`)VALUES('$groupIDarray[$index]','$studentIDarray[$innerIndex]')";
      mysqli_query($connection,$sendTogroup_id1);
    }  
}
}


 
?>



