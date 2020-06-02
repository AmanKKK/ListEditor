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


for($index=0;$index<count($data['cards']);$index++){
  $agent=$data['cards'][$index]['name'];
  $agentGroup=$data['cards'][$index]['id'];
  $sendGroupName="INSERT INTO `groups`(`group_name`,`name`,`year`)VALUES('$agent','$nameOfCourse','$yearOfCourse')";
  mysqli_query($connection,$sendGroupName);
  for($index1=0;$index1<count($data['cards'][$index]['tarefas']);$index1++){
    $agent1=$data['cards'][$index]['tarefas'][$index1]['name'];
    $sendGroupName1="INSERT INTO `students`(`first_name`,`group_id`,`course_id`)VALUES('$agent1','$agentGroup','$idCourse')";
    mysqli_query($connection,$sendGroupName1);
  }
}



// $sql="INSERT INTO `students`(`first_name`)VALUES('$send')";
// $sql1="INSERT INTO `groups`(`name`,`year`,`group_name`)VALUES ('$groupName','$groupYear','$groupSubName')";
// if (mysqli_query($connection, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($connection);
// }
// if (mysqli_query($connection, $sql1)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($connection);
// }
// mysqli_close($connection);


/* настрою для начала заполнение поля group_name
Чтобы поля year и name заполнялись автоматом , написать условие проверки с кмбо-05-19 и c кмбо-02-19(сделал эффективнее)
ЧТобы выводить студентов на сайте, нужно создать поля:course_id,group_id, то есть например:
if course_id=1(первый курс ) and group_id(это номер карты внутри данного курса)=число;
*/



/*
Справка относительно полей базы данных:
В таблице students, поле group_id - это поле, связанное с полем course_id. Group_id может повторяться у разных курсов, но на вывод
данных это ни как не повлияет, так как group_id рассматривается сугубо в рамках определенного курса.

*/
?>



