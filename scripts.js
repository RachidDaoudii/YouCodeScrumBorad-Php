//function return task et afficher les values sur modal
function rern(id){
    //return les values attribute
    let titile = document.getElementById(id).children[1].children[0].getAttribute('data')
    let types = document.getElementById(id).children[1].children[2].children[1].getAttribute('data')
    let priority = document.getElementById(id).children[1].children[2].children[0].getAttribute('data')
    let status = document.getElementById(id).getAttribute('status')
    let date = document.getElementById(id).children[1].children[1].children[0].getAttribute('data')
    let description = document.getElementById(id).children[1].children[1].children[1].getAttribute('data')
    //rempliar les inputs de modal
    document.getElementById('task_title').value = titile;
    let type_inputs = document.querySelectorAll('input[type="radio"]');
    for(t of type_inputs){
        if(t.value == types){
            t.checked = true;
        }
    }
    document.getElementById('task_priority').value = priority;
    document.getElementById('task_status').value = status;
    document.getElementById('task_date').value = date;
    document.getElementById('task_description').value = description;
    document.getElementById('task_id').value = id;
}
//reset form modal et change mode de modal (Add task -> Update task)
let rest = document.getElementById('add');
rest.addEventListener('click',function(){
    document.getElementById('form_task').reset();
    document.getElementById('mode_modal').innerText="Add Task";    
})

let btnUpdate =document.querySelector('.btnUpdate');
btnUpdate.addEventListener('click',function (){
    document.getElementById('mode_modal').innerText="Update Task";
})






