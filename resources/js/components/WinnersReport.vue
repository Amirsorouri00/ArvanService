<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="overflow-auto">
                    <p class="mt-3">Current Page: {{ currentPage }}</p>
                    <b-table
                        id="my-table"
                        ref="table"
                        :items="clicked2"
                        :per-page="perPage"
                        :current-page="currentPage"
                        small
                    ></b-table>
                    <!-- <b-pagination
                        v-on:input="clicked5"
                        v-model="currentPage"
                        :total-rows="rows"
                        :per-page="perPage2"
                        aria-controls="my-table"
                    ></b-pagination>
                    <button v-on:click="clicked2" type="button" class="btn btn-primary">Key Generator</button> -->
                </div>

            </div>
        </div>
    </div>


</template>

<script>
    const axios = require('axios');
    //https://github.com/bootstrap-vue/bootstrap-vue/issues/302
    export default {
        name: 'WinnersReport',
        data: function () {
            return {
                message: "hello",
                isBusy: false,
                another: 0,
                perPage: 8,
                currentPage: 1,
                items: [
                    { id: 1, first_name: 'Fred', last_name: 'Flintstone' },
                    { id: 2, first_name: 'Wilma', last_name: 'Flintstone' },
                    { id: 3, first_name: 'Barney', last_name: 'Rubble' },
                    { id: 4, first_name: 'Betty', last_name: 'Rubble' },
                    { id: 5, first_name: 'Pebbles', last_name: 'Flintstone' },
                    { id: 6, first_name: 'Bamm Bamm', last_name: 'Rubble' },
                    { id: 7, first_name: 'The Great', last_name: 'Gazzoo' },
                    { id: 8, first_name: 'Rockhead', last_name: 'Slate' },
                    { id: 9, first_name: 'Pearl', last_name: 'Slaghoople' }
                ]
            }
        },
        computed: {
            rows() {
                console.log('sfasfasf', this.items.length, this.perPage)  
                return this.items.length
            }
        },
        methods: {
            clicked2(ctx) {
                console.log(ctx.currentPage + '&size=' + ctx.perPage)
                var self = this     
                let items = self.items
                let promise = axios.post('http://127.0.0.1:8000/api/admin/winners/report', { withCredentials: true })
                return promise.then((data) => {
                    const items = data.data.data
                    console.log(items)
                    // Here we could override the busy state, setting isBusy to false
                    // this.isBusy = false
                    // perPage2()
                    this.$refs.table.refresh()
                    let pp = this.perPage
                    console.log(pp)
                    return(items)
                }).catch(error => {
                     // Here we could override the busy state, setting isBusy to false
                    // this.isBusy = false
                    // Returning an empty array, allows table to correctly handle
                    // internal busy state in case of error
                    return []
                })
            },
            perPage2() {
                let promise = axios.get('http://127.0.0.1:8000/api/users', { withCredentials: true })
                return promise.then((data) => {
                    // const items = data.data.data
                    var self = this
                    const pp = self.perPage
                    // console.log(items)
                    return(pp)
                }).catch(error => {
                    return 3
                })
                let pp = this.perPage
                return (pp)
            },
            clicked5() {
                console.log('hereee')
                // self = this
                let items = []  
                self.$store.commit('saveCurrentPageNo',   
                            this.currentPage);
            }
        },
        mounted () {
            let tmp = this.message
            let tmp2 = this.another
            console.log('WinnersReport Component mounted.', tmp,tmp2)
            var self = this
            self.items = this.$store.state.reportItems;
            // self.currentPage = this.$store.state.paginationPageNo;
        }
    }
</script>