<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Key Generator Component</div>
                    <div id="key_gen" class="card-body">
                        <p><b>Generated Key:</b> {{ message }}</p>
                        <button v-on:click="clicked" type="button" class="btn btn-primary">Key Generator</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        name: "key_gen",
        data: function () {
            return {
                message: "hello",
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
                console.log("clicked")
                let message = this.rndStr(20)
                let tmp = this.message
                console.log(message, tmp)
                this.message = message
                this.another++
            }
        },
        mounted () {
            let tmp = this.message
            let tmp2 = this.another
            console.log('keyGen Component mounted.', tmp,tmp2)
        }
    }
</script>
