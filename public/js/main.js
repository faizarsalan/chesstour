var multpart = document.getElementById('row');
var addRow = document.getElementById('addRow');
var counter = 0;

addRow.onclick = function () {
        counter += 1;
        var titleField = document.createElement('strong');
        var textTitleField = document.createTextNode("Category No." + counter);
        var breakpoint = document.createElement('br');
        var newField = document.createElement('input');
        newField.setAttribute('id','field_`+ counter +`')
        newField.setAttribute('type','text');
        newField.setAttribute('name','category_name[]');
        newField.setAttribute('placeholder','New Category');
        var removebtn = document.createElement('a');
        var link = document.createTextNode("Remove");
        removebtn.title = "Remove";
        removebtn.setAttribute('id','removebtn');

        titleField.appendChild(textTitleField);
        multpart.appendChild(titleField);
        multpart.appendChild(newField);
        removebtn.appendChild(link);
        multpart.appendChild(removebtn);
        multpart.appendChild(breakpoint);
}
