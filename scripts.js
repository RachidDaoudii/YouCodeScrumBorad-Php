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
    document.getElementById('task_id').value = id;
    
    document.getElementById('task-save-btn').style.display='none';
    document.getElementById('mode_modal').innerHTML='Update Task';
}


var btnTaks = document.getElementById('modal_task');
btnTaks.addEventListener('click',function(){
    document.getElementById('mode_modal').innerHTML='Add Tsak';
    document.getElementById('form-task').forms.reste();
    document.getElementById('task-save-btn').style.display='block';
    document.getElementById('task-delete-btn').style.display='none';
    document.getElementById('task-update-btn').style.display='none';
})

