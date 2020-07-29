<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Attend in Lottery Component</div>
                    <div class="card-body">
                        <!-- Attendance Form -->
                        <form>
                            <fieldset>
                                <div class="form-group">
                                    <label for="InputPhone">Phone number</label>
                                    <input type="tel" class="form-control" id="InputPhone" aria-describedby="emailHelp" placeholder="Enter your phone number Ex. 09128048897">
                                    <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputCode">Lottery code</label>
                                    <input type="code" class="form-control" id="InputCode" placeholder="Enter the lottery code here.">
                                </div>
                                <button v-on:click="clicked3" type="button" class="btn btn-primary">Attend</button>
                                <!-- <button type="submit" class="btn btn-primary">Attend in Lottery</button> -->
                            </fieldset>
                        </form>
                        <br/>
                         <div v-if="reqStatus === 'OK'" class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Well done!</strong> {{message}} <a href="#" class="alert-link"></a>.
                        </div>

                        <div v-if="reqStatus === 'NOK'" class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oh snap!</strong> {{error}}<a href="#" class="alert-link"></a> 
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
        name: "AttendInLottery",
        data: function () {
            return {
                message: "hello",
                error: "error",
                reqStatus: 'temp'
            }
        },
        methods: {
            clicked3() {
                var self = this
                var inpPhone = document.getElementById("InputPhone").value;
                var inpCode = document.getElementById("InputCode").value;
                var reqBody = {'phone': inpPhone, 'lottery_code': inpCode}
                // console.log(reqBody)
                axios.post('http://127.0.0.1:8000/api/lottery/attend', reqBody, { withCredentials: true })
                .then(function (response) {
                    // handle success
                    console.log(response);
                    if (response.status == 201) {
                        self.message = response.data.data
                        self.reqStatus = 'OK'
                    }
                    else {
                        self.error = response.data.error
                        self.reqStatus = 'NOK'
                    }
                })
                .catch(function (error) {
                    // handle error
                    // this.message = message
                    console.log(error);
                })
                .then(function () {
                    // always executed
                    console.log('then')
                });
                console.log("clicked")
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
