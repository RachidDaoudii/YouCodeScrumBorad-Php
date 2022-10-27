// function get(i){
//     document.getElementById('task_title').value 
//     document.getElementById('task_priority').value 
//     document.getElementById('task_status').value 
//     document.getElementById('task_date').value 
//     document.getElementById('task_description').value 
// }

// btn = document.getElementById('button_task')
// mod = document.getElementById('modal_task');
// btn.addEventListener("click", () => {
//     mod.showModal();
//     openCheck(mod);
// });
// var modalToggle = document.getElementById('modal_task') // relatedTarget
// modalToggle.show()

function rern(id){
    var titile = document.getElementById(id).children[1].children[0].getAttribute('data')
    var types = document.getElementById(id).children[1].children[2].children[1].getAttribute('data')
    var priority = document.getElementById(id).children[1].children[2].children[0].getAttribute('data')
    var status = document.getElementById(id).getAttribute('status')
    var date = document.getElementById(id).children[1].children[1].children[0].getAttribute('data')
    var description = document.getElementById(id).children[1].children[1].children[1].getAttribute('data')
    document.getElementById('task_title').value = titile;
    document.getElementById('task_type_feature').checked = types;
    document.getElementById('task_priority').value = priority;
    document.getElementById('task_status').value = status;
    document.getElementById('task_date').value = date;
    document.getElementById('task_description').value = description;
    
    document.getElementById('task-save-btn').style.display='none';
    document.getElementById('mode_modal').innerHTML='Update Taks';
}


