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
        global $connection;
        //CODE HERE
        //SQL SELECT
        $requite = "SELECT types.Name as NameTypes ,priorities.Name as NamePriority, statuses.Name AS NameStatus ,tasks.* FROM tasks ,types ,priorities , statuses WHERE tasks.Type_id = types.Id and tasks.Priority_id = priorities.Id and tasks.Status_id = statuses.Id and tasks.Status_id= $column";
        // $requite = "SELECT * FROM tasks where tasks.Status_id= $column";
        $sql = mysqli_query($connection,$requite);
        while ($element = mysqli_fetch_assoc($sql)){?>
            <button status="<?php echo $element['Status_id'] ?>" class="w-100 bg-white border-0 border-secondary border-bottom d-flex dd" id="<?php echo $element['Id'] ?>" onclick="rern(<?php echo $element['Id'] ?>)" name="edit" data-bs-toggle="modal" data-bs-target="#modal_task">
                <div class="fs-2">
                    <i class='bx <?php echo ($element['Status_id'] == 1)? "bx-help-circle" : (($element['Status_id'] == 2)? "bx-loader-alt" : "bx-check-circle")?>' style='color:#00d68a'></i> 
                </div>
                <div class="p-2 text-start">
                    <div class="fw-bold" id="titre" data="<?php echo $element['Title'] ?>"><?php echo $element['Title'] ?></div>
                    <div class="pt-1">
                        <div class=" text-secondary" data="<?php echo $element['Date'] ?>">#<?php echo $element['Id'] ?> created in <?php echo $element['Date'] ?></div>
                        <div class="text-truncate" title="" data="<?php echo $element['Description'] ?>"><?php echo substr($element['Description'],0,50).'...'; ?></div>
                    </div>
                    <div class="pt-1">
                        <span class="p-1 btn btn-primary border border-0" data="<?php echo $element['Priority_id'] ?>"><?php echo $element['NamePriority']?></span>
                        <span class="p-1 btn btn-secondary border border-0 text-black" data="<?php echo $element['Type_id'] ?>"><?php echo $element['NameTypes']?></span>
                    </div>
                </div>
            </button>
            <?php 
        } 
        // echo "Fetch all tasks";
        ?>
        
        <?php
    }

    function Validation($input){
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    
    function saveTask()
    {
        global $connection;
        //CODE HERE

        $Title = Validation($_POST['task-title']);
        $Type = $_POST['task-type'];
        $Priority = $_POST['task-priority'];
        $Status = $_POST['task-status'];
        $Date = $_POST['task-date'];
        $Description = Validation($_POST['task-description']);
        //SQL INSERT
        $requite = "INSERT INTO `tasks`(`Title`, `Type_id`, `Priority_id`, `Status_id`,`Date`, `Description`) VALUES ('$Title','$Type','$Priority','$Status','$Date','$Description')";
        $sql = mysqli_query($connection,$requite);
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
        global $connection;
        //CODE HERE
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $Title = Validation($_POST['task-title']);
            $Type = $_POST['task-type'];
            $Priority = $_POST['task-priority'];
            $Status = $_POST['task-status'];
            $Date = $_POST['task-date'];
            $Description = Validation($_POST['task-description']);
            //SQL UPDATE
            $sql = "UPDATE `tasks` SET `Title` = '$Title' ,`Type_id` = '$Type' ,`Priority_id` = '$Priority',`Status_id`= '$Status' ,`Date` = '$Date' ,`Description` = '$Description'  WHERE Id = $id";
            $res = mysqli_query($connection,$sql); 
            $_SESSION['message'] = "Task has been updated successfully !";
            header('location: index.php');
        }else{
            $_SESSION['erreur'] = "Task not !!! has been updated successfully !";
            header('location: index.php');
        }
    }

    function deleteTask()
    {
        global $connection;
        //CODE HERE
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            //SQL DELETE
            $sql = "DELETE FROM `tasks` WHERE Id = $id";
            $res = mysqli_query($connection,$sql);
            $_SESSION['message'] = "Task has been deleted successfully !";
		    header('location: index.php');
        }
        else{
            $_SESSION['erreur'] = "Task has !!!!! not been deleted successfully !";
		    header('location: index.php');
        }
    }

    function Types(){
        global $connection;
        $sql ="SELECT * FROM `types`";
        $res = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_assoc($res)) { ?>
        <div class="form-check mb-1">
            <input class="form-check-input" name="task-type" type="radio" value="<?php echo $row['Id']?>" id="task_type_feature" required="" data-parsley-trigger="keyup"/>
            <label class="form-check-label" for="task-type-feature"><?php echo $row['Name']?></label>
        </div>
        <?php
        }
    }

    function Select($table){
        global $connection;
        $sql ="SELECT * FROM `$table`";
        $res = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_assoc($res)) { ?>
        <option value="<?php echo $row['Id']?>"><?php echo $row['Name']?></option>
        <?php
        }
    }

    // function Status(){
    //     global $connection;
    //     $sql ="SELECT * FROM `statuses`";
    //     $res = mysqli_query($connection,$sql);
    //     while ($row = mysqli_fetch_assoc($res)) { ?>
    <!-- //     <option value="<?php //echo $row['Id']?>"><?php //echo $row['Name']?></option> -->
    //     <?php
    //     }
    // }

    function Counts($id){
        global $connection;
        $sql="SELECT count(*) FROM `tasks` WHERE Status_id = '$id'";
        $res = mysqli_query($connection,$sql);
        $nbr= mysqli_fetch_array($res);
        echo $nbr[0];
    } 


    

    

?>