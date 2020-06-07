<?php
 require_once "connection/connection.php";

 $groupCount=0;
 $studentCount=0;
 $result = array(
    "groupQTY"=>'',
 );

 // Ищем все группы
 $requestTogroup="SELECT `id`,`name`FROM `groups`";
 $groups_query = mysqli_query($connection,$requestTogroup);
 
 // цикл по всем группам
 while($group = mysqli_fetch_assoc($groups_query)){
    $studentCount=0;
    $groupCount++;
    $group_id = $group["id"];
    $group_name = $group["name"];
    
    // Группа: айди, имя, список студентов
    $result_group = array(
       "id" => $group_id,
       "name" => $group_name,
       "students" => array(),
       "amount"=>'',
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
       $studentCount++;
       // Добавляем в группу
       array_push($result_group["students"], $student);
    }
    //Добавляем количество студентов из каждой группы
    $result_group['amount']=$studentCount;
    // Добавляем группу в вывод
    array_push($result, $result_group);
   
 }
 //Добавляем количество групп
 $result['groupQTY']=$groupCount;


 echo json_encode($result,JSON_UNESCAPED_UNICODE);













?>



 


 










