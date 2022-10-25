<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks($column)
    {
        include('database.php');
        //CODE HERE
        $count =1;
        $requite = "SELECT * FROM `tasks` WHERE Status_id = $column";
        $sql = mysqli_query($connection,$requite);
        while ($element = mysqli_fetch_assoc($sql)){?>
            <button class="w-100 bg-white border-0 border-secondary border-bottom d-flex button_task" name="edit" data-bs-toggle="modal" data-bs-target="#modal-task<?php $element['Id'] ?>">
                <div class="fs-2">
                    <i class='bx bx-loader-alt' style='color:#00d68a'></i> 
                </div>
                <div class="p-2 text-start">
                    <div class="fw-bold" id="titre"><?php echo $element['Title'] ?></div>
                    <div class="pt-1">
                        <div class=" text-secondary">#<?php echo $count ?> created in <?php echo $element['Date'] ?></div>
                        <div class="text-truncate" title=""><?php echo substr($element['Description'],0,50); ?></div>
                    </div>
                    <div class="pt-1">
                        <span class="p-1 btn btn-primary border border-0"><?php echo $element['Priority_id'] ?></span>
                        <span class="p-1 btn btn-secondary border border-0 text-black"><?php echo $element['Type_id'] ?></span>
                    </div>
                </div>
            </button>
            <?php $count++;
        } 
        //SQL SELECT
        // echo "Fetch all tasks";
    }


    function saveTask()
    {
        include('database.php');
        //CODE HERE
        $Title = $_POST['task-title'];
        $Type = $_POST['task-type'];
        $Priority = $_POST['task-priority'];
        $Status = $_POST['task-status'];
        $Date = $_POST['task-date'];
        $Description = $_POST['task-description'];
        //SQL INSERT
        $requite = "INSERT INTO `tasks`(`Title`, `Type_id`, `Priority_id`, `Status_id`,`Date`, `Description`) VALUES ('$Title','$Type','$Priority','$Status','$Date','$Description')";
        $sql = mysqli_query($connection,$requite);
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
        //CODE HERE
        if(isset($_POST['edit'])){
            $id = $_POST['edit'];
            $requite = "SELECT * FROM `tasks` WHERE Id = $id LIMIT 1";
            $sql = mysqli_query($connection,$requite);
            $row = $res->fetch_array();
            if(count($row)==1){
                $Title = $row['Title'];
                $Type = $row['Type_id'];
                $Priority = $row['Priority_id'];
                $Status = $row['Status_id'];
                $Description = $row['Description'];
                $Date = $row['Date'];
            }
        }
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>