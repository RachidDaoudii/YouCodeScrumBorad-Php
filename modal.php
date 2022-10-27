<?php
include('database.php');

// if(isset($_POST['edit'])){
//     $id = $_POST['edit'];
//     $sql = "SELECT * FROM `task` WHERE Id = $id LIMIT 1";
//     $res = mysqli_query($connection,$sql);
//     $row = $res->fetch_array();
//     if(count($row)==1){
//         $title = $row['Title'];
//         $type = $row['Type'];
//         $proirity = $row['Proirity'];
//         $status = $row['Status'];
//         $date = $row['Date'];
//         $description = $row['Description'];
//     }
// }

?>
<!-------------------------------------------- Modal-Update ------------------------------------------------>
<div class="modal fade" id="update<?php echo $element['Id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="title" class="from-label fw-bold">Title</label>
                            <input type="text" name="Title" id="title" class="form-control" placeholder="Title" value="<?php echo $element['Title'] ?>">
                        </div>
                        <label for="type" class="from-label fw-bold">Type</label>
                        <div class="mb-3">
                            <div class="mb-1">
                                <input type="radio" checked class="form-check-input" name="Type" id="feature" value="feature"<?php echo ($element['Type_id']==1)?"checked":"";?>>
                                <label for="type" class="form-check-label">feature</label>
                            </div>
                            <div class="mb-1">
                                <input type="radio" class="form-check-input" name="Type" id="bug" value="bug"<?php echo ($element['Type_id']==2)?"checked":"";?>>
                                <label for="type" class="form-check-label">bug</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Priority" class="from-label fw-bold">Priority</label>
                            <select name="Priority" required id="Priority" class="form-select" >
                                <option disabled selected>Please select</option>
                                <option value="Low"<?php echo ($element['Priority_id']==1)?"selected":"";?>>Low</option>
                                <option value="Medium"<?php echo ($element['Priority_id']==2)?"selected":"";?>>Medium</option>
                                <option value="High"<?php echo ($element['Priority_id']==3)?"selected":"";?>>High</option>
                                <option value="Critical"<?php echo ($element['Priority_id']==4)?"selected":"";?>>Critical</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="from-label fw-bold">Status</label>
                            <select name="Status" required id="status" class="form-select" >
                                <option value="" disabled selected>Please select</option>
                                <option value="To Do"<?php echo ($element['Status_id']==1)?"selected":"";?>>To do</option>
                                <option value="In Progress"<?php echo ($element['Status_id']==2)?"selected":"";?>>In Progress</option>
                                <option value="Done"<?php echo ($element['Status_id']==3)?"selected":"";?>>Done</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Date" class="from-label fw-bold">Date</label>
                            <input type="date" class="form-control" name="Date" id="date" value="<?php echo $element['Date']?>">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="from-label fw-bold">Description</label>
                            <textarea class="form-control" name="Description" id="description" rows="10"><?php echo $element['Description']?></textarea>
                        </div>
                        <div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</a>
						<button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
					</div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>
        <!-- Modal -->
<?php
?>

<script>
    // function hh(){
    //     var title = docement.document.getElementById('Title');
    // var Type = docement.document.getElementById('feature');
    // var priority = docement.document.getElementById('Priority');
    // var status = docement.document.getElementById('status');
    // var date = docement.document.getElementById('date');
    // var description = docement.document.getElementById('descrition');
    // var data = [];
    // var tasks = {
    //     Title : title.value,
    //     Type : Type.value,
    //     Priority : priority.value,
    //     Status : stattus.value,
    //     Date : date.value,
    //     Description : description.value
    // };
    // data.push(tasks);
    // console.log(data);
    // }
    
</script>