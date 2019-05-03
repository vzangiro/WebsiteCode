new Vue({
    el: '#app',
    data() {
        return {
            username: '',
            password: '',
            status: false,
            msg: '',
        }
    },

    mounted() {        
    },
    methods: {
        submitlogin () {
            console.log("working here")
            // axios
            //     .get('https://api.coindesk.com/v1/bpi/currentprice.json')
            //     .then(response => (this.message = response.data.chartName))
            
            axios
                .post('http://localhost:5500/api/login', {username: this.username, password: this.password})
                .then(response => (
                    this.msg = response.data.status,
                    (this.status == true) ? this.msg = 'Login failed' :                                     
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