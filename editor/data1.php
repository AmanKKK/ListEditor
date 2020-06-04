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

echo '<br>';
print_r($fetchStudents);
echo '<br>';
print_r($fetchGroups);

$mergedData=$fetchStudents+$fetchGroups;

echo '<br>';
print_r($mergedData);



 


 










