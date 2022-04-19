var multpart = document.getElementById('items');
var addRow = document.getElementById('addRow');
var counter = 0;

addRow.onclick = function () {
        counter += 1;

        //make a new div
        var newDiv = document.createElement('div');
        newDiv.setAttribute('id','row')

        //titletext
        var titleField = document.createElement('strong');
        var textTitleField = document.createTextNode("Category No." + counter);
        var breakpoint = document.createElement('br');

        var newName = document.createElement('input');

        // Country Name
        newName.setAttribute('type','text');
        newName.setAttribute('name','category_name[]');
        newName.setAttribute('placeholder','Category Name');
        newName.setAttribute('required','');

        //remove button
        var removebtn = document.createElement('a');
        var link = document.createTextNode("Remove");
        removebtn.title = "Remove";
        removebtn.setAttribute('id','removebtn');
        removebtn.setAttribute('onclick','removeRow(this)');

        multpart.appendChild(newDiv);
        titleField.appendChild(textTitleField);
        newDiv.appendChild(titleField);
        newDiv.appendChild(newName);

        removebtn.appendChild(link);
        newDiv.appendChild(removebtn);
        newDiv.appendChild(breakpoint);
}

function removeRow(btn) {
    btn.parentNode.remove();
}

function empty() {
    var exist = document.getElementById("row");
    if (exist == null) {
        alert('Values cannot be empty')
        return false;
    }
}
