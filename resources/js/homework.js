function editHomework() {
    var class_id = document.getElementById("class_id").value;
    var tr = this.parentElement.parentElement;
    var homework_id = tr.children[0].children[0].value;
    var description = tr.children[0].children[1].value;
    var title = tr.children[1].textContent;
    var deadline = tr.children[3].textContent;
    var expiration = tr.children[4].textContent;

    document.getElementById("new_title").value = title;
    document.getElementById("new_desc").value = description;
    document.getElementById("new_deadline").value = deadline;
    document.getElementById("new_exp_at").value = expiration;

    //Setting up the action for the edit form 
    document.getElementById("edit_homework_form").action = "/myclasses/"+class_id+"/homeworks/"+homework_id;
}
/*function viewHomework() {
    var tr = this.parentElement.parentElement;
    var description = tr.children[0].children[1].value;
    var title = tr.children[1].textContent;
    var creatDate = tr.children[2].textContent;
    var deadline = tr.children[3].textContent;
    var expiration = tr.children[4].textContent;
    var status = tr.children[5].textContent;

    document.getElementById("titleView").textContent = title;
    document.getElementById("creatDateView").textContent = creatDate;
    document.getElementById("deadlineView").textContent = deadline;
    document.getElementById("expView").textContent = expiration;
    document.getElementById("statusView").textContent = status;
    if(tr.children[0].children[2].value){
        var files = tr.children[0].children[2].value;
        document.getElementById("joinedFiles").textContent = files;
    }
    
    if(description==""){
        document.getElementById("descrView").textContent = "None";    
    }else{
        document.getElementById("descrView").textContent = description;
    }
}*/
function deleteHomework() {
    var class_id = document.getElementById("class_id").value;
    var tr = this.parentElement.parentElement;
    var homework_id = tr.children[0].children[0].value;
    
    //Setting up the action for the delete form 
    document.getElementById("delete_homework_form").action = "/myclasses/"+class_id+"/homeworks/"+homework_id;

}
window.onload = function(){
    var edit_icon = document.getElementsByClassName("edit_hw");
    //var view_icon = document.getElementsByClassName("view_hw");
    var delete_icon = document.getElementsByClassName("delete_hw");

    for (let i = 0; i < edit_icon.length; i++) {
        edit_icon[i].addEventListener("click",editHomework);
    }
    /*for (let i = 0; i < view_icon.length; i++) {
        view_icon[i].addEventListener("click",viewHomework);
    }*/
    for (let i = 0; i < delete_icon.length; i++) {
        delete_icon[i].addEventListener("click",deleteHomework);
    }
}