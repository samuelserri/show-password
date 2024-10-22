console.log('hello')

function hideShowPassword() {
    const inputPassword = 
        document.getElementById('password')

    const passwordEye = document.getElementById('password-eye')

    console.log(passwordEye.classList)

        console.log(inputPassword.type)


    // se o type for password - muda p text
    // se o type for text - muda p password

    if (inputPassword.type === 'password') {
        inputPassword.type= 'text'

        passwordEye.classList.replace('bi-eye-slash-fill', 'bi-eye-fill')

    } else {
        inputPassword.type= 'password'
        
        passwordEye.classList.replace('bi-eye-fill', 'bi-eye-slash-fill')

    }

}