// method to createHeader
let createHeader = () => {
    console.log("js file ")
    $(() => {
        $('#header').load('../assets/header.php')
    })
}

//method to clear previous internship details and make clicked button active
let clear_table = (btn)=>{
    let table = document.getElementById('table');
    table.innerHTML = "";

    // loader is array of referenace btns - all pending approved completed rejected
    let loader = document.getElementsByClassName('loader')
    
    // to make all btn non active
    for (let i = 0; i < loader.length; i++)
        loader[i].className = "btn loader";

    // to make clicked btn active
    btn.className = "btn loader btn-active";
}

// method to validate apply form if there is error it will show error alert and red colored border on input field
let validate_me = ()=>{
    let input_required = document.getElementsByClassName('input-required')
    let error_msg = document.getElementById('error-msg')
    let status = true
    for(let i = 0 ; i < input_required.length; i++){
        if(input_required[i].value == ""){
            status = false;
            input_required[i].style.outline = "4px solid rgba(247, 9, 9, 0.5)"
        }
    }
    if(status){
        if(confirm("Once you submitted you can't edit form\ndo you want to submit form?"))
        alert("Your form is submmited")
        else{
        status = false;
        }
    }else{
       error_msg.style.display = "block"
       alert("Please fill all required fileds before submit")
    }
    return status
}


// method to remove red border on input field on changing it also to remove error alert
let remove_error = (element)=>{
    let error_msg = document.getElementById('error-msg')
    error_msg.style.display = "none";
    element.style.outline = "none"
}
