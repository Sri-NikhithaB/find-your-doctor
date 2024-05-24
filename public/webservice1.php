<?php
  $search_param=$_POST["search"];
  $search_area=$_POST["area"];

  if(isset($_POST["search"]) && isset($_POST["area"])){
    echo $search_param;
    echo $search_area;

  $host="localhost";
  $dbuser="id20952647_srinikhitha";
  $dbpass="Maithili@3";
  $dbname="id20952647_doctor";

    $conn=new mysqli($host, $dbuser, $dbpass, $dbname); 
    $sql="SELECT * FROM doctors WHERE DoctorArea like '%".$search_area."%' and DoctorCat like '%".$search_param."%'";

    $result=$conn->query($sql);
    

    if($result->num_rows>0)
    {
        $data ='<b class="easy-steps-and">Doctors Found in your area</b>';
        $doctor_data="";

        while($row=$result->fetch_assoc())
        {
            $doctorid=$row["ID"];
            $doctorname=$row["DoctorName"];
            $doctorinfo=$row["DoctorInformation"];
            $doctorimage=$row["DoctorImage"];

            $doctor_data=$doctor_data.'<div class="find-your-doctor-container1">
            <p class="find-your-doctor">
              Here is the doctor we found for you
            </p>
            <p class="find-your-doctor">
              '.$doctorinfo.'
            </p>
          </div>
          <div class="find-best-doctors">'.$doctorname.'</div>
          <div class="search-section-inner"></div>
          <img
            class="search-symbol-black-1"
            alt=""
            src="'.$doctorimage.'"
          />';
            
             
        }

       
    }else{
        $data ='<b class="easy-steps-and">No Doctor Found in your area</b>';
    }
}else{
    $data ='<b class="easy-steps-and">Bad Query</b>';
}

$data = $data.$doctor_data;
echo $data;
?>