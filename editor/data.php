<?php
 require_once "connection/connection.php";



$data=json_decode(file_get_contents('php://input'), true);


if(isset($data)){
  echo ('filled data');
}else{
  echo ('empty data');
}
print_r($data);

$nameOfCourse=$data['quadro']['title']; //Списки подгрупп такого та курса;
$yearOfCourse=$data['quadroinfo'][0]['year']; //Год курса;
$idCourse=$data['quadroinfo'][0]['id'];


$hello=count($data['cards']);
$hello1=count($data['cards'][0]['tarefas']);
echo($hello);
echo($hello1);
// echo($nameOfCourse);
// echo($yearOfCourse);

if($idCourse===1){
  $delete="DELETE FROM `students` WHERE `course_id`=1 ";
  mysqli_query($connection,$delete);
}else if($idCourse===2){
  $delete1="DELETE FROM `students` WHERE `course_id`=2";
}else if($idCourse===3){
  $delete2="DELETE FROM `students` WHERE `course_id`=3";
}


for($index=0;$index<count($data['cards']);$index++){
  $agent=$data['cards'][$index]['name'];
  $agentGroup=$data['cards'][$index]['id'];
  $sendGroupName="INSERT INTO `groups`(`idCourse`,`group_name`,`name`,`year`)VALUES($idCourse,'$agent','$nameOfCourse','$yearOfCourse')";
  mysqli_query($connection,$sendGroupName);
  for($index1=0;$index1<count($data['cards'][$index]['tarefas']);$index1++){
    $studentId=$data['cards'][$index]['tarefas'][$index1]['id'];
    $agent1=$data['cards'][$index]['tarefas'][$index1]['name'];
    $sendGroupName1="INSERT INTO `students`(`first_name`,`group_id`,`course_id`,`user_id`)VALUES('$agent1','$agentGroup','$idCourse','$studentId')";
    mysqli_query($connection,$sendGroupName1);
  }
}






/*
Справка относительно полей базы данных:
В таблице students, поле group_id - это поле, связанное с полем course_id. Group_id может повторяться у разных курсов, но на вывод
данных это ни как не повлияет, так как group_id рассматривается сугубо в рамках определенного курса.

*/
?>



