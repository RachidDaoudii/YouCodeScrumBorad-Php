<?php
    //INCLUDE DATABASE FILE
    include('database.php');

    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES 
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    if(isset($_POST['login']))       login();
    if(isset($_POST['connecter']))   connecter();

    

    function getTasks($column)
    {
        //CODE HERE
        global $connection;
        //SQL SELECT
        $requite = "SELECT types.Name as NameTypes ,priorites.Name as NamePriority, statuses.Name AS NameStatus ,tasks.* FROM tasks ,types ,priorites , statuses WHERE tasks.Type_id = types.Id and tasks.Priority_id = priorites.Id and tasks.Status_id = statuses.Id and tasks.Status_id= $column ORDER BY tasks.Id ASC";
        $sql = mysqli_query($connection,$requite);
        while ($element = mysqli_fetch_assoc($sql)){?>
            <button status="<?php echo $element['Status_id'] ?>" class="w-100 bg-white border-0 border-secondary border-bottom d-flex btnUpdate" id="<?php echo $element['Id'] ?>" onclick="rern(<?php echo $element['Id'] ?>)" data-bs-toggle="modal" data-bs-target="#modal_task">
                <div class="fs-2">
                    <i class='bx <?php echo ($element['Status_id'] == 1)? "bx-help-circle" : (($element['Status_id'] == 2)? "bx-loader-alt" : "bx-check-circle")?>' style='color:#00d68a'></i> 
                </div>
                <div class="p-2 text-start">
                    <div class="fw-bold" id="titre" data="<?php echo $element['Title'] ?>"><?php echo $element['Title'] ?></div>
                    <div class="pt-1">
                        <div class=" text-secondary" data="<?php echo $element['Date'] ?>">#<?php echo $element['Id'] ?> created in <?php echo $element['Date'] ?></div>
                        <div class="text-truncate" title="" data="<?php echo $element['Description'] ?>"><?php echo substr($element['Description'],0,40).'...'; ?></div>
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
    }

    //function Validation form modal 
    function Validation($input){
        //Supprime les espaces
        $input = trim($input);
        //Supprimer quote string (\n \t \)
        $input = stripcslashes($input);
        //Convertit les balise html en string
        $input = htmlspecialchars($input);
        return $input;
    }

    function saveTask()
    {
        global $connection;
        //CODE HERE
        if(empty($_POST['task-title']) || empty($_POST['task-type']) || empty($_POST['task-priority']) || empty($_POST['task-status']) || empty($_POST['task-date']) || empty($_POST['task-description'])){
            $_SESSION['erreur'] = "Task Not Add !!! All is required !";
            header('location: index.php');
        }else{
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
        
    }

    function updateTask()
    {
        global $connection;
        //CODE HERE
        if(empty($_POST['task-title']) || empty($_POST['task-type']) || empty($_POST['task-priority']) || empty($_POST['task-status']) || empty($_POST['task-date']) || empty($_POST['task-description'])){
            $_SESSION['erreur'] = "Task Not Add !!! All is required !";
            header('location: index.php');
        }else{
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
                $_SESSION['erreur'] = "Erreur id undefined !!!!";
                header('location: index.php');
            }
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
            $_SESSION['erreur'] = "Erreur id undefined !!!!";
		    header('location: index.php');
        }
    }

    //function Ajouter Types (dynamic) 
    function Types(){
        global $connection;
        //SQL Afficher les types
        $sql ="SELECT * FROM `types`";
        $res = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_assoc($res)) { ?>
        <div class="form-check mb-1">
            <input class="form-check-input" name="task-type" type="radio" value="<?php echo $row['Id']?>" id="task_type_feature" data-parsley-required data-parsley-trigger="keyup"/>
            <label class="form-check-label" for="task-type-feature"><?php echo $row['Name']?></label>
        </div>
        <?php
        }
    }
    
    //function Ajouter Status et Priority (dynamic) 
    function Select($table){
        global $connection;
        //SQL Afficher les statuses et priorityes
        $sql ="SELECT * FROM `$table`";
        $res = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_assoc($res)) { ?>
        <option value="<?php echo $row['Id']?>"><?php echo $row['Name']?></option>
        <?php
        }
    }

    //function Calculer Count de table
    function Counts($id){
        global $connection;
        //SQL Calculer Count de table
        $sql="SELECT count(*) FROM `tasks` WHERE Status_id = '$id'";
        $res = mysqli_query($connection,$sql);
        $nbr= mysqli_fetch_array($res);
        echo $nbr[0];
    } 


    function login(){
        global $connection;
        $nom = Validation($_POST['login_nom']);
        $prenom = Validation($_POST['login_prenom']);
        $email = Validation($_POST['login_email']);
        $password = Validation($_POST['login_password']);
        $sql ="INSERT INTO `user_compte`(`Nom`, `Prenom`, `Email`, `Password`) VALUES ('$nom','$prenom','$email','$password')";
        $res = mysqli_query($connection,$sql);
        // $row = mysqli_fetch_assoc($res);
        // $_SESSION['user_name']= $row['Nom'];
        header("Location: index.php");
    }

    function connecter(){
        global $connection;
        $email = Validation($_POST['login_email']);
        $password = Validation($_POST['login_password']);
        $sql="SELECT * from `user_compte` WHERE Email = '$email' and Password = '$password'";
        $res = mysqli_query($connection,$sql);
        if (mysqli_num_rows($res) === 1) {
            $row = mysqli_fetch_assoc($res);
            if ($row['Email'] === $email && $row['Password'] === $password) {
                $_SESSION['user_name'] = $row['Nom'].' '.$row['Prenom'];
                header("Location: index.php");
            }
            else{
                $_SESSION['erreur'] = "Erreur de traitement !!!!";
		        header('location: login.php');
            }
        }
        else{
            $_SESSION['erreur'] = "Erreur Email Password!!!!";
		    header('location: login.php');
        }
    }


?>