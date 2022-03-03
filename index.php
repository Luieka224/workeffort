<?php
    ob_clean();
    session_start();

    include 'session.php';
    include 'info_getter.php';

    $getUserDetail = new getUserDetail();

    $employeeDetail = $getUserDetail->getFullName($session_id);

?>

<script>
    function loggedIn() {
        var inputWorkDetails = document.getElementById("inputWorkDetails");
        var logButton = document.getElementById("logButton");
        var isLogged = false;

        if(inputWorkDetails.className == 'hidden') isLogged = true;
        // else isLogged = false;

        console.log(isLogged);

        logButton.

        // logButton.value = isLogged ? 'LOG IN' : 'LOG OUT';
        inputWorkDetails.className = isLogged ? 'w-1/2 overflow-scroll px-2 rounded-lg focus:outline-none text-xl bg-gray-900 text-blue-500 overflow my-1' : 'hidden';

        // if(inputWorkDetails.className == 'hidden') {
        //     inputWorkDetails.className = 'w-1/2 overflow-scroll px-2 rounded-lg focus:outline-none text-xl bg-gray-900 text-blue-500 overflow my-1';
        //     logButton.value = 'LOG OUT';
        // } else if (inputWorkDetails.className == 'w-1/2 overflow-scroll px-2 rounded-lg focus:outline-none text-xl bg-gray-900 text-blue-500 overflow my-1') {
        //     inputWorkDetails.className = 'hidden';
        //     logButton.value = 'LOG IN';
        // }
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/tailwind.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>WorkEffort | Dash</title>
</head>
<body class="bg-gray-900">
    <div class="bg-gray-800 w-full flex justify-between px-4 font-bold">
        <div class="flex text-2xl">
            <span class="text-blue-500">WORK</span>
            <span class="text-gray-300">EFFORT</span>
        </div>
        <button class="text-blue-500 text-md"><a href="logout.php">LOGOUT</a></button>
    </div>
    <div class="px-4 py-4">
        <span class="text-gray-500 text-lg">Welcome,</span>
        <br>
        <span class="text-blue-500 text-3xl leading-4 font-bold"><?php echo $employeeDetail->fullName; ?></span>
    </div>

    <div class="px-8 py-4 bg-gray-800 my-4">
        <span class="text-blue-500 text-2xl">WORK ATTENDANCE</span>
        <form action="" method="post" class="mt-6 block">
            <input type="text" name="workDetails" placeholder="Work Detail" id="inputWorkDetails" class="hidden"><br>
           <input type="submit"  id="logButton" value="LOG IN" class="bg-gray-900 text-blue-500 focus:outline-none rounded-full text-xl py-1 px-4 my-1 w-2/12">
        </form>
    </div>

    <div class="px-8 py-4 bg-gray-800 my-4">
        <span class="text-blue-500 text-2xl">WORK RECORD</span>
        <table class="text-white w-full my-2" id="TABLE_workData">
            <tr class="text-xl shadow-lg">
                <th>Work Description</th>
                <th>Time Started</th>
                <th>Time Ended</th>
            </tr>
            <?php
                $getUserDetail->getWorkData($employeeDetail->employeeID);
            ?>
        </table>
    </div>
</body>
</html>