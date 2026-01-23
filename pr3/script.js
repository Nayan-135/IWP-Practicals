console.log("Script loaded");

function validate() {
    const form = document.querySelector(".form");

    let name = form.elements["name"].value.trim();
    if (name === "") {
        alert("Name must be filled out");
        return false;
    }

    let department = form.elements["department"].value.trim();
    if (department === "") {
        alert("Department must be filled out");
        return false;
    }

    let email = form.elements["email"].value.trim();
    if (email === "") {
        alert("Email must be filled out");
        return false;
    }

    let phone = form.elements["phone"].value.trim();
    if (phone === "") {
        alert("Phone number must be filled out");
        return false;
    }

    let tenth = form.elements["10thmarks"].value;
    if (tenth === "" || tenth < 0 || tenth > 100) {
        alert("10th Marks must be between 0 and 100");
        return false;
    }

    let twelfth = form.elements["12thmarks"].value;
    if (twelfth === "" || twelfth < 0 || twelfth > 100) {
        alert("12th Marks must be between 0 and 100");
        return false;
    }

    let cgpa = form.elements["cgpa"].value;
    if (cgpa === "" || cgpa < 0 || cgpa > 10) {
        alert("CGPA must be between 0 and 10");
        return false;
    }

    let backlog = form.elements["backlog"].value;
    if (backlog === "" || backlog < 0) {
        alert("Backlogs cannot be negative");
        return false;
    }

    let dropyear = form.elements["dropyear"].value;
    if (dropyear === "" || dropyear < 0) {
        alert("Drop year cannot be negative");
        return false;
    }

    alert("Form submitted successfully!");
    return true;
}
