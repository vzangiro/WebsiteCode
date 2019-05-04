new Vue({
    el: '#app',
    data() {
        return {
            username: '',
            password: '',
            status: '',
            msg: '',
        }
    },

    mounted() {        
    },
    methods: {
        submitlogin () {
         
            axios
                .post('http://localhost:5500/api/login', {username: this.username, password: this.password})
                .then(response => (
                    this.status = response.data.status,
                    (this.status == true) ? window.location="index.html" : this.msg = 'Login failed'                                
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