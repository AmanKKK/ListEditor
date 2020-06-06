<?php
 require_once "connection/connection.php";

 $commandToGetGroupInfo="SELECT `id`,`year`,`name` FROM `groups`";
 $sendGroupRequest=mysqli_query($connection,$commandToGetGroupInfo);
 
 
 $SendingData=array();
 $agentArray=array(
    'name'=>'',
 );
 $student_name=array(
    "StudentName"=>array(),
 );
 $GetGroupInfo="SELECT `id`,`name`,`year` FROM `groups` ";
 $group=mysqli_query($connection,$GetGroupInfo);
 $GetStudentINFO="SELECT `id`,`first_name`,`course_year` FROM `students`" ;
 $students=mysqli_query($connection,$GetStudentINFO);
 $getStudents_to_GroupINFO="SELECT `student_id`,`group_id`FROM `students_to_group`";
 $student_to_group=mysqli_query($connection,$getStudents_to_GroupINFO);
 $GroupIDcheck=0;
 $count1=0;
 $count2=0;
 $count3=0;
 
 
 

 for($index=0;$index<mysqli_num_rows($group);$index++){
    $count1++;
    $catchGroup=mysqli_fetch_assoc($group);
    $GroupIDcheck=$catchGroup['id'];
    for($index1=0;$index1<mysqli_num_rows($student_to_group);$index1++){
       $count2++;
       $catchStudent_to_group=mysqli_fetch_assoc($student_to_group);
       $StudentIDcheck[$index1]=$catchStudent_to_group['group_id'];
       $catchStudent=mysqli_fetch_assoc($students);
      if($GroupIDcheck===$StudentIDcheck[$index1]){
         $count3++;
         $student_name['StudentName'][$index1]=$catchStudent['first_name'];
      }
   }
 
 $agentArray['name']=$catchGroup['name'];
 $BigBrotherArray=array_merge($agentArray,$student_name);
 $SendingData[$index]=$BigBrotherArray;
 array_splice($BigBrotherArray,0);
 array_splice($student_name,0);
 }
 
 
 
 $amountofgroups=array(
    "groupQTY"=>array()
 );
 $amountofstudents=array(
    "studentQTY"=>array()
 );
 
 array_push($amountofgroups['groupQTY'],$count1);
 array_push($amountofstudents['studentQTY'],$count3);
 
 $SENDdata=$SendingData+$amountofgroups+$amountofstudents;
 
 $flow=json_encode($SENDdata,JSON_UNESCAPED_UNICODE);
 
 print_r($flow);

















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



 


 










