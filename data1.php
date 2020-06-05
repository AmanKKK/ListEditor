<?php
 require_once "connection/connection.php";

$fetchStudents=array(
   "StudentName"=>array(

   ),

);
$fetchGroups=array(
   "GroupName"=>array(

   ),
);

$groupID=array(
   "GroupID"=>array(),
);

$studentID=array(
   "StudentID"=>array(), 
);
$amountofgroups=array(
      "groupQTY"=>array()
);
$amountofstudents=array(
      "studentQTY"=>array()
);
$sendtogroupQTY=0;
$sendtostudentQTY=0;
$getStudents="SELECT `first_name` FROM `students`";
$requestToGetStudents=mysqli_query($connection,$getStudents);
 while($studentsData=mysqli_fetch_assoc($requestToGetStudents)){
       $studentName=$studentsData['first_name'];
       array_push($fetchStudents['StudentName'],$studentName);
 }

$getGroups="SELECT `name` FROM `groups`";
$requestToGetGroups=mysqli_query($connection,$getGroups);
while($GroupsData=mysqli_fetch_assoc($requestToGetGroups)){
      $GroupsName=$GroupsData['name'];
      array_push($fetchGroups['GroupName'],$GroupsName);
}

for($iterator=0;$iterator<count($fetchGroups['GroupName']);$iterator++){
      array_push($groupID['GroupID'],$iterator);
      $sendtogroupQTY++;
}
for($iterator1=0;$iterator1<count($fetchStudents['StudentName']);$iterator1++){
      array_push($studentID['StudentID'],$iterator1);
      $sendtostudentQTY++;
}

array_push($amountofgroups['groupQTY'],$sendtogroupQTY);
array_push($amountofstudents['studentQTY'],$sendtostudentQTY);


$mergedData=$fetchStudents+$fetchGroups+$groupID+$studentID+$amountofgroups+$amountofstudents;

$JSONdata=json_encode($mergedData);

print_r($JSONdata);



 


 










