const globalVue = Vue.createApp({
    data() {
        return {
            api: {
                baseUrl: null,
                host:null,
                endpoints: {
                    subscribe: {
                        submit:'/subscribe',
                    }
                }
            },
            toasts: {
                success:{message:null,instance:null},
                error:{message:null,instance:null}
            }
        }
    },
    mounted:function(){this.init()},
    methods: {
        init() {
            this.api.baseUrl = document.getElementById("apiBaseUrl").value;
			this.api.host = `${this.api.baseUrl}`

            this.toasts.success.instance = new bootstrap.Toast(document.getElementById('successToast'), {delay:8000})
            this.toasts.error.instance = new bootstrap.Toast(document.getElementById('errorToast'), {delay:8000})
		},
        validateDate(inputDate){var dateObject = new Date(inputDate);if(dateObject !== "Invalid Date" && !isNaN(dateObject)){return(true);}else{return(false);}},
		validateEmail(email){if(email != undefined && email != null){var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);return pattern.test(email);}else{return(false);}},
		validateNumber(number){return(!isNaN(parseFloat(number)) && isFinite(number));},
		validatePhone(phone){if(phone != undefined && phone != null){var return_data=true;if(phone.match(/^\s*$/)){return_data=false;}else{if(isNaN(phone)){return_data=false;}else{var phoneLength=phone.toString().length;if(phoneLength<10||phoneLength>16){return_data=false;}}}return(return_data);}else{return(false);}},
		validatePassword(password){if(password != undefined && password != null){return(!password.match(/^\s*$/));}else{return(false);}},
		validatePincode(pincode){if(pincode != undefined && pincode != null){pincode=String(pincode);if(pincode.length==6){if(isNaN(pincode)){return(false);}else{return(true);}}else{return(false);}}else{return(false);}},
		validateString(inputStr){if(inputStr != undefined && inputStr != null){return(!inputStr.match(/^\s*$/));}else{return(false);}},
		validateTime(timeValue){var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(timeValue);if(isValid){return(true);}else{return(false);}},
		matchPasswordWithRePassword(pass, rePass){return(pass==rePass);},
        showResourceLoader(){document.getElementById("resourceLoader").classList.add("show");},
        hideResourceLoader(){document.getElementById("resourceLoader").classList.remove("show");},
        showToast(toastType, message){this.toasts[toastType].message = message;this.toasts[toastType].instance.show()}
    }
}).mount('#globalVue')

/** Creating Axios instance specific for hitting back-end APIs along with interceptors */
const apiService = axios.create({
	baseURL:globalVue.api.host,
	timeout:20000,
	headers:{'Accept':'application/json'}
})
// apiService.interceptors.request.use(() => {
// 	globalVue.showResourceLoader();
// })
// apiService.interceptors.response.use(function(response) {
// 	globalVue.hideResourceLoader();
//     return response;
// },
// (error) => {
// 	var response = error.response;
//     // globalVue.showToast(response.data.message, 'failed');
// });
