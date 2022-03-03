<?php
    class getUserDetail {
        
        function getFullName($loginID) {
            try {
                $db = getDB();
                $stmt = $db->prepare("SELECT employeeID FROM user_login WHERE uid=:loginID");
                $stmt->bindParam("loginID", $loginID, PDO::PARAM_INT);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_OBJ);

                $employeeID = $data->employeeID;

                $stmt = $db->prepare("SELECT * FROM employee_data WHERE employeeID=:employeeID");
                $stmt->bindParam("employeeID", $employeeID, PDO::PARAM_INT);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_OBJ);
                return $data;
            } catch (PDOException $e) {
                echo '{"error":{"text":'.$e->getMessage().'}}';
            }
        }

        function getWorkData($employeeID) {
            $username = "root";
            $password = "";
            $database = "work_data";
            
            $mysqli = new mysqli("localhost", $username, $password, $database);

            // $db = getDB();
            $query = "SELECT * FROM work_data WHERE employeeID = '$employeeID'";

            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $workDesc = $row["workDone"];
                    $timeStart = $row["timeStart"];
                    $timeEnd = $row["timeEnd"];

                    echo '
                        <tr class="text-lg">
                            <td class="px-2 py-1">' .$workDesc. '</td>
                            <td class="px-2 py-1">' .$timeStart. '</td>
                            <td class="px-2 py-1">' .$timeEnd. '</td>
                        </tr>
                    ';
                }

                $result->free();
            }
        }
    }
?>