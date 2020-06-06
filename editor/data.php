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

// $hello=count($data['cards']);
// $hello1=count($data['cards'][0]['tarefas']);
// echo($hello);
// echo($hello1);
// echo($nameOfCourse);
// echo($yearOfCourse);
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
  $groupname=$data['cards'][$index]['name']; //название группы;
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
    // echo 'Внутренний индекс:'. ($innerIndex);
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
      // echo '<br>';
      // print_r($studentIDarray[$i1]);
    }
    if($pass<=1){
    $sendTogroup_id="INSERT INTO `students_to_group`(`group_id`,`student_id`)VALUES('$groupIDarray[$index]','$studentIDarray[$index1]')";
    mysqli_query($connection,$sendTogroup_id);
    }else{
      echo ('hello');
      // $innerIndex1=$innerIndex+$qtyOFstudents;
      $sendTogroup_id1="INSERT INTO `students_to_group`(`group_id`,`student_id`)VALUES('$groupIDarray[$index]','$studentIDarray[$innerIndex]')";
      mysqli_query($connection,$sendTogroup_id1);
    }  
}
}

echo ('he;;o');
  // if($yearOfCourse===$checkyearOfCourse){}
   
 






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



