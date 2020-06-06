<?php
 require_once "connection/connection.php";


$SendingData=array();
$agentArray=array(
   'name'=>'',
);
$student_name=array();
$GetGroupInfo="SELECT `id`,`name`,`year` FROM `groups` ";
$GetStudentINFO="SELECT `id`,`firsr_name`,`course_id`";
$getStudents_to_GroupINFO="SELECT `student_id`,`group_id`";
$GroupIDcheck=0;
$count1=0;
$count2=0;
for($index=0;$index<mysqli_fetch_row($GetGroupInfo);$index++){
   $count1++;
   $GroupIDcheck=$GetGroupInfo['id'];
   for($index1=0;$index1<mysqli_fetch_row($getStudents_to_GroupINFO);$index1++){
      $count2++;
     if($GroupIDcheck===$getStudents_to_GroupINFO['student_id']){
        $student_name[$index1]=$GetStudentINFO['first_name'];
     }
  }

$agentArray['name']=$GetGroupInfo['name'];
$BigBrotherArray=array_merge($agentArray,$student_name);
$SendingData[$index]=$BigBrotherArray;
array_splice($BigBrotherArray,0);
array_splice($student_name,0);
}

print_r($SendingData);

echo '<br>'. $count1;
echo '<br>'. $count2;

















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



 


 










