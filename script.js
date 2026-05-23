// DOCTOR SCHEDULE

function showSchedule() {

    let doctor =
    document.getElementById("doctorSelect").value;

    let box =
    document.getElementById("scheduleBox");

    if (doctor == "Dr Mehra") {

        box.innerHTML =
        "Available: Monday & Wednesday (10 AM - 2 PM)";
    }

    else if (doctor == "Dr Khanna") {

        box.innerHTML =
        "Available: Tuesday & Thursday (1 PM - 5 PM)";
    }

    else if (doctor == "Dr Gupta") {

        box.innerHTML =
        "Available: Friday & Saturday (9 AM - 12 PM)";
    }

    else {

        box.innerHTML =
        "Doctor schedule will appear here";
    }
}



// LOGIN

function login() {

    let email =
    document.getElementById("lEmail").value;

    let password =
    document.getElementById("lPass").value;

    if(email == "" || password == ""){

        document.getElementById("loginMsg")
        .innerHTML = "Please fill all fields";

        return;
    }

    document.getElementById("loginMsg")
    .innerHTML = "Login Successful";
}



// PHARMACY

function orderMedicine() {

    let med =
    document.getElementById("medName").value;

    let qty =
    document.getElementById("medQty").value;

    let delivery =
    document.getElementById("delivery").value;

    if(med == "" || qty == ""){

        document.getElementById("medMsg")
        .innerHTML = "Please fill all fields";

        return;
    }

    document.getElementById("medMsg")
    .innerHTML =
    "Medicine Ordered Successfully";
}



// LAB TEST

function bookTest() {

    let patient =
    document.getElementById("patientName").value;

    let type =
    document.getElementById("testType").value;

    let date =
    document.getElementById("testDate").value;

    if(patient == "" || date == ""){

        document.getElementById("labMsg")
        .innerHTML =
        "Please fill all fields";

        return;
    }

    document.getElementById("labMsg")
    .innerHTML =
    "Lab Test Booked Successfully";
}