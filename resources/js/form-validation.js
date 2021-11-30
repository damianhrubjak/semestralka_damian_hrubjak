import * as yup from "yup";

let loginSchema = yup.object().shape({
    username: yup.string().required(),
    password: yup.string().required(),
});

let previousErrors = null;

const loginForm = document.querySelector("#login-form");

if (loginForm) {
    loginForm.addEventListener("submit", (e) => {
        const username = loginForm.querySelector("#username-input");
        const password = loginForm.querySelector("#password-input");

        loginSchema
            .validate(
                {
                    username: username.value,
                    password: password.value,
                },
                { abortEarly: false }
            )
            .then((valid) => {
                console.log("ok", valid);
            })
            .catch((err) => {
                e.preventDefault();
                showErrors(err.errors);
            });
    });
}
function showErrors(errors) {
    let objectsAreEqual =
        JSON.stringify(previousErrors) === JSON.stringify(errors);

    const parent = document.querySelector("#error-div");

    if (objectsAreEqual) {
        // if errors are equal, disable re-render of object
        return;
    } else {
        // otherwise reset html
        parent.innerHTML = "";
    }

    parent.classList.add("error-wrapper", "opacity-0");

    const h2 = document.createElement("h2");
    h2.classList.add("error-wrapper-heading");
    h2.innerHTML = "Form is filled wrong";

    const ol = document.createElement("ol");
    ol.classList.add("error-wrapper-list");

    // loop through errors and create li elements and attach them to ol element
    errors.map((error) => {
        let li = document.createElement("li");
        let p = document.createElement("p");
        p.classList.add("error-item");
        p.innerHTML = error;
        li.appendChild(p);
        ol.appendChild(li);
    });

    parent.appendChild(h2);
    parent.appendChild(ol);

    parent.classList.remove("opacity-0");
    parent.classList.add("opacity-100");

    previousErrors = errors;
}
