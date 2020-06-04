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
$idCourse=$data['quadroinfo'][0]['id']; //индекс курса 
$checkyearOfCourse=$yearOfCourse;

$hello=count($data['cards']);
$hello1=count($data['cards'][0]['tarefas']);
echo($hello);
echo($hello1);
// echo($nameOfCourse);
// echo($yearOfCourse);


$IDofGroup=0;

for($index=0;$index<count($data['cards']);$index++){
  $bolean=true;
  $groupname=$data['cards'][$index]['name']; //название группы;
  $sendtogroup="INSERT INTO `groups`(`name`,`year`)VALUES('$groupname','$yearOfCourse')";
  mysqli_query($connection,$sendtogroup);
}
  if($yearOfCourse===$checkyearOfCourse){
    $getgroupid2019="SELECT `id` FROM `groups` WHERE `year`=$checkyearOfCourse ";
    $storage2019=mysqli_query($connection,$getgroupid2019);
    while($assoccStorage2019=mysqli_fetch_assoc($storage2019)){
    $groupID2019=$assoccStorage2019['id'];
    $check=true;
    $index++;
  for($index=0;$index<count($data['cards']);$index++){
    if($check){
  for($index1=0;$index1<count($data['cards'][$index]['tarefas']);$index1++){
    $studentnames=$data['cards'][$index]['tarefas'][$index1]['name'];
    $sendstudents="INSERT INTO `students`(`first_name`)VALUES('$studentnames')";
    mysqli_query($connection,$sendstudents);
    $getStudentID="SELECT `id` FROM `students`";
    $studentrequest=mysqli_query($connection,$getStudentID);
    $studentstorage=mysqli_fetch_assoc($studentrequest);
    $sendIDstudent=$studentstorage['id'];
    $sendAllID="INSERT INTO `students_to_group`(`group_id`,`student_id`)VALUES('$groupID2019','$sendIDstudent')";
    mysqli_query($connection,$sendAllID);
  }
  $check=false;
}

}
    }
  }





// расписать if для getgroupid, создать переменную(есть), которая будет хранить в себе год.
// $studentId=$data['cards'][$index]['tarefas'][$index1]['id'];
/*
Справка относительно полей базы данных:
В таблице students, поле group_id - это поле, связанное с полем course_id. Group_id может повторяться у разных курсов, но на вывод
данных это ни как не повлияет, так как group_id рассматривается сугубо в рамках определенного курса.

else if($yearOfCourse===2018){
      $getgroupid2018="SELECT `id` FROM `groups` WHERE `year`=2018 ";
      $storage2018=mysqli_query($connection,$getgroupid2018);
      $assoccStorage2018=mysqli_fetch_assoc($storage2018);
      $IDofGroup=$assoccStorage2018['id'];
    }else if($yearOfCourse===2017){
      $getgroupid2017="SELECT `id` FROM `groups` WHERE `year`=2017 ";
      $storage2017=mysqli_query($connection,$getgroupid2017);
      $assoccStorage2017=mysqli_fetch_assoc($storage2017);
      $IDofGroup=$assoccStorage2017['id'];
    }

*/


?>



