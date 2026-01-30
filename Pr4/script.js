const form = document.getElementById("studentForm");
const list = document.getElementById("studentList");

form.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("name").value;
    const cls = document.getElementById("class").value;
    const gpa = document.getElementById("gpa").value;
    const backlogs = document.getElementById("backlogs").value;
    const gap = document.getElementById("gapYear").value;
    const phone = document.getElementById("phone").value;
    const email = document.getElementById("email").value;

    const row = document.createElement("tr");

    row.innerHTML = `
        <td>${name}</td>
        <td>${cls}</td>
        <td>${gpa}</td>
        <td>${backlogs}</td>
        <td>${gap}</td>
        <td>${phone}</td>
        <td>${email}</td>
        <td><button class="delete-btn">X</button></td>
    `;

    row.querySelector(".delete-btn").onclick = () => row.remove();

    list.appendChild(row);
    form.reset();
});
