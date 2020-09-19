<?php 
$con = mysqli_connect("localhost","root","","ajax") or die("Connection Failed");

$page_per_limit = 2;
$page = '';
if(isset($_POST['page_no'])){
$page = $_POST['page_no'];
}else {
    $page = 1;
}

$sql = "SELECT * from student LIMIT {$page},{$page_per_limit}";
$result = mysqli_query($con,$sql) or die("Sql Query Failed");

$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<tbody>';

            while($row = mysqli_fetch_assoc($result)){
                $last_id = $row["id"];
                $output .= "<tr><td>{$row["id"]}</td> <td>{$row["firstname"]} {$row["lastname"]}</td></tr>";
            }

$output .= "</tbody>
                  <tbody id='pagination'>
                    <tr>
                      <td colspan='2'>
                        <button id='ajaxbtn' data-id='{$last_id}'>Load More</button>
                      </td>
                    </tr>
                  </tbody>";

echo $output;

}else {
    echo "No Recode Found";

}