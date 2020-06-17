function importContribution() {
    var tr = this.parentElement.parentElement;
    var homework_id = tr.children[0].children[0].value;

    document.getElementById("import_contr_form").action = "/import/"+homework_id;
}
window.onload = function(){
    var importContr = document.getElementsByClassName('import_contr');
    for (let i = 0; i < importContr.length; i++) {
        importContr[i].addEventListener("click", importContribution);
        
    }
}