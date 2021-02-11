let createHeader = () => {
    console.log("js file ")
    $(() => {
        $('#header').load('../assets/header.html')
    })
}

let load_document = (btn) => {
    let loader = document.getElementsByClassName('loader')
    let all = loader[0]
    let pending = loader[1]
    let approved = loader[2]
    let completed = loader[3]
    let rejected = loader[4]

    for (let i = 0; i < loader.length; i++)
        loader[i].className = "btn loader";
    let status = btn.id;
    $(document).ready(() => {
        $('#table').load('./data.html')
    })
    btn.className = "btn loader btn-active";
}

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
        if(confirm("Once you submitted you can't edit form/ndo you want to submit form?"))
        alert("Your form is submmited")
    }else{
       error_msg.style.display = "block"
       alert("Please fill all required fileds before submit")
    }
    return status
}

let remove_error = (element)=>{
    let error_msg = document.getElementById('error-msg')
    error_msg.style.display = "none";
    element.style.outline = "none"
}
