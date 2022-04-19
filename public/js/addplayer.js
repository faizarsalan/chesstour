var multpart = document.getElementById('items');
var addRow = document.getElementById('addRow');
var counter = 0;

addRow.onclick = function () {
        counter += 1;

        //make a new div
        var newDiv = document.createElement('div');
        var afterDiv = document.createElement('div');
        newDiv.setAttribute('id','row')

        //titletext
        var titleField = document.createElement('strong');
        var textTitleField = document.createTextNode("Player No." + counter);
        var breakpoint = document.createElement('br');

        var newFirstname = document.createElement('input');
        var newSurname = document.createElement('input');
        var newElo = document.createElement('input');
        var newTitle = document.createElement('input');
        var newDOB = document.createElement('input');
        var newGender = document.createElement('select');

        // First Name
        newFirstname.setAttribute('type','text');
        newFirstname.setAttribute('name','player_Firstname[]');
        newFirstname.setAttribute('placeholder','First Name');
        newFirstname.setAttribute('required','');

        // Surname
        newSurname.setAttribute('type','text');
        newSurname.setAttribute('name','player_Surname[]');
        newSurname.setAttribute('placeholder','Surname');
        newSurname.setAttribute('required','');

        // ELO
        newElo.setAttribute('type','text');
        newElo.setAttribute('name','player_Elo[]');
        newElo.setAttribute('placeholder','ELO Rating');
        newElo.setAttribute('required','');

        // Title
        newTitle.setAttribute('type','text');
        newTitle.setAttribute('name','player_Title[]');
        newTitle.setAttribute('placeholder','Title');
        newTitle.setAttribute('required','');

        // Date of Birth
        var divDOB = document.createElement("div");
        divDOB.id = "optDIV";
        newDOB.setAttribute('type','date');
        newDOB.setAttribute('name','player_DOB[]');
        newElo.setAttribute('required','');

        // Gender
        var divGender = document.createElement("div");
        divGender.id = "optDIV";
        newGender.setAttribute('name','player_Gender[]');
        newElo.setAttribute('required','');

        //remove button
        var removebtn = document.createElement('a');
        var link = document.createTextNode("Remove");
        removebtn.title = "Remove";
        removebtn.setAttribute('id','removebtn');
        removebtn.setAttribute('onclick','removeRow(this)');

        multpart.appendChild(newDiv);
        titleField.appendChild(textTitleField);

        newDiv.appendChild(titleField);
        newDiv.appendChild(newFirstname);
        newDiv.appendChild(newSurname);
        newDiv.appendChild(newElo);
        newDiv.appendChild(newTitle);
        divDOB.appendChild(newDOB);
        divGender.appendChild(newGender);
        newDiv.appendChild(divDOB);
        newDiv.appendChild(divGender);
        newDiv.appendChild(afterDiv);

        var array = ["M","F"];
        for (let i = 0; i < array.length; i++) {
            var option = document.createElement("option");
            option.value = array[i];
            option.text = array[i];
            newGender.appendChild(option);
        }

        // afterDiv.innerHTML=        "<select name='country'>" +
        //                         "@foreach ($data as $item)" +
        //                             "<option value='{{ $item->id_Country }}'> {{ $item->name }} </option>" +
        //                         "@endforeach" +
        //                     "</select>";

    //     afterDiv.innerHTML=        `<select name='country'>
    //     @foreach ($data as $item)
    //         <option value='{{ $item->id_Country }}'> {{ $item->name }} </option>
    //     @endforeach
    // </select>`;

        // var newCountry =
        // "<select name='country'>" +
        //                         "@foreach ($country as $item)" +
        //                             "<option value='{{ $item->id_Country }}'> {{ $item->name }} </option>" +
        //                         "@endforeach" +
        //                     "</select>";
        // newDiv.append(newCountry);
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
