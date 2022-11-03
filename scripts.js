//function return task et afficher les values sur modal
function rern(id){
    //return les values attribute
    let titile = document.getElementById(id).children[1].children[0].getAttribute('data')
    let types = document.getElementById(id).children[1].children[2].children[1].getAttribute('data')
    let priority = document.getElementById(id).children[1].children[2].children[0].getAttribute('data')
    let status = document.getElementById(id).getAttribute('status')
    let date = document.getElementById(id).children[1].children[1].children[0].getAttribute('data')
    let description = document.getElementById(id).children[1].children[1].children[1].getAttribute('data')
    let type_inputs = document.querySelectorAll('input[type="radio"]');
    //rempliar les inputs de modal
    for(t of type_inputs){
        if(t.value == types){
            t.checked = true;
        }
    }
    document.getElementById('task_id').value = id;
    document.getElementById('task_title').value = titile;
    document.getElementById('task_priority').value = priority;
    document.getElementById('task_status').value = status;
    document.getElementById('task_date').value = date;
    document.getElementById('task_description').value = description;
}
//reset form modal et change mode de modal (Add task -> Update task)
let add = document.getElementById('add');
add.addEventListener('click',function(){
    document.getElementById('form_task').reset();
    document.getElementById('mode_modal').innerText="Add Task";
    document.getElementById('task-delete-btn').style.display="none";
    document.getElementById('task-update-btn').style.display="none";
    document.getElementById('task-save-btn').style.display="block";
})

function aff(){
    $('#form_task').parsley().reset();
    document.getElementById('mode_modal').innerText="Update Task";
    document.getElementById('task-delete-btn').style.display="block";
    document.getElementById('task-update-btn').style.display="block";
    document.getElementById('task-save-btn').style.display="none";
}









