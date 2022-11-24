<?php
    //database name = "simple_ajax"
    //table name = "users"
    con = mysqli_connect("localhost","root","");
    dbs = mysqli_select_db("fees",con);
    $result= mysqli_query("select * from course");
    $array = mysqli_fetch_row($result);
?>
<tr>
    <td>Name: </td>
    <td>Address: </td>
</tr>
<?php
    while ($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>row[1]</td>";
        echo "<td>row[2]</td>";
        echo "</tr>";
    }   
?>