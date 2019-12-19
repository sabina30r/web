<?php

require_once('connection.php');

$conn = OpenCon();
$query = "SELECT * FROM userdata";
$result = $conn->query($query);
if (!$result) die  ("Сбой при доступе к базе данных: " . $conn->error());
$rows = $result->num_rows;
$i = 0;
while ($row = $result->fetch_assoc()) {
    $i++;
    echo "<tr><td>" . $row["login"] . "</td><td>" . $row['password'] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["e-mail"] . "</td><td>" . $row["role"] . "</td><td><img src=\"" . $row["url"] . "\" width=\"40\" height=\"40\" /></td>
           <td>
                <button type=\"button\" class=\"btn btn-secondary\" data-toggle=\"modal\" data-target=\"#exampleModal". $i ."\">
                    Edit
                </button>
                    <div id=\"exampleModal". $i ."\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\">
                    <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
	                       <div class=\"modal-header\">
                           <h5 class=\"modal-title\" id=\"exampleModal". $i ."\">Edit</h5>
                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                           </div>
	                       <div class=\"modal-body". $i ."\">
                                <form method='post' action='php/changeAdmin.php' id='editForm ". $i ."' name=\"editForm". $i ."\" onsubmit='edit()'>
                                   <input name='id' type='hidden' value='" . $row["id"] . "'>
                                   <p>
                                        <label>
                                           Username
                                           <br>
                                           <input name='login' type='text' required value='".$row["login"]."'>
                                        </label>
                                   </p>
                                   <p>
                                        <label>
                                           Password
                                           <br>
                                           <input name='password' type='password' required value='".$row["password"]."'>
                                        </label>
                                   </p>
                                   <p>
                                        <label>
                                           First name
                                           <br>
                                           <input name='firstname' type='text' required value='".$row["firstname"]."'>
                                        </label>
                                   </p>
                                   <p>
                                        <label>
                                           Last name
                                           <br>
                                           <input name='lastname' type='text' required value='".$row["lastname"]."'>
                                        </label>
                                   </p>
                                   <p>
                                        <label>
                                           E-mail
                                           <br>
                                           <input name='e-mail' type='email' required value='".$row["e-mail"]."'>
                                        </label>
                                   </p>
                                   <p><label>
                                             Role
                                 <br>
                <select name=\"role\">
                    <option value=\"user\">user</option>
                    <option value=\"admin\">admin</option>
                </select>
            </label></p>
            
                                    <p><label>
                Avatar url
                <br>
                <input type=\"text\" name=\"url\" placeholder=\"Enter avatar url\"
                       required value='".$row["url"]."'/>
            </label></p>
            <p><button name=\"submit\" type=\"submit\" value=\"Update\" class=\"btn btn-primary\" data-backdrop='static'>Update</button></p>
                                </form>
	                       </div>
                       	   </div>
                       	   </div>
            </div</td></tr>";
};
echo "</table>";

CloseCon($conn);

?>
