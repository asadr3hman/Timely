var error_area = document.getElementById("error_area")

var txtField = document.getElementsByClassName("requiredField")

var cityList = document.getElementById('cities')//dropdown menu
var addCityItem = document.getElementById('add_city_item')//+add city item

var input_city = document.getElementById('new_city')//new city textField
var btn_add_city = document.getElementById('add_new_city')//insert btn

var btn_sumbit = document.getElementById('btn_submit')//form submit btn

//hide or show new city txtfield and button
function aList() {
    if (cityList.options[cityList.selectedIndex].textContent == '+ Add city') {
        console.log("aList")
        input_city.style.display = 'inline'
        btn_add_city.style.display = 'inline'
    }
    else {
        input_city.style.display = 'none'
        btn_add_city.style.display = 'none'
    }
}


//function to add new City to dropdown list
function addItemToList() {
    var err;
    var newCity = input_city.value
    if(cityList.length <12)
    {
        if(newCity=='')
        {
            err="Please enter something"
            document.getElementById('error_area').innerHTML=err
        }
        else
        {
            if(already_in(newCity))
            {
                err="City already exist"
                document.getElementById('error_area').innerHTML=err
            }
            else
            {
                var option = document.createElement('option')
                option.text = option.value = newCity
                cityList.add(option)
                err="New city added"
                document.getElementById('error_area').innerHTML=err
            }
        }
    }
    else
    {
        err="Can't add more then 10 cities"
        document.getElementById('error_area').innerHTML=err
    }
}
function already_in(check){
    var list=cityList
    for (let index = 0; index < cityList.length; index++) {
        var element = list[index].value;
        if(element==check)
        {
            console.log(element)
            return true   
        }
    }
    return false
}

function btnSubmitClicked() {
    for (let index = 0; index < txtField.length; index++) {
        const element = txtField[index];
        element.setAttribute('required', '')
    }
    rollNo()
    checkPassword()
}

function checkPassword()
{
    var validePas ="(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
    var txt_password=document.getElementById('txt_password')//password field
    txt_password.setAttribute('pattern', validePas)
}
function rollNo()
{
    var validRollNo="([A-Z a-z]{4})([0-9]{2})([F,f|S,s]{1})([0-9]{2})([F,f|S,s]{1})([0-9]{3})"
    var txt_rollNo=document.getElementById('rollNo')
    txt_rollNo.setAttribute('pattern', validRollNo)
}
function show_pass()
{
    if(txt_password.type==='password')
    {
        txt_password.type='text'
    }
    else
    {
        txt_password.type='password'
    }
}