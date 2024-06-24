document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.getElementById('phone_number');
    
    phoneInput.addEventListener('input', function (event) {
        let phoneNumber = event.target.value.replace(/\D/g, '');
        
        if (phoneNumber.length >= 3 && phoneNumber.length <= 6) {
            phoneNumber = phoneNumber.replace(/(\d{3})(\d{0,3})/, '$1-$2');
        } else if (phoneNumber.length > 6) {
            phoneNumber = phoneNumber.replace(/(\d{3})(\d{3})(\d{0,4})/, '$1-$2-$3');
        }
        
        event.target.value = phoneNumber;
    });
});