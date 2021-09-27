<?php 
include("../../Backend/includes/connection.php");
//$sql= "select date from checkmylogin  where date  BETWEEN '2021-06-21'  AND '2021-06-23' ORDER By price ASC ";
//$search=$_POST['search'];
//$sql= "select  username from checkmylogin  where username LIKE '%{$search}%'  ";
//$result= mysqli_query($conn,$sql);

//$data=mysqli_fetch_all($result);
    // print_r($data);

 
  //$result2=implode('',$result1);
  //if($result1){
	
	  //$result2=implode('',$result1);
   //($result1);}
//else{
	//  echo "No data is there";
  //}
  // time zone changing
 //date_default_timezone_set('Asia/Kolkata');
 //echo $date = date('m/d/Y h:i:s');  
 $cat_json='{
            "problems": [{
                "Diabetes":[{
                    "medications":[{
                         "medicationsClasses":[{
                            "className":[{
                                "associatedDrug":[{
                                    "name":"asprin",
                                    "dose":"",
                                    "strength":"500 mg"
                                }],
                                "associatedDrug#2":[{
                                    "name":"somethingElse",
                                    "dose":"",
                                    "strength":"500 mg"
                                }]
                            }],
                            "className2":[{
                                "associatedDrug":[{
                                    "name":"asprin",
                                    "dose":"",
                                    "strength":"500 mg" //echo this
                                }],
                                "associatedDrug#2":[{
                                    "name":"somethingElse",
                                    "dose":"",
                                    "strength":"500 mg"
                                }]
                            }]
                        }]
                    }],
                    "labs":[{
                        "missing_field": "missing_value"
                    }]
                }],
                "Asthma":[{}]
            }]}';
			
			 //$json_array=json_decode($cat_json,true);
			 
  echo $cat_json; 

 //echo $cat_json['problems'][0]['Diabetes'][0]['medications'][0]['medicationsClasses'][0]['className2'][0]['associatedDrug'][0]['strength'];  
			
			
			//echo $json['problems'][0]['Diabetes'][0]['medications'][0]['medicationsClasses'][0]['className2'][0]['associatedDrug'][0]['strength'];
//document.write(str['problems'][0]['Diabetes'][0]['medications'][0]['medicationsClasses'][0]['className2'][0]['associatedDrug'][0]['strength'])
 
?>