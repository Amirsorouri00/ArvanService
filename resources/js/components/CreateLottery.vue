<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Lottery</div>
                    <div class="col-md-12 justify-content-center">
                        
                        <div id="key_gen" class="card-body">
                            <form class="form-group has-success" >
                                <label class="form-control-label" for="inputSuccess1">Lottery Capacity</label>
                                <input type="number" value="correct value" class="form-control" id="capacity" required>
                                <div id="demo" class="in-valid-feedback"></div>
                            </form>
                            <button v-on:click="clicked" type="button" class="btn btn-primary">Key Generator</button>
                            <br/>
                            <br/>
                            <p><b>Generated Key:</b> {{ message }}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    const axios = require('axios');
    export default {
        name: 'CreateLottery',
        data: function () {
            return {
                message: "Hello, click me after input the capacity of the expected lottery to show you the generated lottery key.",
                another: 0
            }
        },
        methods: {
            rndStr(len) {
                let text = " "
                let chars = "abcdefghijklmnopqrstuvwxyz"
            
                for( let i=0; i < len; i++ ) {
                    text += chars.charAt(Math.floor(Math.random() * chars.length))
                }
                return text
            },
            clicked() {
                var inpObj = document.getElementById("capacity");
                if (!inpObj.checkValidity()) {
                    document.getElementById("demo").innerHTML = inpObj.validationMessage;
                }
                else{
                    var capacity = document.getElementById("capacity").value;
                    var message = 0;
                    var self = this
                    axios.post('http://127.0.0.1:8000/api/lotteries', {'capacity': capacity}, { withCredentials: true })
                    .then(function (response) {
                        // handle success
                        console.log(response.data);
                        var message = response.data;
                        self.message = message.data.code
                        self.$store.commit('saveLotteryCode',   
                            self.message);
                        console.log('message', message, self.message)
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                        console.log('then')
                    });
                    console.log("clicked")
                }
                
            }
        },
        mounted () {
            let tmp = this.message
            let tmp2 = this.another
            console.log('keyGen Component mounted.', tmp,tmp2)
            var self = this
            self.message = this.$store.state.generatedCode;
            // Make a request for a user with a given ID
        }
    }
</script>
