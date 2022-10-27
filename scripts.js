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
    var types = document.getElementById(id).children[1].children[0].getAttribute('data')
    var priority = document.getElementById(id).children[1].children[0].getAttribute('data')
    var date = document.getElementById(id).children[1].children[1].children[0].getAttribute('data')
    var description = document.getElementById(id).children[1].children[0].getAttribute('data')
    document.getElementById('task_title').value = titile;
    document.getElementById('task_date').value = date;
    console.log(date);
    // var title = element.getAttribute(data).chaldren[1].chaldren[0]
    // var types = element.getAttribute(data).chaldren[1].chaldren[0]
    // var priority = element.getAttribute(data).chaldren[1].chaldren[0]
    // var status = element.getAttribute(data).chaldren[1].chaldren[0]
    // var date = element.getAttribute(data).chaldren[1].chaldren[0]
    // var description = element.getAttribute(data).chaldren[1].chaldren[0]
}


