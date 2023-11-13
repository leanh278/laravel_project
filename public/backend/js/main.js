function Validator(option){
    var formElement = document.querySelector(option.form)
    function validate(inputElement, rule){
        var errorMessage = rule.test(inputElement.value)
        var errorElement = inputElement.parentElement.querySelector(option.erorSelector)
                    if(errorMessage){
                        errorElement.innerText = errorMessage;
                        inputElement.parentElement.classList.add('invalid');
                    }
                    else{
                        errorElement.innerText = '';
                        inputElement.parentElement.classList.remove('invalid');

                    }

    }

    if (formElement){
        option.rules.forEach(function(rule){
            var inputElement = formElement.querySelector(rule.selector)
            
            if(inputElement){
                //xu ly khi blur
                inputElement.onblur = function(){
                    validate(inputElement, rule);
                }
                
                //xu ly khi nhap vao
                inputElement.oninput = function(){
                    var errorElement = inputElement.parentElement.querySelector(option.erorSelector)
                    errorElement.innerText = '';
                    inputElement.parentElement.classList.remove('invalid');
                }
            }
        })
    }
}


Validator.isRequired = function(selector){

    return{
        selector: selector,
        test: function(value){
            return value.trim() ? undefined : 'Vui lòng nhập trường này'

        } 
    };
}

Validator.isEmail = function(selector){
    
    return{
        selector: selector,
        test: function(value){
        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return regex.test(value) ? undefined : 'Trường này không phải email'

        } 
    };

}

Validator.minLength = function(selector, min){
    
    return{
        selector: selector,
        test: function(value){
        return value.length >= min ? undefined : `Vui lòng nhập tối thiểu ${min} kí tự`

        } 
    };

}
Validator.isConfirmed =function(selector, getConfirmedValue,mesage) {
    return{
        selector: selector,
        test: function (value) {
            
            return value == getConfirmedValue() ? undefined : mesage || 'Giá trị nhập vào không chính xác'
        }
    };
} 