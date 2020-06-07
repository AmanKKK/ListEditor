<?php
 require_once "connection/connection.php";

 $result = array();
	
 // Ищем все группы
 $requestTogroup="SELECT `id`,`name`FROM `groups`";
 $groups_query = mysqli_query($connection,$requestTogroup);
 
 // цикл по всем группам
 while($group = mysqli_fetch_assoc($groups_query)){
    $group_id = $group["id"];
    $group_name = $group["name"];
    
    // Группа: айди, имя, список студентов
    $result_group = array(
       "id" => $group_id,
       "name" => $group_name,
       "students" => array()
    );
    
    // Ищем студентов этой группы
    // пояснения:
    // * Выбираем всё из таблицы students
    // * Объединяем с таблицей students_to_group, чтобы получить группу, к которой принадлежит студент
    // * Объединяем по айдишникам - id в student соответствует student_id в students_to_group
    // * Фильтруем по айдишнику группы
    $requestToStudents="SELECT * FROM `students` 
                        JOIN students_to_group
                        ON students.id = students_to_group.student_id
                        WHERE students_to_group.group_id=$group_id ";
    $students_query = mysqli_query($connection,$requestToStudents);
    
    // Цикл по всем студентам группы
    while($student = mysqli_fetch_assoc($students_query)){
       // Добавляем в группу
       array_push($result_group["students"], $student);
    }
    
    // Добавляем группу в вывод
    array_push($result, $result_group);
 }
 
//  echo json_encode($result,JSON_UNESCAPED_UNICODE);
 $SendData=json_encode($result,JSON_UNESCAPED_UNICODE);
 
 print_r($SendData);

















// $fetchStudents=array(
//    "StudentName"=>array(

//    ),

// );
// $fetchGroups=array(
//    "GroupName"=>array(

//    ),
// );

// $groupID=array(
//    "GroupID"=>array(),
// );

// $studentID=array(
//    "StudentID"=>array(), 
// );
// $amountofgroups=array(
//       "groupQTY"=>array()
// );
// $amountofstudents=array(
//       "studentQTY"=>array()
// );
// $sendtogroupQTY=0;
// $sendtostudentQTY=0;
// $getStudents="SELECT `first_name` FROM `students`";
// $requestToGetStudents=mysqli_query($connection,$getStudents);
//  while($studentsData=mysqli_fetch_assoc($requestToGetStudents)){
//        $studentName=$studentsData['first_name'];
//        array_push($fetchStudents['StudentName'],$studentName);
//  }

// $getGroups="SELECT `name` FROM `groups`";
// $requestToGetGroups=mysqli_query($connection,$getGroups);
// while($GroupsData=mysqli_fetch_assoc($requestToGetGroups)){
//       $GroupsName=$GroupsData['name'];
//       array_push($fetchGroups['GroupName'],$GroupsName);
// }

// for($iterator=0;$iterator<count($fetchGroups['GroupName']);$iterator++){
//       array_push($groupID['GroupID'],$iterator);
//       $sendtogroupQTY++;
// }
// for($iterator1=0;$iterator1<count($fetchStudents['StudentName']);$iterator1++){
//       array_push($studentID['StudentID'],$iterator1);
//       $sendtostudentQTY++;
// }

// array_push($amountofgroups['groupQTY'],$sendtogroupQTY);
// array_push($amountofstudents['studentQTY'],$sendtostudentQTY);


// $mergedData=$fetchStudents+$fetchGroups+$groupID+$studentID+$amountofgroups+$amountofstudents;

// $JSONdata=json_encode($mergedData);

// print_r($JSONdata);



 


 










