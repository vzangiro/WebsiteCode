new Vue({
    el: '#app',
    data() {
        return {
            username: '',
            password: '',
            email: '',
            status: '',
            msg: 'msg',
        }
    },

    mounted() {        
    },
    methods: {
        submitsignup () {
         
            axios
                .post('http://localhost:5500/api/login', {username: this.username, password: this.password, email: this.email})
                .then(response => (
                    this.status = response.data.status,
                    (this.status == true) ? window.location="index.html" : this.msg = 'Signup failed'                                
                )                   
                )             
                // .then(() => ((this.msg == 'success')?this.status = 'Submitted! Thanks.':''))
                // .then(
                //     (this.msg == 'success') ? this.status = 'Submitted! Thanks.' : '',
                //     console.log('then ...')
                // )
                .catch(function (error) {
                    console.log(error);
                })
            
        }
    }
})