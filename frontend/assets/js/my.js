new Vue({
    el: '#app',
    data() {
        return {
            msg: 'Hello world!',
            name: '',
            email: '',
            comment: '',
            status: ''
        }
    },

    mounted() {        
    },
    methods: {
        submitComment () {
            console.log("working here")
            // axios
            //     .get('https://api.coindesk.com/v1/bpi/currentprice.json')
            //     .then(response => (this.message = response.data.chartName))
            
            axios
                .post('http://localhost:5501/api/comment', {email: this.email, comment: this.comment})
                .then(response => (
                    this.msg = response.data.status,
                    (this.msg == 'success') ? this.status = 'Submitted! Thanks.' : ''                                     
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