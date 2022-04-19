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
        var textTitleField = document.createTextNode("Country No." + counter);
        var breakpoint = document.createElement('br');

        var newCountry = document.createElement('input');
        var newCapital = document.createElement('input')

        // Country Name
        newCountry.setAttribute('type','text');
        newCountry.setAttribute('name','country_name[]');
        newCountry.setAttribute('placeholder','Country Name');
        newCountry.setAttribute('required','');

        // Capital City
        newCapital.setAttribute('type','text');
        newCapital.setAttribute('name','country_capital[]');
        newCapital.setAttribute('placeholder','Capital Name');
        newCapital.setAttribute('required','');

        //remove button
        var removebtn = document.createElement('a');
        var link = document.createTextNode("Remove");
        removebtn.title = "Remove";
        removebtn.setAttribute('id','removebtn');
        removebtn.setAttribute('onclick','removeRow(this)');

        multpart.appendChild(newDiv);
        titleField.appendChild(textTitleField);
        newDiv.appendChild(titleField);
        newDiv.appendChild(newCountry);
        newDiv.appendChild(newCapital);
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
